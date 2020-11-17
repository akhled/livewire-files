<?php

namespace Akhaled\LivewireFiles;

use Akhaled\LivewireFiles\Components\FilesUploadComponent;
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
        // load views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'livewire-files');
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