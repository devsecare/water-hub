<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide a valid email address.',
                'errors' => $validator->errors()
            ], 422);
        }

        $email = $request->input('email');
        $apiKey = config('services.mailchimp.api_key');
        $audienceId = config('services.mailchimp.audience_id');

        if (!$apiKey || !$audienceId) {
            Log::error('Mailchimp configuration missing');
            return response()->json([
                'success' => false,
                'message' => 'Newsletter service is not configured. Please contact support.'
            ], 500);
        }

        // Extract datacenter from API key (e.g., "us22" from "xxx-us22")
        $dc = substr($apiKey, strrpos($apiKey, '-') + 1);
        $baseUrl = "https://{$dc}.api.mailchimp.com/3.0";

        try {
            // Subscribe the email to the Mailchimp audience
            $response = Http::withBasicAuth('anystring', $apiKey)
                ->post("{$baseUrl}/lists/{$audienceId}/members", [
                    'email_address' => $email,
                    'status' => 'subscribed', // or 'pending' if you want double opt-in
                ]);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for subscribing! You have been added to our newsletter.'
                ]);
            }

            // Handle existing subscriber (Mailchimp returns 400 with specific error)
            if ($response->status() === 400) {
                $body = $response->json();
                $errorTitle = strtolower($body['title'] ?? '');
                $errorDetail = strtolower($body['detail'] ?? '');

                if (str_contains($errorTitle, 'member exists') ||
                    str_contains($errorDetail, 'already a list member') ||
                    str_contains($errorDetail, 'already subscribed')) {
                    return response()->json([
                        'success' => true,
                        'message' => 'You are already subscribed to our newsletter!'
                    ]);
                }
            }

            // Handle other errors
            Log::error('Mailchimp API error', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Unable to subscribe at this time. Please try again later.'
            ], 500);

        } catch (\Exception $e) {
            Log::error('Mailchimp subscription error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your subscription. Please try again later.'
            ], 500);
        }
    }
}
