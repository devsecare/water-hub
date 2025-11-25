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

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Populate files repeater with existing files
        $data['files'] = $this->record->files->map(function ($file) {
            return [
                'id' => $file->id,
                'media_id' => null, // We don't store media_id in files, so set to null
                'original_name' => $file->original_name,
            ];
        })->toArray();

        return $data;
    }

    protected function afterSave(): void
    {
        $this->processFiles();
    }

    protected function processFiles(): void
    {
        $filesData = $this->data['files'] ?? [];
        
        // Get existing file IDs to track what should remain
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

        // Process new/updated files
        foreach ($filesData as $fileData) {
            // If it has an ID, it's an existing file - skip processing (or update if needed)
            if (isset($fileData['id']) && $fileData['id']) {
                // Update existing file if original_name changed
                $file = File::find($fileData['id']);
                if ($file && isset($fileData['original_name'])) {
                    $file->update(['original_name' => $fileData['original_name']]);
                }
                continue;
            }

            // New file - process media selection
            if (empty($fileData['media_id']) || empty($fileData['original_name'])) {
                continue;
            }

            // Handle if media_id is an array/collection - get first item
            $mediaId = is_array($fileData['media_id']) ? (reset($fileData['media_id']) ?: null) : $fileData['media_id'];
            
            if (!$mediaId) {
                continue;
            }

            $media = Media::find($mediaId);
            if (!$media || !($media instanceof Media)) {
                continue;
            }

            // Copy file from media to files directory
            $mediaDiskName = $media->disk ?? 'public';
            $mediaDisk = Storage::disk($mediaDiskName);
            $mediaPath = $media->path;

            // Get file content
            if (!$mediaDisk->exists($mediaPath)) {
                continue;
            }

            $fileContent = $mediaDisk->get($mediaPath);

            // Generate unique storage name
            $extension = pathinfo($media->file_name ?? $media->name, PATHINFO_EXTENSION) ?: $media->ext;
            $storageName = Str::uuid() . '.' . $extension;

            // Store in local files directory
            $newPath = 'files/' . $storageName;
            Storage::disk('local')->put($newPath, $fileContent);

            // Create File record
            File::create([
                'item_id' => $this->record->id,
                'name' => $storageName,
                'original_name' => $fileData['original_name'],
                'path' => $newPath,
                'mime_type' => $media->mime_type ?? 'application/octet-stream',
                'size' => $media->size ?? 0,
            ]);
        }
    }
}
