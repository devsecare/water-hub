<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'color',
        'icon',
        'image_id',
        'parent_id',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function getIsParentAttribute(): bool
    {
        return $this->parent_id === null;
    }

    public function getIsChildAttribute(): bool
    {
        return $this->parent_id !== null;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            // Auto-update slug if name changed and slug is empty or was auto-generated
            if ($category->isDirty('name')) {
                // Only auto-update if slug matches the old name's slug (meaning it was auto-generated)
                $oldSlug = Str::slug($category->getOriginal('name'));
                if (empty($category->slug) || $category->getOriginal('slug') === $oldSlug) {
                    $category->slug = Str::slug($category->name);
                }
            }
        });
    }
}
