<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ElasticEmailService
{
    protected string $apiKey;
    protected string $baseUrl = 'https://api.elasticemail.com/v4';

    public function __construct()
    {
        $this->apiKey = config('services.elasticemail.api_key');
    }

    /**
     * Send an email via ElasticEmail API
     *
     * @param string $to
     * @param string $subject
     * @param string $body
     * @param string|null $fromEmail
     * @param string|null $fromName
     * @param string|null $replyTo
     * @return array
     */
    public function sendEmail(
        string $to,
        string $subject,
        string $body,
        ?string $fromEmail = null,
        ?string $fromName = null,
        ?string $replyTo = null
    ): array {
        try {
            // Use a verified sender email from ElasticEmail account
            // This should be a verified email address in your ElasticEmail account
            $fromEmail = $fromEmail ?? config('services.elasticemail.from_email', config('mail.from.address'));
            $fromName = $fromName ?? config('mail.from.name', config('app.name'));

            $payload = [
                'Recipients' => [
                    [
                        'Email' => $to,
                    ]
                ],
                'Content' => [
                    'Body' => [
                        [
                            'ContentType' => 'HTML',
                            'Content' => $body,
                        ]
                    ],
                    'From' => $fromEmail,
                    'Subject' => $subject,
                ],
            ];

            if ($fromName) {
                $payload['Content']['FromName'] = $fromName;
            }

            if ($replyTo) {
                $payload['Content']['ReplyTo'] = $replyTo;
            }

            $response = Http::withHeaders([
                'X-ElasticEmail-ApiKey' => $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post("{$this->baseUrl}/emails", $payload);

            if ($response->successful()) {
                return [
                    'success' => true,
                    'message' => 'Email sent successfully',
                    'data' => $response->json(),
                ];
            }

            Log::error('ElasticEmail API error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return [
                'success' => false,
                'message' => 'Failed to send email',
                'error' => $response->body(),
            ];
        } catch (\Exception $e) {
            Log::error('ElasticEmail error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);
            return [
                'success' => false,
                'message' => 'Error sending email: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Send a plain text email
     *
     * @param string $to
     * @param string $subject
     * @param string $textBody
     * @param string|null $fromEmail
     * @param string|null $fromName
     * @return array
     */
    public function sendTextEmail(
        string $to,
        string $subject,
        string $textBody,
        ?string $fromEmail = null,
        ?string $fromName = null
    ): array {
        try {
            $fromEmail = $fromEmail ?? config('mail.from.address');
            $fromName = $fromName ?? config('mail.from.name');

            $response = Http::withHeaders([
                'X-ElasticEmail-ApiKey' => $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post("{$this->baseUrl}/emails/transactional", [
                'Recipients' => [
                    [
                        'Email' => $to,
                    ]
                ],
                'Content' => [
                    'Body' => [
                        [
                            'ContentType' => 'PlainText',
                            'Content' => $textBody,
                        ]
                    ],
                    'From' => $fromEmail,
                    'Subject' => $subject,
                ],
                'Options' => [
                    'ChannelName' => 'Contact Form',
                ],
            ]);

            if ($response->successful()) {
                return [
                    'success' => true,
                    'message' => 'Email sent successfully',
                    'data' => $response->json(),
                ];
            }

            return [
                'success' => false,
                'message' => 'Failed to send email',
                'error' => $response->body(),
            ];
        } catch (\Exception $e) {
            Log::error('ElasticEmail error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error sending email: ' . $e->getMessage(),
            ];
        }
    }
}
