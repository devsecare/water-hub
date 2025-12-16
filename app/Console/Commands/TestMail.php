<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Services\SettingsService;

class TestMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test {email?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test email using ElasticEmail SMTP';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $toEmail = $this->argument('email') ?: 'developers@ecareinfoway.com';
        $adminEmail = SettingsService::getAdminEmail();

        $this->info("Sending test email to: {$toEmail}");
        $this->info("Admin Email from Settings: {$adminEmail}");
        $this->info("From Address: " . config('mail.from.address'));

        try {
            // Log before sending
            \Log::info('TestMail: Starting email send', [
                'to' => $toEmail,
                'from' => config('mail.from.address'),
                'mailer' => config('mail.default'),
                'api_key_set' => !empty(config('mail.mailers.elastic_email.key')),
            ]);

            // Send with both HTML and plain text to avoid spam
            $plainText = "This is a test email from the Water Hub application.\n\n" .
                "Settings are now managed from the admin panel.\n" .
                "Admin Email: {$adminEmail}\n" .
                "Sent at: " . now()->format('Y-m-d H:i:s') . "\n" .
                "Mailer: " . config('mail.default');

            Mail::send([], [], function ($message) use ($toEmail, $plainText) {
                $message->to($toEmail)
                        ->subject('Test Email - Water Hub Settings System - ' . now()->format('H:i:s'))
                        ->from(config('mail.from.address'), config('mail.from.name'))
                        ->text($plainText); // Plain text only to match curl behavior
            });

            \Log::info('TestMail: Email sent via Mail facade', [
                'to' => $toEmail,
                'timestamp' => now()->toIso8601String(),
            ]);

            $this->info('✅ Test email sent successfully!');
            $this->info("Check inbox for: {$toEmail}");
            $this->info("Mailer: " . config('mail.default'));
            $this->warn('Note: If email not received, check ElasticEmail dashboard for delivery status.');
            $this->warn('The ElasticEmail API may not return errors - check your ElasticEmail dashboard.');

            return Command::SUCCESS;
        } catch (\Exception $e) {
            \Log::error('TestMail: Email sending failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'to' => $toEmail,
            ]);

            $this->error('❌ Failed to send email: ' . $e->getMessage());
            $this->error('Check logs for more details: storage/logs/laravel.log');

            return Command::FAILURE;
        }
    }
}
