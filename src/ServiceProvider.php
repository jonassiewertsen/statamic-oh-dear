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
        //
    ];

    public function boot()
    {
        parent::boot();

//        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'howToAddon');
//        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'howToAddon');
//        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'howToAddon');
//
//        if ($this->app->runningInConsole()) {
//            $this->publishes([
//                __DIR__.'/../resources/lang' => resource_path('lang/vendor/jonassiewertsen/howToAddon/'),
//            ], 'How To Addon lang file');
//
//            $this->publishes([
//                __DIR__ . '/../config/config.php' => config_path('how_to_addon.php'),
//            ], 'How To Addon config file');
//        }
//
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
    }
}