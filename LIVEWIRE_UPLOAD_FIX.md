# Livewire Upload Error Fix

## Problem
Error: `League\Flysystem\UnableToRetrieveMetadata - Unable to retrieve the file_size for file at location: livewire-tmp/...`

This error occurs because Livewire's temporary uploads were trying to use the `local` disk which points to `storage/app/private`, but Livewire expects files in `storage/app/livewire-tmp/`.

## Solution Applied

### 1. Added Livewire Temporary Upload Disk
Added a dedicated disk in `config/filesystems.php`:
```php
'livewire-tmp' => [
    'driver' => 'local',
    'root' => storage_path('app/livewire-tmp'),
    'visibility' => 'private',
    'throw' => false,
    'report' => false,
],
```

### 2. Configured Livewire to Use the New Disk
Updated `app/Providers/AppServiceProvider.php` to:
- Create the directory if it doesn't exist
- Configure Livewire to use the `livewire-tmp` disk

## Additional Steps Required on Server

### 1. Ensure Directory Exists and Has Proper Permissions
```bash
# Create the directory if it doesn't exist
mkdir -p storage/app/livewire-tmp

# Set proper permissions (adjust user/group as needed)
chmod -R 775 storage/app/livewire-tmp
chown -R www-data:www-data storage/app/livewire-tmp  # For Apache/Nginx
# OR
chown -R $USER:www-data storage/app/livewire-tmp      # Adjust as needed
```

### 2. Clear Configuration Cache
```bash
php artisan config:clear
php artisan cache:clear
```

### 3. Verify Directory Permissions
The web server user (www-data, nginx, apache, etc.) needs write access to:
- `storage/app/livewire-tmp/`
- `storage/app/public/` (for Curator uploads)

### 4. Test the Upload
1. Go to `/admin/media/create`
2. Try uploading an image
3. The error should be resolved

## Troubleshooting

### If the error persists:

1. **Check directory permissions:**
   ```bash
   ls -la storage/app/
   # Should show livewire-tmp directory with proper permissions
   ```

2. **Check disk configuration:**
   ```bash
   php artisan tinker
   Storage::disk('livewire-tmp')->exists('test.txt')  # Should return false (directory exists)
   ```

3. **Verify the disk is accessible:**
   ```bash
   php artisan tinker
   Storage::disk('livewire-tmp')->put('test.txt', 'test');
   Storage::disk('livewire-tmp')->get('test.txt');  # Should return 'test'
   Storage::disk('livewire-tmp')->delete('test.txt');
   ```

4. **Check Laravel logs:**
   ```bash
   tail -f storage/logs/laravel.log
   ```

5. **Verify SELinux (if applicable):**
   ```bash
   # If SELinux is enabled, you may need to set context
   chcon -R -t httpd_sys_rw_content_t storage/app/livewire-tmp
   ```

## Notes

- The `livewire-tmp` directory will be automatically created by the AppServiceProvider if it doesn't exist
- Temporary files in this directory are automatically cleaned up by Livewire
- Make sure your server has enough disk space for temporary uploads
- The `max_size` in `config/curator.php` is set to 5000 KB (5 MB) - adjust if needed

