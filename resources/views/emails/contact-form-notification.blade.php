<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(to right, #070648, #2CBE9D);
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 8px 8px;
        }
        .field {
            margin-bottom: 15px;
        }
        .field-label {
            font-weight: bold;
            color: #1E1D57;
            margin-bottom: 5px;
        }
        .field-value {
            background: white;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .message-box {
            background: white;
            padding: 15px;
            border-radius: 4px;
            border-left: 4px solid #37C6F4;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Form Submission</h1>
        <p>You have received a new message from the contact form on {{ config('app.name') }}</p>
    </div>

    <div class="content">
        <div class="field">
            <div class="field-label">Name:</div>
            <div class="field-value">{{ $contact->name }}</div>
        </div>

        @if($contact->organisation)
        <div class="field">
            <div class="field-label">Organisation:</div>
            <div class="field-value">{{ $contact->organisation }}</div>
        </div>
        @endif

        <div class="field">
            <div class="field-label">Email:</div>
            <div class="field-value">
                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
            </div>
        </div>

        <div class="field">
            <div class="field-label">Message:</div>
            <div class="message-box">{{ $contact->message }}</div>
        </div>

        <div class="field" style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 12px; color: #666;">
            <p>Submitted on: {{ $contact->created_at->format('F j, Y \a\t g:i A') }}</p>
        </div>
    </div>
</body>
</html>
