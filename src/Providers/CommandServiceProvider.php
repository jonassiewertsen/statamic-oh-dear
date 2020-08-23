<?php

namespace Jonassiewertsen\OhDear\Providers;

use Illuminate\Console\Application;
use Illuminate\Support\ServiceProvider;
use Jonassiewertsen\OhDear\Console\Commands;

class CommandServiceProvider extends ServiceProvider
{
    protected array $commands = [
        Commands\Maintenance::class,
    ];

    public function boot()
    {
        Application::starting(function ($artisan) {
            $artisan->resolveCommands($this->commands);
        });

        /**
         * With auto maintenance turned on, we will extend the artisan up and down commands,
         * to set the correct Oh Dear maintenance windows for this application.
         */
        if (config('oh-dear.auto_maintenance')) {
            $this->app->extend('command.down', function () {
                return new Commands\ExtendedDownCommand();
            });

            $this->app->extend('command.up', function () {
                return new Commands\ExtendedUpCommand();
            });
        }
    }
}
