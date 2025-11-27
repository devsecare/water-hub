<?php

namespace App\Filament\Resources\ItemResource\Pages;

use App\Filament\Resources\ItemResource;
use App\Models\File;
use App\Models\Media;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateItem extends CreateRecord
{
    protected static string $resource = ItemResource::class;

    protected $additionalFilesData = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Capture additional_files data before create
        $this->additionalFilesData = $data['additional_files'] ?? [];
        \Log::info('Captured additional_files before create', [
            'count' => count($this->additionalFilesData),
            'data' => $this->additionalFilesData
        ]);
        
        // Remove from data so it doesn't try to save to Item model
        unset($data['additional_files']);
        
        return $data;
    }

    protected function afterCreate(): void
    {
        $this->processAdditionalFiles($this->additionalFilesData);
    }

    protected function processAdditionalFiles(array $filesData = []): void
    {
        // If no data provided, try to get from captured data
        if (empty($filesData)) {
            $filesData = $this->additionalFilesData ?? [];
        }
        
        if (empty($filesData)) {
            return;
        }

        foreach ($filesData as $fileData) {
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
