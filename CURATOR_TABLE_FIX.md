# Curator Media Table Fix

## Problem
Error: `SQLSTATE[42S22]: Column not found: 1054 Unknown column 'alt' in 'INSERT INTO'`

This error occurs because the `media` table doesn't have Curator's required columns. The table still has the old Spatie Media Library structure (or was dropped but not recreated with Curator's structure).

## Solution Applied

### 1. Created Curator Media Table Migration
Created `database/migrations/2025_11_20_000000_create_curator_media_table.php` with all required Curator columns:
- `name` (unique)
- `file_name`
- `mime_type`
- `disk`
- `directory`
- `visibility`
- `path`
- `alt`
- `title`
- `caption`
- `description`
- `exif` (JSON)
- `curations` (JSON)
- `width`
- `height`
- `size`
- `type`
- `ext`
- `timestamps`

### 2. Updated Curator Config
Updated `config/curator.php` to use your custom Media model:
```php
'model' => \App\Models\Media::class,
```

## Steps to Run on Server

### 1. Run the Migration
```bash
php artisan migrate
```

This will:
- Drop the existing `media` table (if it exists)
- Create the new Curator media table with all required columns

### 2. If Migration Fails (Table Already Exists)
If you get an error that the table already exists, you have two options:

**Option A: Fresh Migration (Recommended if no important data)**
```bash
php artisan migrate:fresh
# OR
php artisan migrate:refresh
```

**Option B: Manual Drop and Migrate**
```bash
php artisan tinker
# Then run:
Schema::dropIfExists('media');
exit

php artisan migrate
```

### 3. Clear Caches
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### 4. Verify the Table Structure
```bash
php artisan tinker
# Then run:
Schema::getColumnListing('media');
# Should show all the Curator columns including 'alt', 'title', 'caption', etc.
```

### 5. Test Upload
1. Go to `/admin/media/create`
2. Try uploading an image
3. The error should be resolved

## Migration Order

The migrations will run in this order:
1. `2025_11_11_092127_create_media_table.php` - Creates Spatie table (if doesn't exist)
2. `2025_11_19_000000_drop_spatie_media_table.php` - Drops Spatie table
3. `2025_11_20_000000_create_curator_media_table.php` - Creates Curator table ✅
4. `2025_11_18_105122_add_tenant_aware_column_to_media_table.php` - Adds tenant column (if enabled)

## Troubleshooting

### If migration says table already exists:
The migration includes `Schema::dropIfExists('media')` so it should handle this automatically. If you still get errors:

1. Check current table structure:
   ```bash
   php artisan tinker
   DB::select('DESCRIBE media');
   ```

2. Manually drop and recreate:
   ```bash
   php artisan migrate:rollback --step=1
   php artisan migrate
   ```

### If columns are still missing:
1. Verify the migration ran:
   ```bash
   php artisan migrate:status
   ```

2. Check if the migration file exists:
   ```bash
   ls -la database/migrations/ | grep curator
   ```

3. Force run the migration:
   ```bash
   php artisan migrate --force
   ```

## Notes

- The migration will drop any existing `media` table data
- If you have important data, back it up first
- The `curations` column stores JSON data for image crops/focal points
- The `exif` column stores image metadata as JSON
- Tenant-aware column will be added separately if `is_tenant_aware` is true in config

