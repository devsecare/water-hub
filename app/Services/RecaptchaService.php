<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RecaptchaService
{
    /**
     * Verify reCAPTCHA v3 token
     *
     * @param string $token
     * @param string|null $action
     * @param float $minScore
     * @return array
     */
    public static function verify(string $token, ?string $action = null, float $minScore = 0.5): array
    {
        $secretKey = SettingsService::get('recaptcha_secret_key', config('services.recaptcha.secret_key', ''));

        if (empty($secretKey)) {
            Log::error('reCAPTCHA secret key is not configured');
            return [
                'success' => false,
                'message' => 'reCAPTCHA is not properly configured',
            ];
        }

        try {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $secretKey,
                'response' => $token,
                'remoteip' => request()->ip(),
            ]);

            $result = $response->json();

            if (!$result['success']) {
                Log::warning('reCAPTCHA verification failed', [
                    'errors' => $result['error-codes'] ?? [],
                    'ip' => request()->ip(),
                ]);

                return [
                    'success' => false,
                    'message' => 'reCAPTCHA verification failed',
                    'errors' => $result['error-codes'] ?? [],
                ];
            }

            // Check action if provided
            if ($action && isset($result['action']) && $result['action'] !== $action) {
                Log::warning('reCAPTCHA action mismatch', [
                    'expected' => $action,
                    'received' => $result['action'] ?? null,
                ]);

                return [
                    'success' => false,
                    'message' => 'reCAPTCHA action mismatch',
                ];
            }

            // Check score (reCAPTCHA v3 returns a score from 0.0 to 1.0)
            $score = $result['score'] ?? 0.0;
            if ($score < $minScore) {
                Log::warning('reCAPTCHA score too low', [
                    'score' => $score,
                    'min_score' => $minScore,
                    'ip' => request()->ip(),
                ]);

                return [
                    'success' => false,
                    'message' => 'reCAPTCHA score too low. Please try again.',
                    'score' => $score,
                ];
            }

            return [
                'success' => true,
                'score' => $score,
                'action' => $result['action'] ?? null,
            ];
        } catch (\Exception $e) {
            Log::error('reCAPTCHA verification exception', [
                'error' => $e->getMessage(),
                'ip' => request()->ip(),
            ]);

            return [
                'success' => false,
                'message' => 'An error occurred during reCAPTCHA verification',
            ];
        }
    }
}
