<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    protected $fillable = [
        'page_route',
        'page_url',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'og_image',
        'twitter_card',
        'canonical_url',
        'robots',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
