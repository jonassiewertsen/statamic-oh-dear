<?php

namespace Jonassiewertsen\OhDear\Console\Commands;

use Illuminate\Foundation\Console\UpCommand;
use Illuminate\Support\Facades\Artisan;

class ExtendedUpCommand extends UpCommand
{
    public function handle()
    {
        parent::handle();

        Artisan::call('statamic:ohdear:maintenance stop');

        $this->info('The Oh Dear Maintenance does end now.');
    }
}
