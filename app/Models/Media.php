<?php

namespace App\Models;

use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

class Media extends SpatieMedia
{
    protected $table = 'media';

    protected $appends = ['url', 'thumbnail_url'];

    public function getUrlAttribute(): ?string
    {
        return $this->getUrl();
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        if ($this->hasGeneratedConversion('thumb')) {
            return $this->getUrl('thumb');
        }

        // If it's an image, return the original
        if (str_starts_with($this->mime_type, 'image/')) {
            return $this->getUrl();
        }

        return null;
    }

    public function getFileTypeAttribute(): string
    {
        if (str_starts_with($this->mime_type, 'image/')) {
            return 'image';
        }
        if (str_starts_with($this->mime_type, 'video/')) {
            return 'video';
        }
        if ($this->mime_type === 'application/pdf') {
            return 'pdf';
        }
        return 'file';
    }
}
