<?php

namespace Jonassiewertsen\OhDear\Console\Commands;

use Illuminate\Console\Command;
use Jonassiewertsen\OhDear\Http\Controllers\MaintenanceController;
use Statamic\Console\RunsInPlease;

class Maintenance extends Command
{
    use RunsInPlease;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statamic:ohdear:maintenance {state?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Handle maintenance windows.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->argumentNotEntered() || $this->argumentNotAllowed()) {
            $this->errorMessage();
        }

        switch ($this->argument('state')) {
            case 'start':
                (new MaintenanceController())->start();
                break;
            case 'stop':
                (new MaintenanceController())->stop();
                break;
        }
    }

    private function argumentNotEntered(): bool
    {
        return (bool) ! $this->argument('state');
    }

    private function argumentNotAllowed(): bool
    {
        return ! ($this->argument('state') === 'start' || $this->argument('state') === 'stop');
    }

    private function errorMessage(): void
    {
        $this->error('                                                    ');
        $this->error('   Please add the maintenance state start or stop   ');
        $this->error('                                                    ');
        $this->error('   For example: ohdear:maintenance start            ');
        $this->error('                                                    ');
    }
}
