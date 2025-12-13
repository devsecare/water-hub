<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\ElasticEmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    protected ElasticEmailService $emailService;

    public function __construct(ElasticEmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'organisation' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($validated);

        // Send email notification
        try {
            $emailBody = view('emails.contact-form-notification', ['contact' => $contact])->render();

            // Use a verified email address from ElasticEmail account
            // This must be an email address from a verified domain in your ElasticEmail account
            $fromEmail = config('services.elasticemail.from_email', 'noreply@yourdomain.com');

            $result = $this->emailService->sendEmail(
                to: 'developers@ecareinfoway.com',
                subject: 'New Contact Form Submission - ' . config('app.name'),
                body: $emailBody,
                fromEmail: $fromEmail,
                fromName: config('mail.from.name', config('app.name')),
                replyTo: $contact->email
            );

            if (!$result['success']) {
                Log::warning('Failed to send contact form email', [
                    'contact_id' => $contact->id,
                    'error' => $result['message'] ?? 'Unknown error',
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Exception sending contact form email', [
                'contact_id' => $contact->id,
                'error' => $e->getMessage(),
            ]);
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for contacting us! We will get back to you soon.'
            ]);
        }

        return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
