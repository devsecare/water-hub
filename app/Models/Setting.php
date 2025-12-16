<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
        'sort_order',
        'is_encrypted',
    ];

    protected $casts = [
        'is_encrypted' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the decrypted value if encrypted
     */
    public function getValueAttribute($value)
    {
        if ($this->is_encrypted && $value) {
            try {
                return Crypt::decryptString($value);
            } catch (\Exception $e) {
                return $value;
            }
        }
        return $value;
    }

    /**
     * Set the encrypted value if needed
     */
    public function setValueAttribute($value)
    {
        if ($this->is_encrypted && $value) {
            $this->attributes['value'] = Crypt::encryptString($value);
        } else {
            $this->attributes['value'] = $value;
        }
    }

    /**
     * Get setting by key
     */
    public static function get(string $key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set setting by key
     */
    public static function set(string $key, $value, array $attributes = [])
    {
        $setting = self::firstOrNew(['key' => $key]);
        $setting->value = $value;

        foreach ($attributes as $attr => $val) {
            $setting->$attr = $val;
        }

        return $setting->save();
    }
}
