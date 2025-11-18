<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class File extends Model
{
    protected $fillable = [
        'item_id',
        'name',
        'original_name',
        'path',
        'mime_type',
        'size',
        'download_count',
    ];

    protected $casts = [
        'size' => 'integer',
        'download_count' => 'integer',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function downloadLogs(): HasMany
    {
        return $this->hasMany(DownloadLog::class);
    }

    public function incrementDownloadCount(): void
    {
        $this->increment('download_count');
    }
}
