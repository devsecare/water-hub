# Cloudways PHP Configuration for Large File Uploads (200+ MB)

This guide explains how to configure PHP settings on Cloudways to support file uploads of 200+ MB using the Curator plugin for Filament.

## Current Application Configuration

The following changes have already been made to your Laravel application:

✅ **Curator Configuration** (`config/curator.php`)
- `max_size` set to `250000` (250MB in kilobytes)

✅ **Livewire Configuration** (`config/livewire.php`)
- `temporary_file_upload.rules` set to `['required', 'file', 'max:256000']` (250MB)
- Configured to use `livewire-tmp` disk

✅ **Apache/Nginx Configuration** (`public/.htaccess`)
- PHP directives added for Apache servers

## Cloudways Configuration Steps

### Method 1: Using Cloudways Platform (Recommended)

Cloudways provides an easy way to configure PHP settings through their platform:

#### Step 1: Access Server Settings

1. **Log in to Cloudways Platform:**
   - Go to https://platform.cloudways.com
   - Log in with your credentials

2. **Select Your Server:**
   - Click on your server from the server list

3. **Navigate to Settings:**
   - Click on "Settings & Packages" in the left sidebar
   - Or click the "Settings" tab at the top

#### Step 2: Configure PHP Settings

1. **Open PHP Settings:**
   - Click on "PHP" in the Settings menu
   - You'll see a list of PHP versions and their configurations

2. **Edit PHP Configuration:**
   - Find your active PHP version (click "Edit" or the settings icon)
   - Look for the following settings and update them:

   ```
   upload_max_filesize = 250M
   post_max_size = 250M
   max_execution_time = 300
   max_input_time = 300
   memory_limit = 512M
   ```

3. **Save Changes:**
   - Click "Save" or "Apply Changes"
   - Cloudways will automatically restart PHP-FPM

#### Step 3: Verify Application Settings

1. **Select Your Application:**
   - Go back to the main dashboard
   - Click on your application

2. **Check Application Settings:**
   - Navigate to "Application Management" → "Application Settings"
   - Verify PHP version matches your server settings

### Method 2: Using Cloudways SSH Access

If you prefer command line access:

#### Step 1: Access Server via SSH

1. **Get SSH Credentials:**
   - Go to Server → "Master Credentials"
   - Note your SSH username and password

2. **Connect via SSH:**
   ```bash
   ssh your-username@your-server-ip
   ```

#### Step 2: Locate PHP Configuration Files

Cloudways uses PHP-FPM, so configuration files are typically located at:

```bash
# For PHP 8.1
/etc/php/8.1/fpm/php.ini
/etc/php/8.1/cli/php.ini

# For PHP 8.2
/etc/php/8.2/fpm/php.ini
/etc/php/8.2/cli/php.ini

# For PHP 8.3
/etc/php/8.3/fpm/php.ini
/etc/php/8.3/cli/php.ini
```

#### Step 3: Edit PHP Configuration

1. **Find your PHP version:**
   ```bash
   php -v
   ```

2. **Edit the PHP-FPM configuration:**
   ```bash
   sudo nano /etc/php/8.X/fpm/php.ini
   ```

3. **Update these values:**
   ```ini
   upload_max_filesize = 250M
   post_max_size = 250M
   max_execution_time = 300
   max_input_time = 300
   memory_limit = 512M
   ```

4. **Save and exit:**
   - Press `Ctrl + X`, then `Y`, then `Enter`

5. **Restart PHP-FPM:**
   ```bash
   sudo service php8.X-fpm restart
   ```

### Method 3: Using .user.ini File (Per-Application)

Cloudways supports `.user.ini` files for per-application PHP settings:

1. **Create/Edit `.user.ini` file:**
   ```bash
   # Navigate to your application's public directory
   cd /home/master/applications/your-app-id/public_html/public
   
   # Create or edit .user.ini
   nano .user.ini
   ```

2. **Add these settings:**
   ```ini
   upload_max_filesize = 250M
   post_max_size = 250M
   max_execution_time = 300
   max_input_time = 300
   memory_limit = 512M
   ```

3. **Save the file:**
   - Press `Ctrl + X`, then `Y`, then `Enter`

4. **Note:** `.user.ini` files are read every 5 minutes by PHP-FPM, or you can restart PHP-FPM manually.

## Web Server Configuration

### For Nginx (Most Cloudways Servers)

Cloudways typically uses Nginx. You may need to configure Nginx to allow large uploads:

1. **Access Nginx Configuration:**
   - Via Cloudways Platform: Settings → "NGINX Settings"
   - Or via SSH: `/etc/nginx/nginx.conf` or application-specific config

