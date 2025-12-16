# Herd PHP Configuration for Large File Uploads

## Current Status
Your PHP settings are currently:
- `upload_max_filesize`: 2M
- `post_max_size`: 2M

These need to be increased to **250M** to support 200+ MB file uploads.

## How to Configure Herd

### Option 1: Using Herd GUI (Recommended)

1. **Open Herd Settings:**
   - Click the Herd icon in your macOS menu bar (top right)
   - Select "Open Herd Settings" or "Preferences"

2. **Navigate to PHP Settings:**
   - Click on the "PHP" tab in Herd settings
   - You'll see a list of PHP versions and their configurations

3. **Edit PHP Configuration:**
   - Find your active PHP version (likely 8.3.28 based on your system)
   - Click "Edit" or the settings icon next to it
   - Look for or add these settings:
     ```
     upload_max_filesize = 250M
     post_max_size = 250M
     max_execution_time = 300
     max_input_time = 300
     memory_limit = 512M
     ```

4. **Save and Restart:**
   - Save the configuration
   - Restart Herd services (or restart your Mac)

### Option 2: Using Herd CLI

If you prefer command line:

```bash
# Find your PHP ini file location
php --ini

# Edit the php.ini file (usually in ~/.config/herd/config/php/8.3/php.ini)
# Add or modify these lines:
upload_max_filesize = 250M
post_max_size = 250M
max_execution_time = 300
max_input_time = 300
memory_limit = 512M
```

### Option 3: Using .user.ini (May not work with Herd)

The `.user.ini` file in `public/.user.ini` may not be read by Herd. If it doesn't work, use Option 1 or 2 above.

## Verify Configuration

After making changes, verify the settings:

```bash
php -r "echo 'upload_max_filesize: ' . ini_get('upload_max_filesize') . PHP_EOL; echo 'post_max_size: ' . ini_get('post_max_size') . PHP_EOL;"
```

You should see:
```
upload_max_filesize: 250M
post_max_size: 250M
```

## Important Notes

1. **Restart Required:** After changing PHP settings, you must restart Herd or your web server for changes to take effect.

2. **Both Values Must Match:** `post_max_size` should be equal to or greater than `upload_max_filesize`.

3. **Memory Limit:** The `memory_limit` should be at least 2x the upload size to handle processing.

4. **Timeout Settings:** `max_execution_time` and `max_input_time` are set to 300 seconds (5 minutes) to allow for large file uploads.

## Troubleshooting

If changes don't take effect:

1. **Check which PHP Herd is using:**
   ```bash
   which php
   php --version
   ```

2. **Verify the correct php.ini is being used:**
   ```bash
   php --ini
   ```

3. **Restart Herd completely:**
   - Quit Herd from the menu bar
   - Restart Herd
   - Or restart your Mac

4. **Check Herd logs:**
   - Herd logs are usually in `~/Library/Logs/Herd/`

## Next Steps

After configuring PHP settings:

1. Clear Laravel cache:
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

2. Test the upload:
   - Go to your Filament admin panel
   - Navigate to Media/Curator
   - Try uploading a file larger than 200MB

3. Check for errors:
   ```bash
   tail -f storage/logs/laravel.log
   ```
