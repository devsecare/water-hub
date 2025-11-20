# Curator Migration Guide

This guide documents the migration from Spatie Media Library to Filament Curator.

## Files Updated

1. **app/Models/Media.php** - Updated to extend Curator's Media model instead of Spatie's
2. **database/migrations/2025_11_19_000000_drop_spatie_media_table.php** - New migration to drop Spatie table
3. **database/migrations/2025_11_11_092127_create_media_table.php** - Updated with down() method

## Steps to Complete Migration

### 1. Backup Your Database
```bash
# Create a backup before proceeding
php artisan db:backup  # or use your preferred backup method
```

### 2. Remove Spatie Media Library Package
```bash
composer remove spatie/laravel-medialibrary
```

### 3. Publish Curator Migrations
```bash
php artisan vendor:publish --tag=curator-migrations
```

This will publish Curator's media table migration. The migration file will be something like:
`YYYY_MM_DD_HHMMSS_create_media_table.php`

### 4. Run Migrations
```bash
php artisan migrate
```

This will:
- Drop the old Spatie media table (via `2025_11_19_000000_drop_spatie_media_table.php`)
- Create Curator's media table structure (via the published Curator migration)

### 5. Publish Curator Config (Optional but Recommended)
```bash
php artisan vendor:publish --tag=curator-config
```

Then update `config/curator.php` to use your custom Media model:
```php
'model' => \App\Models\Media::class,
```

### 6. Clear Caches
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
composer dump-autoload
```

### 7. Rebuild Assets (if needed)
```bash
npm run build
```

## Verification

After completing the steps above:

1. ✅ Check that `spatie/laravel-medialibrary` is removed from `composer.json`
2. ✅ Verify `app/Models/Media.php` extends `Awcodes\Curator\Models\Media`
3. ✅ Confirm Curator migrations are published and run
4. ✅ Check that the media table has Curator's structure (not Spatie's)
5. ✅ Access Filament admin panel and verify "Media" appears in navigation
6. ✅ Test uploading an image through Curator
7. ✅ Check logs for any errors related to Media model

## Important Notes

### Data Migration
⚠️ **WARNING**: If you have existing media files in the Spatie format, you'll need a custom migration script to move them to Curator's format. The table structures are different.

### File Storage
Curator stores files differently than Spatie. Make sure your existing files are accessible or plan to migrate them.

### Relationships
If any models have relationships with the old Media model, they should continue to work since we're keeping the same `App\Models\Media` class name, just changing what it extends.

### MediaLibrary Model
The `app/Models/MediaLibrary.php` model appears to be a separate custom model and can coexist with Curator if needed.

## Troubleshooting

### Issue: Migration conflicts
If you get migration conflicts, you may need to:
1. Check the migration order
2. Ensure the drop migration runs before Curator's create migration
3. Manually adjust timestamps if needed

### Issue: Media model not found
If you get errors about Media model:
1. Run `composer dump-autoload`
2. Clear config cache: `php artisan config:clear`
3. Verify the Media model extends `Awcodes\Curator\Models\Media`

### Issue: Curator not showing in navigation
1. Verify CuratorPlugin is registered in `AdminPanelProvider.php`
2. Clear view cache: `php artisan view:clear`
3. Check that migrations ran successfully

## Rollback (if needed)

If you need to rollback:
1. Restore your database backup
2. Run `composer require spatie/laravel-medialibrary`
3. Revert the Media model changes
4. Remove the drop migration file

