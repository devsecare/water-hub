<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MediaLibrary extends Model
{
    protected $table = 'media_library';

    protected $fillable = [
        'name',
        'file_name',
        'path',
        'mime_type',
        'size',
        'disk',
        'collection',
        'alt_text',
        'description',
        'metadata',
        'width',
        'height',
    ];

    protected $casts = [
        'metadata' => 'array',
        'size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
    ];

    protected $appends = ['url', 'thumbnail_url', 'file_type'];

    public function getUrlAttribute(): ?string
    {
        if (empty($this->path)) {
            return null;
        }
        
        // Use asset() for public disk, Storage::url() for others
        if ($this->disk === 'public') {
            return asset('storage/' . $this->path);
        }
        
        return Storage::disk($this->disk)->url($this->path);
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        if ($this->isImage() && !empty($this->path)) {
            return $this->url;
        }
        return null;
    }

    public function getFileTypeAttribute(): string
    {
        if ($this->isImage()) {
            return 'image';
        }
        if ($this->isVideo()) {
            return 'video';
        }
        if ($this->isPdf()) {
            return 'pdf';
        }
        return 'file';
    }

    public function isImage(): bool
    {
        return str_starts_with($this->mime_type ?? '', 'image/');
    }

    public function isVideo(): bool
    {
        return str_starts_with($this->mime_type ?? '', 'video/');
    }

    public function isPdf(): bool
    {
        return $this->mime_type === 'application/pdf';
    }
}
