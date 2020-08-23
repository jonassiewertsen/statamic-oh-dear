<?php

namespace Jonassiewertsen\OhDear\Console\Commands;

use Illuminate\Foundation\Console\DownCommand;
use Illuminate\Support\Facades\Artisan;

class ExtendedDownCommand extends DownCommand
{
    public function handle()
    {
        parent::handle();

        Artisan::call('statamic:ohdear:maintenance start');

        $this->warn('The Oh Dear Maintenance will start now.');
    }
}
