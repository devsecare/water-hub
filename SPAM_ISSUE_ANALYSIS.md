# Email Spam Issue Analysis

## Problem

✅ **Direct API (curl):** Email goes to **inbox**  
❌ **Website (Laravel):** Email goes to **spam**

## Key Differences

### Direct API Call (Working - Goes to Inbox)
```bash
from=contact@waterppphub.org
fromName=Water Hub
bodyText=Test email body  # Plain text
```

### Website Call (Going to Spam)
- Uses `flexflux/laravel-elastic-email` package
- Sends HTML content
- May have different headers
- From address: `contact@waterppphub.com` (different domain!)

## Likely Causes

### 1. ⚠️ **From Address Mismatch** (Most Likely)

**Curl uses:** `contact@waterppphub.org`  
**Website uses:** `contact@waterppphub.com` (from `.env`)

**Check:**
```bash
grep MAIL_FROM_ADDRESS .env
```

**Solution:** Use the same verified domain in both:
- Update `.env`: `MAIL_FROM_ADDRESS=contact@waterppphub.org`
- Or verify `waterppphub.com` domain in ElasticEmail

### 2. **HTML vs Plain Text**

**Curl sends:** Plain text (`bodyText`)  
**Website sends:** HTML content (from Blade templates)

**Spam filters often flag:**
- HTML emails without plain text alternative
- Poorly formatted HTML
- Missing text/HTML balance

### 3. **Email Headers**

The package might be adding headers that trigger spam filters:
- Missing proper headers
- Incorrect content-type
- Missing message ID
- Missing date headers

### 4. **SPF/DKIM/DMARC Records**

If `waterppphub.com` is not properly verified:
- SPF record missing or incorrect
- DKIM signature missing
- DMARC policy not set

### 5. **Sender Reputation**

- `waterppphub.org` might be verified and have good reputation
- `waterppphub.com` might not be verified or have poor reputation

## Solutions

### Solution 1: Use Same From Address (Recommended)

Update `.env` to match the working curl command:

```env
MAIL_FROM_ADDRESS=contact@waterppphub.org
MAIL_FROM_NAME="Water Hub"
```

Then clear cache:
```bash
php artisan config:clear
```

### Solution 2: Add Plain Text Alternative

Update email sending to include both HTML and plain text:

```php
Mail::send([], [], function ($message) use ($emailBody, $contact) {
    $message->to(SettingsService::getAdminEmail())
            ->subject('New Contact Form Submission - ' . config('app.name'))
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->replyTo($contact->email)
            ->html($emailBody)
            ->text(strip_tags($emailBody)); // Add plain text version
});
```

### Solution 3: Verify Domain in ElasticEmail

1. Log in to ElasticEmail dashboard
2. Go to **Settings** → **Domains**
3. Verify **both** domains:
   - `waterppphub.org` ✅ (already working)
   - `waterppphub.com` ❌ (needs verification)

### Solution 4: Check DNS Records

Verify SPF, DKIM, and DMARC records for `waterppphub.com`:

**SPF Record:**
```
TXT @ "v=spf1 include:spf.elasticemail.com ~all"
```

**DKIM:** Set up in ElasticEmail dashboard

**DMARC:**
```
TXT _dmarc "v=DMARC1; p=none; rua=mailto:your-email@example.com"
```

### Solution 5: Enhance Email Headers

The package might need better headers. Check if we can customize the transport.

## Immediate Action

**Check your `.env` file:**

```bash
grep MAIL_FROM .env
```

**If it shows:**
```env
MAIL_FROM_ADDRESS=contact@waterppphub.com
```

**Change to:**
```env
MAIL_FROM_ADDRESS=contact@waterppphub.org
```

This matches your working curl command!

## Testing

After updating, test:

```bash
php artisan mail:test developers@ecareinfoway.com
```

Check if it goes to inbox instead of spam.

## Additional Checks

1. **Check ElasticEmail Dashboard:**
   - Go to **Settings** → **Domains**
   - Verify which domains are verified
   - Check domain reputation

2. **Check Email Headers:**
   - View email source in your email client
   - Compare headers between curl email (inbox) and website email (spam)
   - Look for differences in:
     - From address
     - SPF/DKIM signatures
     - Content-Type
     - Message-ID

3. **Test with Plain Text:**
   - Temporarily send plain text emails from website
   - See if they go to inbox
   - This will help identify if HTML is the issue

## Most Likely Fix

**Use `contact@waterppphub.org` instead of `contact@waterppphub.com`**

The `.org` domain is verified and working (as proven by curl), while `.com` might not be verified or have poor reputation.
