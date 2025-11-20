<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Allow access to Filament admin panel
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return true; // allow all logged in users
    }

    /**
     * Get the bookmarks for the user
     */
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    /**
     * Get the items bookmarked by the user
     */
    public function bookmarkedItems()
    {
        return $this->belongsToMany(Item::class, 'bookmarks', 'user_id', 'item_id')->withTimestamps();
    }
}
