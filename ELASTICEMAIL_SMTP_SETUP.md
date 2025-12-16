# ElasticEmail SMTP Configuration for Laravel

This guide explains how to configure Laravel to send emails via ElasticEmail using SMTP.

## ElasticEmail SMTP Settings

- **Host:** `smtp.elasticemail.com`
- **Port:** `587`
- **Protocol:** `TLS`
- **SMTP Auth:** `Plain`
- **Username:** Your ElasticEmail API key
- **Password:** Your ElasticEmail API key

## Configuration Steps

### 1. Update `.env` File

Add or update the following environment variables in your `.env` file:

```env
# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.elasticemail.com
MAIL_PORT=587
MAIL_USERNAME=0D17EB4F1011867E2F93A0D99A0292C6C0F40DB42645441DB2F71296070C842E5523486E3F25523096965DE29DE7D611
MAIL_PASSWORD=0D17EB4F1011867E2F93A0D99A0292C6C0F40DB42645441DB2F71296070C842E5523486E3F25523096965DE29DE7D611
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"
```

**Important Notes:**
- `MAIL_USERNAME` and `MAIL_PASSWORD` should both be set to your ElasticEmail API key
- `MAIL_FROM_ADDRESS` must be a verified email address in your ElasticEmail account
- `MAIL_ENCRYPTION` is set to `tls` (not `ssl`) for port 587

### 2. Verify Your Email Address in ElasticEmail

Before sending emails, you need to verify your sender email address:

1. Log in to your ElasticEmail account
2. Go to **Settings** → **Domains** or **Settings** → **Email Accounts**
3. Add and verify your domain or email address
4. Use a verified email address in `MAIL_FROM_ADDRESS`

### 3. Clear Configuration Cache

After updating the `.env` file, clear Laravel's configuration cache:

```bash
php artisan config:clear
php artisan cache:clear
```

### 4. Test Email Sending

You can test the email configuration using Laravel's Tinker:

```bash
php artisan tinker
```

Then run:

```php
Mail::raw('Test email from Laravel', function ($message) {
    $message->to('your-email@example.com')
            ->subject('Test Email');
});
```

Or create a test route:

```php
Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email from Laravel via ElasticEmail SMTP', function ($message) {
            $message->to('your-email@example.com')
                    ->subject('Test Email - ElasticEmail SMTP');
        });
        
        return 'Email sent successfully!';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
```

## Configuration Details

### Mail Configuration File

The mail configuration is located at `config/mail.php`. The SMTP settings are:

```php
'smtp' => [
    'transport' => 'smtp',
    'host' => env('MAIL_HOST', '127.0.0.1'),
    'port' => env('MAIL_PORT', 2525),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    // ...
],
```

### Environment Variables Explained

| Variable | Description | Example |
|----------|-------------|---------|
| `MAIL_MAILER` | Mail driver to use | `smtp` |
| `MAIL_HOST` | SMTP server hostname | `smtp.elasticemail.com` |
| `MAIL_PORT` | SMTP server port | `587` |
| `MAIL_USERNAME` | SMTP username (API key) | Your ElasticEmail API key |
| `MAIL_PASSWORD` | SMTP password (API key) | Your ElasticEmail API key |
| `MAIL_ENCRYPTION` | Encryption method | `tls` |
| `MAIL_FROM_ADDRESS` | Default sender email | `noreply@yourdomain.com` |
| `MAIL_FROM_NAME` | Default sender name | `Your App Name` |

## Troubleshooting

### Common Issues

#### 1. "Connection could not be established"

**Solution:**
- Verify `MAIL_HOST` is set to `smtp.elasticemail.com`
- Check that port `587` is not blocked by firewall
- Ensure `MAIL_ENCRYPTION` is set to `tls` (not `ssl`)

#### 2. "Authentication failed"

**Solution:**
- Verify your API key is correct in both `MAIL_USERNAME` and `MAIL_PASSWORD`
- Make sure there are no extra spaces in the API key
- Check that your ElasticEmail account is active

#### 3. "Sender address not verified"

**Solution:**
- Verify the email address in `MAIL_FROM_ADDRESS` in your ElasticEmail account
- Use an email address from a verified domain
- Check ElasticEmail dashboard → Settings → Domains

#### 4. Emails going to spam

**Solution:**
- Verify your domain with SPF and DKIM records in ElasticEmail
- Use a verified sender email address
- Avoid spam trigger words in subject and content

### Check Logs

If emails aren't sending, check Laravel logs:

```bash
tail -f storage/logs/laravel.log
```

Look for mail-related errors and exceptions.

### Test Connection

You can test the SMTP connection using a simple PHP script:

```php
<?php
$smtp = [
    'host' => 'smtp.elasticemail.com',
    'port' => 587,
    'username' => 'your-api-key',
    'password' => 'your-api-key',
];

$connection = @fsockopen($smtp['host'], $smtp['port'], $errno, $errstr, 30);
if ($connection) {
    echo "Connection successful!";
    fclose($connection);
} else {
    echo "Connection failed: $errstr ($errno)";
}
```

## Alternative: Using ElasticEmail API

If you prefer to use ElasticEmail's API instead of SMTP, the project already has `ElasticEmailService` configured. You can continue using the API method, which is already set up in:

- `app/Services/ElasticEmailService.php`
- `config/services.php`

The API method doesn't require SMTP configuration and may be more reliable for high-volume sending.

## Security Notes

1. **Never commit `.env` file** to version control
2. **Keep your API key secure** - treat it like a password
3. **Use environment-specific configurations** for different environments (development, staging, production)
4. **Rotate API keys** periodically for security

## Additional Resources

- [ElasticEmail SMTP Documentation](https://elasticemail.com/support/smtp-settings/)
- [Laravel Mail Documentation](https://laravel.com/docs/mail)
- [Cloudways Email Setup Guide](https://www.cloudways.com/blog/send-email-in-laravel/)

## Current Setup

Your project currently uses:
- **ElasticEmailService** for API-based email sending (contact form)
- **Laravel Mail** can now be configured for SMTP-based sending

Both methods can coexist. The contact form uses the API method, while other Laravel Mail features (password resets, notifications, etc.) will use SMTP if configured.
