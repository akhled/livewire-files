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

        // publish config
        $this->publishes([__DIR__ . '/config/livewire-files.php' => config_path('livewire-files.php')], 'livewire-files');
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

        // merge configurations
        $this->mergeConfigFrom(__DIR__ . '/config/livewire-files.php', 'livewire-files');
    }
}