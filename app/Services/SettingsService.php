<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    /**
     * Get a setting value by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        return Cache::remember("setting.{$key}", 3600, function () use ($key, $default) {
            $setting = Setting::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Set a setting value
     *
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return bool
     */
    public static function set(string $key, $value, array $attributes = []): bool
    {
        $setting = Setting::firstOrNew(['key' => $key]);
        $setting->value = $value;

        foreach ($attributes as $attr => $val) {
            $setting->$attr = $val;
        }

        $result = $setting->save();

        // Clear cache
        Cache::forget("setting.{$key}");
        Cache::forget('settings');

        return $result;
    }

    /**
     * Get all settings as an array
     *
     * @return array
     */
    public static function all(): array
    {
        return Cache::remember('settings', 3600, function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    /**
     * Get settings by group
     *
     * @param string $group
     * @return array
     */
    public static function getByGroup(string $group): array
    {
        return Cache::remember("settings.group.{$group}", 3600, function () use ($group) {
            return Setting::where('group', $group)
                ->pluck('value', 'key')
                ->toArray();
        });
    }

    /**
     * Get admin email
     *
     * @return string
     */
    public static function getAdminEmail(): string
    {
        return self::get('admin_email', 'developers@ecareinfoway.com');
    }

    /**
     * Get contact email
     *
     * @return string
     */
    public static function getContactEmail(): string
    {
        return self::get('contact_email', '');
    }
}
