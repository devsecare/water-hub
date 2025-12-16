# ElasticEmail API Setup Guide

## Overview

Your Laravel application is now configured to use the **ElasticEmail API** instead of SMTP for sending emails. This package ([flexflux/laravel-elastic-email](https://github.com/wouterdeberg/laravel-elastic-email)) provides a cleaner integration with ElasticEmail's API.

## ✅ What's Already Done

1. ✅ Package installed: `flexflux/laravel-elastic-email` (v2.1.3)
2. ✅ Mail configuration updated in `config/mail.php`
3. ✅ Default mailer set to `elastic_email`
4. ✅ API key configured (uses `ELASTICEMAIL_API_KEY` from `.env`)

## Configuration

### Current Setup

The mailer is configured in `config/mail.php`:

```php
'default' => env('MAIL_MAILER', 'elastic_email'),

'mailers' => [
    // ... other mailers ...
    
    'elastic_email' => [
        'transport' => 'elastic_email',
        'key' => env('ELASTIC_KEY', env('ELASTICEMAIL_API_KEY')),
    ],
],
```

### Environment Variables

Your `.env` file should have:

```env
MAIL_MAILER=elastic_email
ELASTICEMAIL_API_KEY=your_api_key_here
```

**Note:** The package looks for `ELASTIC_KEY` first, but we've configured it to fallback to `ELASTICEMAIL_API_KEY` (which you already have).

### Optional: Add ELASTIC_KEY

If you want to use the package's default variable name, add this to your `.env`:

```env
ELASTIC_KEY=your_api_key_here
```

Or keep using `ELASTICEMAIL_API_KEY` - both will work.

## Benefits of Using API vs SMTP

✅ **More Reliable** - Direct API integration, no SMTP connection issues  
✅ **Better Error Handling** - Get detailed error responses from ElasticEmail  
✅ **Faster** - No SMTP handshake, direct HTTP requests  
✅ **Better Logging** - API responses provide more detailed information  
✅ **No Port/Firewall Issues** - Uses standard HTTP/HTTPS  

## Usage

### Standard Laravel Mail Usage

The package works exactly like Laravel's native mailers:

```php
use Illuminate\Support\Facades\Mail;

Mail::raw('Email body', function ($message) {
    $message->to('user@example.com')
            ->subject('Test Email');
});
```

### Using Mailable Classes

```php
use App\Mail\ContactNotification;
use Illuminate\Support\Facades\Mail;

Mail::to('user@example.com')->send(new ContactNotification($data));
```

### Testing

Use the test command (works on Cloudways without Tinker):

```bash
php artisan mail:test
```

Or specify a different email:

```bash
php artisan mail:test your-email@example.com
```

## Current Implementation

Your application already uses this in:

1. **ContactController** - Sends contact form notifications
2. **TestMail Command** - For testing emails
3. **All Laravel Mail calls** - Automatically use ElasticEmail API

## Switching Back to SMTP

If you need to switch back to SMTP temporarily:

1. Update `.env`:
   ```env
   MAIL_MAILER=smtp
   ```

2. Clear config cache:
   ```bash
   php artisan config:clear
   ```

## Troubleshooting

### Email Not Sending

1. **Check API Key**: Verify `ELASTICEMAIL_API_KEY` is correct in `.env`
2. **Clear Config Cache**: `php artisan config:clear`
3. **Check ElasticEmail Dashboard**: Look for API errors or rate limits
4. **Verify Sender Domain**: Ensure your "from" domain is verified in ElasticEmail

### Check Logs

```bash
tail -f storage/logs/laravel.log | grep -i email
```

### Test Connection

```bash
php artisan mail:test developers@ecareinfoway.com
```

## Package Documentation

- **GitHub**: https://github.com/wouterdeberg/laravel-elastic-email
- **Version**: 2.1.3 (Laravel 9+ compatible)
- **License**: MIT

## Migration from SMTP

If you were using SMTP before:

1. ✅ Package is already installed
2. ✅ Configuration is already updated
3. ✅ Default mailer is set to `elastic_email`
4. ✅ No code changes needed - all existing `Mail::` calls work automatically

## Settings Integration

The Settings system (`SettingsService`) works seamlessly with this setup:

- **Admin Email**: Used for receiving notifications
- **From Address**: Configured in `.env` (`MAIL_FROM_ADDRESS`)
- **API Key**: Can be stored in Settings (optional, currently in `.env`)

## Next Steps

1. ✅ Test email sending: `php artisan mail:test`
2. ✅ Verify emails are received
3. ✅ Check ElasticEmail dashboard for delivery status
4. ✅ Monitor logs for any issues

## Support

For issues with the package:
- GitHub Issues: https://github.com/wouterdeberg/laravel-elastic-email/issues

For ElasticEmail account issues:
- ElasticEmail Support: https://elasticemail.com/support
