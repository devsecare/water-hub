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
            Mail::raw(
                "This is a test email from the Water Hub application.\n\n" .
                "Settings are now managed from the admin panel.\n" .
                "Admin Email: {$adminEmail}\n" .
                "Sent at: " . now()->format('Y-m-d H:i:s') . "\n" .
                "SMTP Host: " . config('mail.mailers.smtp.host'),
                function ($message) use ($toEmail) {
                    $message->to($toEmail)
                            ->subject('Test Email - Water Hub Settings System - ' . now()->format('H:i:s'));
                }
            );

            $this->info('✅ Test email sent successfully!');
            $this->info("Check inbox for: {$toEmail}");
            $this->warn('Note: If email not received, check ElasticEmail dashboard for delivery status.');

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('❌ Failed to send email: ' . $e->getMessage());
            $this->error('Stack trace: ' . $e->getTraceAsString());

            return Command::FAILURE;
        }
    }
}
