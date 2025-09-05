<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

class MaintenanceController extends Controller
{
    public function start()
    {
        if ($this->ohdear === null) {
            return $this->errorView();
        }

        $this->ohdear->startMaintenance();
    }

    public function stop()
    {
        if ($this->ohdear === null) {
            return $this->errorView();
        }

        $this->ohdear->stopMaintenance();
    }
}
