<?php

namespace App\Filament\Resources\ItemResource\Pages;

use App\Filament\Resources\ItemResource;
use App\Models\File;
use App\Models\Media;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditItem extends EditRecord
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected $additionalFilesData = [];

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load existing files into the repeater
        $this->record->load('files');
        
        $data['additional_files'] = $this->record->files->map(function ($file) {
            return [
                'id' => $file->id,
                'media_id' => null,
                'original_name' => $file->original_name,
            ];
        })->toArray();

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Capture additional_files data before save
        $this->additionalFilesData = $data['additional_files'] ?? [];
        \Log::info('Captured additional_files before save', [
            'count' => count($this->additionalFilesData),
            'data' => $this->additionalFilesData
        ]);
        
        // Remove from data so it doesn't try to save to Item model
        unset($data['additional_files']);
        
        return $data;
    }

    protected function afterSave(): void
    {
        // Use captured data instead of $this->data
        $this->processAdditionalFiles($this->additionalFilesData);
    }

    protected function getRedirectUrl(): string
    {
        // Redirect to edit page to reload form with updated files
        return $this->getResource()::getUrl('edit', ['record' => $this->record]);
    }

    protected function processAdditionalFiles(array $filesData = []): void
    {
        // If no data provided, try to get from form state or data
        if (empty($filesData)) {
            $filesData = $this->additionalFilesData ?? $this->data['additional_files'] ?? [];
        }
        
        // Debug: Log received data
        \Log::info('Processing additional files', [
            'item_id' => $this->record->id,
            'files_data_count' => count($filesData),
            'files_data' => $filesData
        ]);
        
        // Get existing file IDs from the form data
        $existingFileIds = collect($filesData)->pluck('id')->filter()->toArray();
        
        // Delete files that were removed from the repeater
        $this->record->files()->whereNotIn('id', $existingFileIds)->each(function ($file) {
            // Delete physical file
            if ($file->path && Storage::disk('local')->exists($file->path)) {
                Storage::disk('local')->delete($file->path);
            }
            // Delete record
            $file->delete();
        });
        
        if (empty($filesData)) {
            \Log::info('No files data to process');
            return;
        }

        foreach ($filesData as $index => $fileData) {
            \Log::info("Processing file {$index}", ['file_data' => $fileData]);
            
            // Skip if it's an existing file (has id)
            if (isset($fileData['id']) && $fileData['id']) {
                \Log::info("Skipping existing file", ['file_id' => $fileData['id']]);
                // Update original_name if changed
                if (isset($fileData['original_name'])) {
                    $file = File::find($fileData['id']);
                    if ($file) {
                        $file->update(['original_name' => $fileData['original_name']]);
                    }
                }
                continue;
            }

            // New file - process media selection
            if (empty($fileData['media_id']) || empty($fileData['original_name'])) {
                \Log::warning("Skipping file - missing media_id or original_name", [
                    'has_media_id' => !empty($fileData['media_id']),
                    'has_original_name' => !empty($fileData['original_name'])
                ]);
                continue;
            }

            // Handle if media_id is an array/collection - get first item
            $mediaId = is_array($fileData['media_id']) ? (reset($fileData['media_id']) ?: null) : $fileData['media_id'];
            
            if (!$mediaId) {
                \Log::warning("Invalid media_id", ['media_id' => $fileData['media_id']]);
                continue;
            }

            $media = Media::find($mediaId);
            if (!$media || !($media instanceof Media)) {
                \Log::error("Media not found", ['media_id' => $mediaId]);
                continue;
            }

            // Copy file from media to files directory
            $mediaDiskName = $media->disk ?? 'public';
            $mediaDisk = Storage::disk($mediaDiskName);
            $mediaPath = $media->path;

            // Get file content
            if (!$mediaDisk->exists($mediaPath)) {
                \Log::error("Media file does not exist", [
                    'media_path' => $mediaPath,
                    'disk' => $mediaDiskName
                ]);
                continue;
            }

            $fileContent = $mediaDisk->get($mediaPath);

            // Generate unique storage name
            $extension = pathinfo($media->file_name ?? $media->name, PATHINFO_EXTENSION) ?: $media->ext;
            $storageName = Str::uuid() . '.' . $extension;

            // Store in local files directory
            $newPath = 'files/' . $storageName;
            $stored = Storage::disk('local')->put($newPath, $fileContent);
            
            if (!$stored) {
                \Log::error("Failed to store file", ['path' => $newPath]);
                continue;
            }

            // Create File record
            try {
                $file = File::create([
                    'item_id' => $this->record->id,
                    'name' => $storageName,
                    'original_name' => $fileData['original_name'],
                    'path' => $newPath,
                    'mime_type' => $media->mime_type ?? 'application/octet-stream',
                    'size' => $media->size ?? 0,
                ]);
                
                \Log::info("File created successfully", [
                    'file_id' => $file->id,
                    'item_id' => $this->record->id,
                    'original_name' => $file->original_name
                ]);
            } catch (\Exception $e) {
                \Log::error("Failed to create file record", [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
            }
        }
    }
}
