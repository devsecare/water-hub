<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Item extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'publisher',
        'author',
        'type',
        'short_description',
        'latitude',
        'longitude',
        'address',
        'country',
        'project_phase',
        'featured_image_id',
        'is_active',
        'is_case_study',
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_active' => 'boolean',
        'is_case_study' => 'boolean',
    ];

    public function getTypeLabelAttribute(): string
    {
        return match($this->type) {
            'guide' => 'Guide',
            'video' => 'Video',
            'podcast' => 'Podcast',
            'case_study' => 'Case Study',
            default => 'Guide',
        };
    }

    public function getTypeIconAttribute(): string
    {
        return match($this->type) {
            'guide' => 'book',
            'video' => 'video',
            'podcast' => 'mic',
            'case_study' => 'lightbulb',
            default => 'book',
        };
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function featuredImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_image_id', 'id');
    }

    public function bookmarkedByUsers()
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'item_id', 'user_id')->withTimestamps();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            if (empty($item->slug)) {
                $item->slug = Str::slug($item->title);
            }
        });

        static::updating(function ($item) {
            // Auto-update slug if title changed and slug is empty or was auto-generated
            if ($item->isDirty('title')) {
                // Only auto-update if slug matches the old title's slug (meaning it was auto-generated)
                $oldSlug = Str::slug($item->getOriginal('title'));
                if (empty($item->slug) || $item->getOriginal('slug') === $oldSlug) {
                    $item->slug = Str::slug($item->title);
                }
            }
        });
    }
}
