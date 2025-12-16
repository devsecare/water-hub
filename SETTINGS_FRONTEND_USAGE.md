# Settings Frontend Usage

## Summary

Here's which settings are currently used on the frontend and which are backend-only:

### ✅ **Currently Used on Frontend:**

1. **reCAPTCHA Site Key** (`recaptcha_site_key`)
   - **Location:** `resources/views/contact_us.blade.php`
   - **Usage:** Loads Google reCAPTCHA v3 script on contact form
   - **Updated:** Now uses `SettingsService` instead of config file

2. **Site Name** (`site_name`)
   - **Location:** `resources/views/layouts/frontend.blade.php`
   - **Usage:** Used as fallback page title and Open Graph site name
   - **Updated:** Now uses `SettingsService` instead of hardcoded value

3. **Site URL** (`site_url`)
   - **Location:** `resources/views/layouts/frontend.blade.php`
   - **Usage:** Used in Open Graph canonical URLs
   - **Updated:** Now uses `SettingsService` instead of config

4. **Site Description** (`site_description`)
   - **Location:** `resources/views/layouts/frontend.blade.php`
   - **Usage:** Available for meta descriptions (can be used as fallback)
   - **Status:** Loaded but not yet actively used in meta tags

### ❌ **Backend Only (Not Used on Frontend):**

1. **Admin Email** (`admin_email`)
   - **Location:** `app/Http/Controllers/ContactController.php`
   - **Usage:** Email address to receive contact form submissions
   - **Status:** ✅ Already using `SettingsService`

2. **Contact Email** (`contact_email`)
   - **Status:** Not currently used anywhere
   - **Potential Use:** Could be displayed on contact page or footer

3. **No-Reply Email** (`noreply_email`)
   - **Usage:** Used for sending automated emails (password resets, etc.)
   - **Status:** Backend only

4. **ElasticEmail API Key** (`elasticemail_api_key`)
   - **Usage:** Backend only - for sending emails via ElasticEmail
   - **Status:** Backend only

5. **reCAPTCHA Secret Key** (`recaptcha_secret_key`)
   - **Location:** `app/Services/RecaptchaService.php`
   - **Usage:** Server-side reCAPTCHA verification
   - **Updated:** Now uses `SettingsService` instead of config file

## Recent Updates

### Files Updated to Use Settings from Database:

1. **`resources/views/contact_us.blade.php`**
   ```php
   // Before:
   $recaptchaSiteKey = config('services.recaptcha.site_key', '');
   
   // After:
   $recaptchaSiteKey = \App\Services\SettingsService::get('recaptcha_site_key', config('services.recaptcha.site_key', ''));
   ```

2. **`resources/views/layouts/frontend.blade.php`**
   ```php
   // Added:
   $siteName = \App\Services\SettingsService::get('site_name', config('app.name', 'PPP Water Hub'));
   $siteUrl = \App\Services\SettingsService::get('site_url', config('app.url', ''));
   $siteDescription = \App\Services\SettingsService::get('site_description', '');
   
   // Used in:
   - Page title fallback
   - Open Graph site_name meta tag
   - Open Graph URL meta tag
   ```

3. **`app/Services/RecaptchaService.php`**
   ```php
   // Before:
   $secretKey = config('services.recaptcha.secret_key');
   
   // After:
   $secretKey = SettingsService::get('recaptcha_secret_key', config('services.recaptcha.secret_key'));
   ```

## Benefits

✅ **Centralized Management** - All settings can be changed from admin panel without editing code  
✅ **Fallback Support** - Still uses config files as fallback if settings not found  
✅ **No Code Changes Needed** - Update settings in admin panel, changes reflect immediately  
✅ **Consistent** - Both frontend and backend now use the same settings source  

## Potential Future Uses

### Contact Email
Could be displayed on:
- Contact page (`resources/views/contact_us.blade.php`)
- Footer (`resources/views/partials/footer.blade.php`)
- Privacy Policy page

### Site Description
Could be used as:
- Default meta description when SEO meta is not set
- Footer description
- About page content

## How to Use Settings in Frontend

```blade
{{-- In Blade templates --}}
@php
    $siteName = \App\Services\SettingsService::get('site_name', config('app.name'));
    $contactEmail = \App\Services\SettingsService::getContactEmail();
@endphp

<h1>{{ $siteName }}</h1>
<a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>
```

Or directly:

```blade
{{ \App\Services\SettingsService::get('site_name') }}
{{ \App\Services\SettingsService::getContactEmail() }}
```
