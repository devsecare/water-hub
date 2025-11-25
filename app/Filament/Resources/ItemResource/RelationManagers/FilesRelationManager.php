<?php

namespace App\Filament\Resources\ItemResource\RelationManagers;

use App\Models\Media;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FilesRelationManager extends RelationManager
{
    protected static string $relationship = 'files';

    public static function canViewForRecord(Model $ownerRecord, string $pageClass): bool
    {
        // Allow viewing on both create and edit pages
        // Note: Files can only be added after the item is created
        return true;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Placeholder::make('current_file')
                    ->label('Current File')
                    ->content(function ($record) {
                        if (!$record) return null;
                        return $record->original_name . ' (' . $this->formatBytes($record->size) . ')';
                    })
                    ->visible(fn ($record) => $record !== null),
                
                CuratorPicker::make('media_id')
                    ->label('Select File from Media Library')
                    ->required(fn ($record) => $record === null)
                    ->buttonLabel('Select Media')
                    ->listDisplay(true)
                    ->multiple(false)
                    ->helperText('Select a file from the media library. You can upload new files to the media library first.')
                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                        if ($state) {
                            // Handle if state is an array/collection - get first item
                            $mediaId = is_array($state) ? (reset($state) ?: null) : $state;
                            
                            if ($mediaId) {
                                $media = Media::find($mediaId);
                                if ($media && $media instanceof Media) {
                                    // Auto-fill original_name from media
                                    $extension = pathinfo($media->file_name ?? $media->name, PATHINFO_EXTENSION) ?: $media->ext;
                                    $set('original_name', $media->file_name ?? $media->name ?? 'file.' . $extension);
                                }
                            }
                        }
                    }),
                
                Forms\Components\TextInput::make('original_name')
                    ->label('File Name')
                    ->required()
                    ->maxLength(255)
                    ->helperText('The original name of the file (auto-filled from media selection)'),
                
                Forms\Components\Hidden::make('name'),
                Forms\Components\Hidden::make('path'),
                Forms\Components\Hidden::make('mime_type'),
                Forms\Components\Hidden::make('size')
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('original_name')
            ->columns([
                Tables\Columns\TextColumn::make('original_name')
                    ->label('File Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mime_type')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(function ($state) {
                        if (str_starts_with($state, 'application/pdf')) {
                            return 'PDF';
                        } elseif (str_starts_with($state, 'video/')) {
                            return 'Video';
                        } elseif (str_starts_with($state, 'audio/')) {
                            return 'Audio';
                        } elseif (str_starts_with($state, 'image/')) {
                            return 'Image';
                        } elseif (str_contains($state, 'word') || str_contains($state, 'document')) {
                            return 'Document';
                        }
                        return 'File';
                    })
                    ->color(fn ($state) => match(true) {
                        str_starts_with($state, 'application/pdf') => 'success',
                        str_starts_with($state, 'video/') => 'info',
                        str_starts_with($state, 'audio/') => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('size')
                    ->label('Size')
                    ->formatStateUsing(fn ($state) => $this->formatBytes($state))
                    ->sortable(),
                Tables\Columns\TextColumn::make('download_count')
                    ->label('Downloads')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->form([
                        CuratorPicker::make('media_id')
                            ->label('Select File from Media Library')
                            ->required()
                            ->buttonLabel('Select Media')
                            ->listDisplay(true)
                            ->multiple(false)
                            ->helperText('Select a file from the media library. You can upload new files to the media library first.'),
                        Forms\Components\TextInput::make('original_name')
                            ->label('File Name')
                            ->required()
                            ->maxLength(255)
                            ->helperText('The original name of the file (auto-filled from media selection)'),
                    ])
                    ->mutateFormDataUsing(function (array $data): array {
                        // Ensure item_id is set
                        $data['item_id'] = $this->getOwnerRecord()->id;
                        
                        // Process media selection - this is required
                        if (empty($data['media_id'])) {
                            throw new \Exception('Please select a file from the media library.');
                        }
                        
                        // Handle if media_id is an array/collection - get first item
                        $mediaId = is_array($data['media_id']) ? (reset($data['media_id']) ?: null) : $data['media_id'];
                        
                        if (!$mediaId) {
                            throw new \Exception('Please select a file from the media library.');
                        }
                        
                        $media = Media::find($mediaId);
                        if (!$media || !($media instanceof Media)) {
                            throw new \Exception('Selected media file not found.');
                        }
                        
                        // Copy file from media to files directory
                        $mediaDiskName = $media->disk ?? 'public';
                        $mediaDisk = Storage::disk($mediaDiskName);
                        $mediaPath = $media->path;
                        
                        // Get file content
                        if (!$mediaDisk->exists($mediaPath)) {
                            throw new \Exception('Media file does not exist on disk.');
                        }
                        
                        $fileContent = $mediaDisk->get($mediaPath);
                        
                        // Generate unique storage name
                        $extension = pathinfo($media->file_name ?? $media->name, PATHINFO_EXTENSION) ?: $media->ext;
                        $storageName = Str::uuid() . '.' . $extension;
                        
                        // Store in local files directory
                        $newPath = 'files/' . $storageName;
                        Storage::disk('local')->put($newPath, $fileContent);
                        
                        // Set file data
                        $data['name'] = $storageName;
                        $data['original_name'] = $data['original_name'] ?? ($media->file_name ?? $media->name ?? 'file.' . $extension);
                        $data['path'] = $newPath;
                        $data['mime_type'] = $media->mime_type ?? 'application/octet-stream';
                        $data['size'] = $media->size ?? 0;
                        
                        // Remove media_id as it's not a field in the files table
                        unset($data['media_id']);
                        
                        return $data;
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->mutateFormDataUsing(function (array $data, $record): array {
                        // Handle media selection on edit - only if new media is selected
                        if (isset($data['media_id']) && $data['media_id']) {
                            // Handle if media_id is an array/collection - get first item
                            $mediaId = is_array($data['media_id']) ? (reset($data['media_id']) ?: null) : $data['media_id'];
                            
                            if ($mediaId) {
                                $media = Media::find($mediaId);
                                if ($media && $media instanceof Media) {
                                    // Delete old file if exists
                                    if ($record->path && Storage::disk('local')->exists($record->path)) {
                                        Storage::disk('local')->delete($record->path);
                                    }
                                    
                                    // Copy file from media to files directory
                                    $mediaDiskName = $media->disk ?? 'public';
                                    $mediaDisk = Storage::disk($mediaDiskName);
                                    $mediaPath = $media->path;
                                    
                                    // Get file content
                                    if ($mediaDisk->exists($mediaPath)) {
                                        $fileContent = $mediaDisk->get($mediaPath);
                                        
                                        // Generate unique storage name
                                        $extension = pathinfo($media->file_name ?? $media->name, PATHINFO_EXTENSION) ?: $media->ext;
                                        $storageName = Str::uuid() . '.' . $extension;
                                        
                                        // Store in local files directory
                                        $newPath = 'files/' . $storageName;
                                        Storage::disk('local')->put($newPath, $fileContent);
                                        
                                        // Set file data
                                        $data['name'] = $storageName;
                                        $data['original_name'] = $data['original_name'] ?? ($media->file_name ?? $media->name ?? 'file.' . $extension);
                                        $data['path'] = $newPath;
                                        $data['mime_type'] = $media->mime_type ?? $record->mime_type;
                                        $data['size'] = $media->size ?? $record->size;
                                    }
                                }
                            }
                        } else {
                            // Keep existing file data if no new media selected
                            $data['name'] = $record->name;
                            $data['path'] = $record->path;
                            $data['mime_type'] = $record->mime_type;
                            $data['size'] = $record->size;
                        }
                        
                        // Remove media_id as it's not a field in the files table
                        unset($data['media_id']);
                        
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        // Delete the physical file when record is deleted
                        if ($record->path && Storage::disk('local')->exists($record->path)) {
                            Storage::disk('local')->delete($record->path);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records) {
                            // Delete physical files when records are deleted
                            foreach ($records as $record) {
                                if ($record->path && Storage::disk('local')->exists($record->path)) {
                                    Storage::disk('local')->delete($record->path);
                                }
                            }
                        }),
                ]),
            ]);
    }

    private function formatBytes($bytes, $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }
}
