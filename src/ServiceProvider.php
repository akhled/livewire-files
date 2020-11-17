<?php

namespace Akhaled\LivewireFilesUploader;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Livewire\Livewire;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // register livewire components
        Livewire::component('files-upload', FilesUploadComponent::class);
    }
}