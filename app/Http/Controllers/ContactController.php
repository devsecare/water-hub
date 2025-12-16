<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\RecaptchaService;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function store(Request $request)
    {
        // Verify reCAPTCHA first
        $recaptchaToken = $request->input('recaptcha_token');

        if (empty($recaptchaToken)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'reCAPTCHA verification is required',
                    'errors' => [
                        'recaptcha_token' => ['reCAPTCHA verification is required. Please refresh the page and try again.']
                    ]
                ], 422);
            }

            return back()->withErrors([
                'recaptcha_token' => 'reCAPTCHA verification is required. Please refresh the page and try again.'
            ])->withInput();
        }

        $recaptchaResult = RecaptchaService::verify($recaptchaToken, 'contact_form', 0.5);

        if (!$recaptchaResult['success']) {
            Log::warning('reCAPTCHA verification failed for contact form', [
                'ip' => $request->ip(),
                'errors' => $recaptchaResult['errors'] ?? [],
                'score' => $recaptchaResult['score'] ?? null,
            ]);

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $recaptchaResult['message'] ?? 'reCAPTCHA verification failed',
                    'errors' => [
                        'recaptcha_token' => [$recaptchaResult['message'] ?? 'reCAPTCHA verification failed. Please try again.']
                    ]
                ], 422);
            }

            return back()->withErrors([
                'recaptcha_token' => $recaptchaResult['message'] ?? 'reCAPTCHA verification failed. Please try again.'
            ])->withInput();
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'organisation' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($validated);

        // Send email notification using Laravel Mail (ElasticEmail API via flexflux package)
        try {
            $emailBody = view('emails.contact-form-notification', ['contact' => $contact])->render();
            $plainTextBody = strip_tags($emailBody); // Create plain text version

            Mail::send([], [], function ($message) use ($contact, $emailBody, $plainTextBody) {
                $message->to(SettingsService::getAdminEmail())
                        ->subject('New Contact Form Submission - ' . config('app.name'))
                        ->from(config('mail.from.address'), config('mail.from.name', config('app.name')))
                        ->replyTo($contact->email)
                        ->html($emailBody)
                        ->text($plainTextBody); // Add plain text alternative to avoid spam
            });

            Log::info('Contact form email sent successfully', [
                'contact_id' => $contact->id,
                'to' => SettingsService::getAdminEmail(),
                'from' => config('mail.from.address'),
            ]);
        } catch (\Exception $e) {
            Log::error('Exception sending contact form email', [
                'contact_id' => $contact->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
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