2. **Add/Update these directives:**
   ```nginx
   client_max_body_size 250M;
   client_body_timeout 300s;
   ```

3. **Restart Nginx:**
   ```bash
   sudo service nginx restart
   ```

### For Apache (If Applicable)

If your Cloudways server uses Apache:

1. **Edit Apache Configuration:**
   - Via Cloudways Platform: Settings → "Apache Settings"
   - Or via SSH: Edit your virtual host configuration

2. **Add these directives:**
   ```apache
   LimitRequestBody 262144000
   ```

3. **Restart Apache:**
   ```bash
   sudo service apache2 restart
   ```

## Verify Configuration

### Step 1: Check PHP Settings

Create a temporary PHP info file:

1. **Via Cloudways File Manager:**
   - Go to Application → "File Manager"
   - Navigate to `public` directory
   - Create a new file named `phpinfo.php`
   - Add this content:
     ```php
     <?php phpinfo(); ?>
     ```

2. **Access the file:**
   - Visit: `https://your-domain.com/phpinfo.php`
   - Search for:
     - `upload_max_filesize` (should show 250M)
     - `post_max_size` (should show 250M)
     - `max_execution_time` (should show 300)
     - `memory_limit` (should show 512M)

3. **Delete the file:**
   - **IMPORTANT:** Delete `phpinfo.php` immediately after checking for security reasons

### Step 2: Check via SSH

```bash
php -i | grep upload_max_filesize
php -i | grep post_max_size
php -i | grep max_execution_time
php -i | grep memory_limit
```

### Step 3: Clear Laravel Cache

After making changes, clear Laravel's configuration cache:

```bash
cd /home/master/applications/your-app-id/public_html
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

## Testing the Upload

1. **Access Filament Admin:**
   - Go to `https://your-domain.com/admin`
   - Log in to your admin panel

2. **Navigate to Media:**
   - Go to Media/Curator section

3. **Test Upload:**
   - Try uploading a file larger than 200MB
   - The upload should now work without errors

## Troubleshooting

### Issue: Changes Not Taking Effect

**Solution:**
1. Restart PHP-FPM:
   ```bash
   sudo service php8.X-fpm restart
   ```

2. Clear Laravel cache:
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

3. Wait 5 minutes if using `.user.ini` (PHP-FPM checks every 5 minutes)

### Issue: 413 Request Entity Too Large (Nginx)

**Solution:**
- Increase `client_max_body_size` in Nginx configuration
- Restart Nginx: `sudo service nginx restart`

### Issue: 413 Request Entity Too Large (Apache)

**Solution:**
- Increase `LimitRequestBody` in Apache configuration
- Restart Apache: `sudo service apache2 restart`

### Issue: Timeout Errors

**Solution:**
- Increase `max_execution_time` and `max_input_time` in PHP settings
- Check Nginx/Apache timeout settings
- Consider using chunked uploads for very large files

### Issue: Memory Limit Errors

**Solution:**
- Increase `memory_limit` in PHP settings (should be at least 2x upload size)
- Check available server memory

### Check Error Logs

1. **Laravel Logs:**
   ```bash
   tail -f storage/logs/laravel.log
   ```

2. **PHP-FPM Error Log:**
   ```bash
   tail -f /var/log/php8.X-fpm.log
   ```

3. **Nginx Error Log:**
   ```bash
   tail -f /var/log/nginx/error.log
   ```

## Cloudways Support

If you encounter issues:

1. **Contact Cloudways Support:**
   - Use the in-platform chat support
   - They can help configure PHP settings for you

2. **Cloudways Documentation:**
   - Visit: https://support.cloudways.com
   - Search for "PHP configuration" or "file upload limits"

## Security Notes

1. **Delete phpinfo.php:**
   - Never leave `phpinfo.php` files on production servers
   - They expose sensitive server information

2. **File Size Limits:**
   - Only increase limits as needed
   - Consider implementing chunked uploads for very large files

3. **Server Resources:**
   - Monitor server resources (CPU, memory, disk)
   - Large file uploads can impact server performance

## Summary

After completing these steps:

✅ PHP `upload_max_filesize` = 250M  
✅ PHP `post_max_size` = 250M  
✅ PHP `max_execution_time` = 300  
✅ PHP `memory_limit` = 512M  
✅ Nginx `client_max_body_size` = 250M (if using Nginx)  
✅ Laravel cache cleared  
✅ Application ready for 200+ MB file uploads

Your Curator plugin should now successfully handle file uploads up to 250MB!
