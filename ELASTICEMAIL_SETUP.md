# ElasticEmail Integration Setup

## Configuration

Add the following to your `.env` file:

```
ELASTICEMAIL_API_KEY=0D17EB4F1011867E2F93A0D99A0292C6C0F40DB42645441DB2F71296070C842E5523486E3F25523096965DE29DE7D611
ELASTICEMAIL_FROM_EMAIL=your-verified-email@yourdomain.com
```

**IMPORTANT:** The `ELASTICEMAIL_FROM_EMAIL` must be an email address from a **verified domain** in your ElasticEmail account. 

### How to Verify Your Domain in ElasticEmail:

1. Log in to your ElasticEmail account
2. Go to **Settings** → **Domains**
3. Add and verify your domain (you'll need to add DNS records)
4. Once verified, use an email address from that domain (e.g., `noreply@yourdomain.com` or `contact@yourdomain.com`)

**Alternative:** If you haven't verified a domain yet, you can use ElasticEmail's default sender email (check your ElasticEmail account settings for the default verified email).

## How It Works

1. When a user submits the contact form at `/contact-us`, the data is saved to the database
2. An email notification is automatically sent to `developers@ecareinfoway.com` via ElasticEmail
3. The email includes:
   - Name
   - Organisation (if provided)
   - Email address
   - Message
   - Submission timestamp

## Files Created/Modified

- `app/Services/ElasticEmailService.php` - Service class for sending emails via ElasticEmail API
- `app/Mail/ContactFormNotification.php` - Mailable class for contact form notifications
- `resources/views/emails/contact-form-notification.blade.php` - Email template
- `app/Http/Controllers/ContactController.php` - Updated to send email after form submission
- `config/services.php` - Added ElasticEmail configuration

## Testing

After adding the API key to `.env`, test the contact form submission. The email will be sent to `developers@ecareinfoway.com` automatically.

## Error Handling

If email sending fails, the error will be logged but the form submission will still succeed. Check Laravel logs for any ElasticEmail errors.
