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
        \Jonassiewertsen\OhDear\Widgets\OhDear::class,
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
                ->route('oh-dear.index')
                ->children([
                    $nav->item(__('oh-dear::lang.uptime'))->route('oh-dear.uptime'),
                    $nav->item(__('oh-dear::lang.broken_links'))->route('oh-dear.broken-links'),
                    $nav->item(__('oh-dear::lang.mixed_content'))->route('oh-dear.mixed-content'),
                    $nav->item(__('oh-dear::lang.certificate_health'))->route('oh-dear.certificate-health'),
                ]);
        });
    }
}