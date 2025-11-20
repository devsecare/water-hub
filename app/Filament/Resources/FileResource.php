<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FileResource\Pages;
use App\Filament\Resources\FileResource\RelationManagers;
use App\Models\File;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FileResource extends Resource
{
    protected static ?string $model = File::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Files';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('File Information')
                    ->schema([
                        Forms\Components\Select::make('item_id')
                            ->label('Item')
                            ->relationship('item', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->label('File Name')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Internal file name'),
                        Forms\Components\TextInput::make('original_name')
                            ->label('Original Name')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Original filename as uploaded'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('File Details')
                    ->schema([
                        Forms\Components\TextInput::make('path')
                            ->label('File Path')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Storage path to the file')
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('mime_type')
                            ->label('MIME Type')
                            ->maxLength(255)
                            ->helperText('File MIME type (e.g., application/pdf)'),
                        Forms\Components\TextInput::make('size')
                            ->label('File Size (bytes)')
                            ->numeric()
                            ->default(0)
                            ->suffix('bytes')
                            ->helperText('File size in bytes'),
                        Forms\Components\TextInput::make('download_count')
                            ->label('Download Count')
                            ->numeric()
                            ->default(0)
                            ->disabled()
                            ->helperText('Number of times this file has been downloaded'),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('item.title')
                    ->label('Item')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('name')
                    ->label('File Name')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('original_name')
                    ->label('Original Name')
                    ->searchable()
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('mime_type')
                    ->label('Type')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        str_starts_with($state, 'image/') => 'success',
                        str_starts_with($state, 'video/') => 'warning',
                        str_starts_with($state, 'audio/') => 'info',
                        str_starts_with($state, 'application/pdf') => 'danger',
                        default => 'gray',
                    })
                    ->toggleable(),
                Tables\Columns\TextColumn::make('size')
                    ->label('Size')
                    ->formatStateUsing(fn ($state) => $state ? self::formatBytes($state) : '0 B')
                    ->sortable(),
                Tables\Columns\TextColumn::make('download_count')
                    ->label('Downloads')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                Tables\Columns\TextColumn::make('downloadLogs_count')
                    ->label('Log Entries')
                    ->counts('downloadLogs')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('item_id')
                    ->label('Item')
                    ->relationship('item', 'title')
                    ->searchable()
                    ->preload(),
                Tables\Filters\Filter::make('mime_type')
                    ->form([
                        Forms\Components\Select::make('mime_type')
                            ->options([
                                'image/' => 'Images',
                                'video/' => 'Videos',
                                'audio/' => 'Audio',
                                'application/pdf' => 'PDF',
                                'application/' => 'Applications',
                            ])
                            ->multiple(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['mime_type'],
                            fn (Builder $query, $types): Builder => $query->where(function ($q) use ($types) {
                                foreach ($types as $type) {
                                    $q->orWhere('mime_type', 'like', $type . '%');
                                }
                            })
                        );
                    }),
                Tables\Filters\Filter::make('has_downloads')
                    ->label('Has Downloads')
                    ->query(fn (Builder $query): Builder => $query->where('download_count', '>', 0)),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    /**
     * Format bytes to human readable format
     */
    protected static function formatBytes(int $bytes, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withCount('downloadLogs');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFiles::route('/'),
            'create' => Pages\CreateFile::route('/create'),
            'edit' => Pages\EditFile::route('/{record}/edit'),
        ];
    }
}
