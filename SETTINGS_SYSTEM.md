# Settings System Documentation

## Overview

A comprehensive settings management system has been added to your Filament admin panel. This allows you to manage all application settings, API keys, and email addresses from a single interface.

## Features

✅ **Centralized Settings Management** - All settings in one place  
✅ **Secure Storage** - API keys and secrets are encrypted  
✅ **Organized Sections** - Settings grouped by category  
✅ **Easy Access** - Available in Filament admin panel  
✅ **Caching** - Settings are cached for performance  

## Access

Navigate to: **Admin Panel → Settings → Settings**

Or directly: `/admin/settings`

## Settings Categories

### 1. Email Settings
- **Admin Email** - Email address to receive admin notifications and contact form submissions
- **Contact Email** - Public contact email address
- **No-Reply Email** - Email address used for automated emails (password resets, etc.)

### 2. API Keys
- **ElasticEmail API Key** - For sending emails via ElasticEmail
- **Google reCAPTCHA Site Key** - reCAPTCHA v3 site key
- **Google reCAPTCHA Secret Key** - reCAPTCHA v3 secret key

### 3. General Settings
- **Site Name** - Name of the application
- **Site URL** - Base URL of the application
- **Site Description** - Brief description of the site

### 4. Social Media
- **Facebook URL** - Facebook page URL
- **Twitter/X URL** - Twitter/X profile URL
- **LinkedIn URL** - LinkedIn page URL
- **YouTube URL** - YouTube channel URL

## Usage in Code

### Using SettingsService

```php
use App\Services\SettingsService;

// Get a setting
$adminEmail = SettingsService::get('admin_email');
$apiKey = SettingsService::get('elasticemail_api_key');

// Get admin email (helper method)
$adminEmail = SettingsService::getAdminEmail();

// Get contact email (helper method)
$contactEmail = SettingsService::getContactEmail();

// Set a setting
SettingsService::set('admin_email', 'new-email@example.com');

// Get all settings
$allSettings = SettingsService::all();

// Get settings by group
$emailSettings = SettingsService::getByGroup('email');
```

### Using Setting Model Directly

```php
use App\Models\Setting;

// Get a setting
$value = Setting::get('admin_email', 'default@example.com');

// Set a setting
Setting::set('admin_email', 'new-email@example.com', [
    'type' => 'email',
    'group' => 'email',
    'label' => 'Admin Email',
]);
```

## Integration Examples

### ContactController (Already Updated)

The `ContactController` now uses settings from the database:

```php
use App\Services\SettingsService;

// Send email to admin
$result = $this->emailService->sendEmail(
    to: SettingsService::getAdminEmail(), // Uses setting from database
    // ...
);
```

### Using in Blade Templates

```blade
{{ \App\Services\SettingsService::get('site_name') }}
{{ \App\Services\SettingsService::getContactEmail() }}
```

## Security Features

1. **Encryption** - API keys and secrets are automatically encrypted in the database
2. **Password Fields** - Sensitive fields use password input with reveal option
3. **Caching** - Settings are cached to reduce database queries

## Adding New Settings

### Method 1: Via Admin Panel

1. Go to Settings page
2. Add the new setting field to the form in `ManageSettings.php`
3. The setting will be automatically saved when you submit the form

### Method 2: Programmatically

```php
use App\Models\Setting;

Setting::create([
    'key' => 'new_setting_key',
    'value' => 'default value',
    'type' => 'text',
    'group' => 'general',
    'label' => 'New Setting',
    'description' => 'Description of the setting',
    'is_encrypted' => false,
]);
```

## Database Structure

The `settings` table contains:
- `key` - Unique setting identifier
- `value` - Setting value (encrypted if `is_encrypted` is true)
- `type` - Type: text, email, password, textarea, number, boolean
- `group` - Group: general, email, api, social
- `label` - Human-readable label
- `description` - Help text
- `sort_order` - Display order
- `is_encrypted` - Whether value is encrypted

## Migration

The settings table has been created. To run the migration:

```bash
php artisan migrate
```

## Default Settings

Default settings are automatically created when you first visit the Settings page:
- Admin Email: `developers@ecareinfoway.com`
- ElasticEmail API Key: From `config/services.php`
- reCAPTCHA Keys: From `config/services.php`
- Site Name: From `config/app.php`

## Cache Management

Settings are cached for 1 hour. Cache is automatically cleared when settings are updated.

To manually clear settings cache:

```bash
php artisan cache:forget settings
```

Or in code:

```php
Cache::forget('settings');
Cache::forget('setting.admin_email'); // For specific setting
```

## Files Created/Modified

### New Files
- `app/Models/Setting.php` - Setting model
- `app/Filament/Resources/SettingResource.php` - Filament resource
- `app/Filament/Resources/SettingResource/Pages/ManageSettings.php` - Settings page
- `app/Services/SettingsService.php` - Settings helper service
- `database/migrations/2025_12_16_100121_create_settings_table.php` - Migration
- `resources/views/filament/resources/setting-resource/pages/manage-settings.blade.php` - View

### Modified Files
- `app/Http/Controllers/ContactController.php` - Now uses `SettingsService::getAdminEmail()`

## Navigation

The Settings page appears in the Filament admin panel under:
- **Navigation Group:** Settings
- **Navigation Label:** Settings
- **Icon:** Cog (⚙️)
- **Sort Order:** 1 (appears first in Settings group)

## Best Practices

1. **Use SettingsService** - Always use `SettingsService` instead of accessing `Setting` model directly
2. **Cache Awareness** - Remember that settings are cached, so changes may take up to 1 hour to reflect (or clear cache manually)
3. **Encryption** - Always mark sensitive data (API keys, secrets) as encrypted
4. **Default Values** - Always provide default values when retrieving settings
5. **Validation** - Settings are validated based on their type (email, url, etc.)

## Troubleshooting

### Settings not appearing
- Clear cache: `php artisan cache:clear`
- Clear Filament cache: `php artisan filament:cache-components`
- Visit the Settings page to initialize default settings

### Settings not saving
- Check database connection
- Verify migration ran: `php artisan migrate:status`
- Check Laravel logs: `storage/logs/laravel.log`

### Encrypted values not decrypting
- Ensure `APP_KEY` is set in `.env`
- Run: `php artisan key:generate` if needed
