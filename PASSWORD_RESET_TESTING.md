# Password Reset Flow - Testing Guide

## What Happens After Clicking the Email Link?

1. **User clicks the reset link in email** → Goes to `/reset-password/{token}`
2. **Reset Password Page** → Shows a form with:
   - Email field
   - New Password field
   - Confirm Password field
   - Reset Password button
3. **After submitting** → Password is updated and user is redirected to login page

## How to Test the Reset Password Page Now

### Option 1: Generate a Test Token (Recommended for Development)

You can generate a password reset token manually using Laravel's tinker:

```bash
php artisan tinker
```

Then run:
```php
$user = \App\Models\User::where('email', 'your-email@example.com')->first();
$token = \Illuminate\Support\Facades\Password::createToken($user);
echo $token;
```

Then visit: `https://water-hub-git.test/reset-password/{token}` (replace `{token}` with the generated token)

### Option 2: Use Laravel's Password Reset System

1. Go to `/forgot-password`
2. Enter a valid user email
3. Check your email (or Laravel logs if using `log` mail driver)
4. Click the reset link in the email

### Option 3: Check Laravel Logs for Reset Links

If you're using the `log` mail driver (default in development), the reset link will be in:
```
storage/logs/laravel.log
```

Search for "password reset" or "reset link" in the log file.

### Option 4: Use Mailtrap or Similar Service

1. Set up Mailtrap or another email testing service
2. Update your `.env` with Mailtrap SMTP settings
3. Submit the forgot password form
4. Check Mailtrap inbox for the reset email
5. Click the link in the email

## Current Flow

1. **Forgot Password Page** (`/forgot-password`)
   - User enters email
   - System sends reset link via email

2. **Reset Password Page** (`/reset-password/{token}`)
   - User enters email, new password, and confirms password
   - System validates and updates password
   - Redirects to login page with success message

3. **Login Page** (`/login`)
   - User can now login with new password

## Notes

- Reset tokens expire after 60 minutes (Laravel default)
- Each token can only be used once
- The reset password page now matches the site's header and footer design
