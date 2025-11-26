<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'sort',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($faq) {
            // Set sort order to the next available number if not set
            if (!isset($faq->sort)) {
                $maxSort = static::max('sort') ?? 0;
                $faq->sort = $maxSort + 1;
            }
        });
    }
}
