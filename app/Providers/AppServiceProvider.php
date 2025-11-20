<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\FileUploadConfiguration;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Ensure the livewire-tmp directory exists
        $livewireTmpPath = storage_path('app/livewire-tmp');
        if (!file_exists($livewireTmpPath)) {
            Storage::disk('livewire-tmp')->makeDirectory('');
        }

        // Configure Livewire to use the 'livewire-tmp' disk for temporary uploads
        FileUploadConfiguration::disk('livewire-tmp');
    }
}
