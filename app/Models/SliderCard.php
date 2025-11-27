<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderCard extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'subtitle_line_1',
        'subtitle_line_2',
        'has_expandable',
        'expandable_title',
        'expandable_items',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'has_expandable' => 'boolean',
        'is_active' => 'boolean',
        'expandable_items' => 'array',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($card) {
            // Set sort order to the next available number if not set
            if (!isset($card->sort_order)) {
                $maxSort = static::max('sort_order') ?? 0;
                $card->sort_order = $maxSort + 1;
            }
        });
    }
}
