<?php

namespace Jonassiewertsen\OhDear;

use Statamic\Facades\Nav;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'cp' => __DIR__ . '/../routes/cp.php',
    ];

    protected $widgets = [
        // TODO: Add a widget for the dashboard
    ];

    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'oh-dear');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'oh-dear');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'oh-dear');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/jonassiewertsen/ohDear/'),
            ], 'Statamic Oh Dear lang file');

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('statamic/oh-dear.php'),
            ], 'Statamic Oh Dear config file');
        }

        $this->bootNavigation();
    }

    private function bootNavigation(): void
    {
        Nav::extend(function ($nav) {
            $nav->create('Oh Dear')
                ->icon('earth')
                ->section('Tools')
                ->route('oh-dear.index');
        });
        // TODO: Add child navigation
    }
}