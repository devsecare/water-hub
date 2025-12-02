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
        'first_name',
        'organisation',
        'email',
        'password',
        'can_access_admin',
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
            'can_access_admin' => 'boolean',
        ];
    }

    /**
     * Allow access to Filament admin panel
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->can_access_admin ?? false;
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
