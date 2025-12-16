<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use App\Models\Setting;
use Filament\Actions;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Cache;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $resource = SettingResource::class;

    protected static string $view = 'filament.resources.setting-resource.pages.manage-settings';

    protected static ?string $navigationLabel = 'Settings';

    protected static ?string $title = 'Application Settings';

    public ?array $data = [];

    public function mount(): void
    {
        // Initialize default settings if they don't exist
        $this->initializeDefaultSettings();

        // Load current settings into form data array
        $this->data = [
            'admin_email' => Setting::get('admin_email', 'developers@ecareinfoway.com'),
            'contact_email' => Setting::get('contact_email', ''),
            'noreply_email' => Setting::get('noreply_email', config('mail.from.address', 'noreply@waterppphub.org')),
            'elasticemail_api_key' => Setting::get('elasticemail_api_key', config('services.elasticemail.api_key', '')),
            'recaptcha_site_key' => Setting::get('recaptcha_site_key', config('services.recaptcha.site_key', '')),
            'recaptcha_secret_key' => Setting::get('recaptcha_secret_key', config('services.recaptcha.secret_key', '')),
            'site_name' => Setting::get('site_name', config('app.name', 'PPP Water Hub')),
            'site_url' => Setting::get('site_url', config('app.url', '')),
            'site_description' => Setting::get('site_description', ''),
        ];
    }

    public function form(Form $form): Form
    {
        $schema = [];

        // Email Settings Section
        $schema[] = Forms\Components\Section::make('Email Settings')
            ->description('Configure email-related settings')
            ->schema([
                Forms\Components\TextInput::make('admin_email')
                    ->label('Admin Email')
                    ->email()
                    ->helperText('Email address to receive admin notifications and contact form submissions')
                    ->required(),

                Forms\Components\TextInput::make('contact_email')
                    ->label('Contact Email')
                    ->email()
                    ->helperText('Public contact email address'),

                Forms\Components\TextInput::make('noreply_email')
                    ->label('No-Reply Email')
                    ->email()
                    ->helperText('Email address used for automated emails (password resets, etc.)'),
            ])
            ->columns(2)
            ->collapsible();

        // API Keys Section
        $schema[] = Forms\Components\Section::make('API Keys')
            ->description('Store API keys and secrets securely')
            ->schema([
                Forms\Components\TextInput::make('elasticemail_api_key')
                    ->label('ElasticEmail API Key')
                    ->password()
                    ->helperText('ElasticEmail API key for sending emails')
                    ->revealable(),

                Forms\Components\TextInput::make('recaptcha_site_key')
                    ->label('Google reCAPTCHA Site Key')
                    ->helperText('reCAPTCHA v3 site key'),

                Forms\Components\TextInput::make('recaptcha_secret_key')
                    ->label('Google reCAPTCHA Secret Key')
                    ->password()
                    ->helperText('reCAPTCHA v3 secret key')
                    ->revealable(),
            ])
            ->columns(2)
            ->collapsible();

        // General Settings Section
        $schema[] = Forms\Components\Section::make('General Settings')
            ->description('General application settings')
            ->schema([
                Forms\Components\TextInput::make('site_name')
                    ->label('Site Name')
                    ->helperText('Name of the application'),

                Forms\Components\TextInput::make('site_url')
                    ->label('Site URL')
                    ->url()
                    ->helperText('Base URL of the application'),

                Forms\Components\Textarea::make('site_description')
                    ->label('Site Description')
                    ->rows(3)
                    ->helperText('Brief description of the site'),
            ])
            ->columns(2)
            ->collapsible();

        return $form
            ->statePath('data')
            ->schema($schema);
    }

    protected function initializeDefaultSettings(): void
    {
        $defaults = [
            'admin_email' => ['value' => 'developers@ecareinfoway.com', 'type' => 'email', 'group' => 'email', 'label' => 'Admin Email', 'description' => 'Email address to receive admin notifications'],
            'contact_email' => ['value' => '', 'type' => 'email', 'group' => 'email', 'label' => 'Contact Email', 'description' => 'Public contact email address'],
            'noreply_email' => ['value' => config('mail.from.address', 'noreply@waterppphub.org'), 'type' => 'email', 'group' => 'email', 'label' => 'No-Reply Email', 'description' => 'Email address for automated emails'],
            'elasticemail_api_key' => ['value' => config('services.elasticemail.api_key', ''), 'type' => 'password', 'group' => 'api', 'label' => 'ElasticEmail API Key', 'description' => 'ElasticEmail API key', 'is_encrypted' => true],
            'recaptcha_site_key' => ['value' => config('services.recaptcha.site_key', ''), 'type' => 'text', 'group' => 'api', 'label' => 'reCAPTCHA Site Key', 'description' => 'Google reCAPTCHA v3 site key'],
            'recaptcha_secret_key' => ['value' => config('services.recaptcha.secret_key', ''), 'type' => 'password', 'group' => 'api', 'label' => 'reCAPTCHA Secret Key', 'description' => 'Google reCAPTCHA v3 secret key', 'is_encrypted' => true],
            'site_name' => ['value' => config('app.name', 'PPP Water Hub'), 'type' => 'text', 'group' => 'general', 'label' => 'Site Name', 'description' => 'Name of the application'],
            'site_url' => ['value' => config('app.url', ''), 'type' => 'text', 'group' => 'general', 'label' => 'Site URL', 'description' => 'Base URL of the application'],
            'site_description' => ['value' => '', 'type' => 'textarea', 'group' => 'general', 'label' => 'Site Description', 'description' => 'Brief description of the site'],
        ];

        foreach ($defaults as $key => $attributes) {
            if (!Setting::where('key', $key)->exists()) {
                Setting::create(array_merge(['key' => $key], $attributes));
            }
        }
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            $setting = Setting::firstOrNew(['key' => $key]);

            // Determine type and group based on key
            $type = 'text';
            $group = 'general';
            $isEncrypted = false;

            if (str_contains($key, 'email')) {
                $type = 'email';
                $group = 'email';
            } elseif (str_contains($key, 'api_key') || str_contains($key, 'secret')) {
                $type = 'password';
                $group = 'api';
                $isEncrypted = true;
            }

            $setting->value = $value;
            $setting->type = $type;
            $setting->group = $group;
            $setting->is_encrypted = $isEncrypted;

            // Set label and description if not exists
            if (!$setting->label) {
                $setting->label = ucwords(str_replace('_', ' ', $key));
            }

            $setting->save();
        }

        // Clear cache
        Cache::forget('settings');
        foreach (array_keys($data) as $key) {
            Cache::forget("setting.{$key}");
        }

        Notification::make()
            ->title('Settings saved successfully')
            ->success()
            ->send();
    }
}
