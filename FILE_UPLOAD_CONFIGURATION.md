# File Upload Configuration for 200+ MB Files

This document explains the changes made to support file uploads of 200+ MB using the Curator plugin for Filament.

## Changes Made

### 1. Curator Configuration (`config/curator.php`)
- Updated `max_size` from `160000` (160MB) to `250000` (250MB) in kilobytes
- This allows Curator to accept files up to 250MB

### 2. Livewire Configuration (`config/livewire.php`)
- Published Livewire config file using `php artisan livewire:publish --config`
- Updated `temporary_file_upload.rules` to `['required', 'file', 'max:256000']` (250MB in KB)
- Set `temporary_file_upload.disk` to `'livewire-tmp'` to use the dedicated disk
- Increased `max_upload_time` to 10 minutes for large file uploads
- This ensures Livewire (used by Filament) can handle large file uploads

### 3. PHP Configuration
Created `public/.user.ini` with the following settings:
- `upload_max_filesize = 250M`
- `post_max_size = 250M`
- `max_execution_time = 300` (5 minutes)
- `max_input_time = 300` (5 minutes)
- `memory_limit = 512M`

### 4. Apache Configuration (`public/.htaccess`)
Added PHP directives for Apache servers (if using mod_php):
- `upload_max_filesize = 250M`
- `post_max_size = 250M`
- `max_execution_time = 300`
- `max_input_time = 300`
- `memory_limit = 512M`

## Additional Steps Required

### For Different Hosting Environments

Choose the guide that matches your hosting environment:

- **Laravel Herd (macOS)**: See `HERD_PHP_CONFIGURATION.md`
- **Cloudways**: See `CLOUDWAYS_PHP_CONFIGURATION.md`
- **Other Production Servers**: Follow the instructions below

### For Laravel Herd (macOS)

See `HERD_PHP_CONFIGURATION.md` for detailed instructions.

Since you're using Laravel Herd, you need to configure PHP settings through Herd:

1. **Open Herd Settings:**
   - Click the Herd icon in your menu bar
   - Select "Open Herd Settings" or "Preferences"

2. **Configure PHP Settings:**
   - Go to the PHP section
   - Set the following values:
     - `upload_max_filesize` = `250M`
     - `post_max_size` = `250M`
     - `max_execution_time` = `300`
     - `max_input_time` = `300`
     - `memory_limit` = `512M`

3. **Restart Herd:**
   - After making changes, restart Herd services

### For Cloudways

See `CLOUDWAYS_PHP_CONFIGURATION.md` for detailed Cloudways-specific instructions.

### For Other Production Servers

#### Nginx Configuration
If using Nginx, add these directives to your server block:

```nginx
client_max_body_size 250M;
client_body_timeout 300s;
```

#### PHP-FPM Configuration
Update your `php.ini` or PHP-FPM pool configuration:

```ini
upload_max_filesize = 250M
post_max_size = 250M
max_execution_time = 300
max_input_time = 300
memory_limit = 512M
```

#### Apache Configuration
If using Apache with mod_php, the `.htaccess` file should work. If using PHP-FPM, you may need to configure it in your virtual host or `php.ini`.

### Verify Configuration

After making changes, verify the settings:

1. **Check PHP Settings:**
   ```bash
   php -i | grep upload_max_filesize
   php -i | grep post_max_size
   ```

2. **Or create a test file:**
   Create `public/phpinfo.php` (temporarily):
   ```php
   <?php phpinfo(); ?>
   ```
   Visit `http://your-domain/phpinfo.php` and check:
   - `upload_max_filesize`
   - `post_max_size`
   - `max_execution_time`
   - `memory_limit`

   **Important:** Delete `phpinfo.php` after checking for security reasons.

3. **Clear Laravel Cache:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

## Testing

1. Go to your Filament admin panel
2. Navigate to Media/Curator
3. Try uploading a file larger than 200MB
4. The upload should now work without errors

## Troubleshooting

### If uploads still fail:

1. **Check PHP error logs:**
   ```bash
   tail -f storage/logs/laravel.log
   ```

2. **Verify all settings are applied:**
   - Curator config: `config/curator.php` → `max_size` should be `250000`
   - Livewire: Check `config/livewire.php` → `temporary_file_upload.rules` should have `max:256000`
   - PHP: Verify `upload_max_filesize` and `post_max_size` are both 250M or higher

3. **Check server limits:**
   - Nginx: `client_max_body_size`
   - Apache: `LimitRequestBody` (if set)
   - Cloud providers: Check their upload limits

4. **Check disk space:**
   ```bash
   df -h storage/app/livewire-tmp
   df -h storage/app/public
   ```

5. **Check permissions:**
   ```bash
   chmod -R 775 storage/app/livewire-tmp
   chmod -R 775 storage/app/public
   ```

## Notes

- The `max_size` in Curator config is in **kilobytes** (250000 KB = 250MB)
- The Livewire `max` rule in `temporary_file_upload.rules` is in **kilobytes** (256000 KB = 250MB)
- PHP settings use **M** for megabytes (250M = 250MB)
- Always ensure `post_max_size` is equal to or greater than `upload_max_filesize`
- For very large files (500MB+), you may need to increase these values further
