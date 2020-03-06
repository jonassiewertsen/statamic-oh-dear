<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class UptimeController extends Controller {
    public function index() {
        if ($this->ohdear === null) {
            return $this->errorView();
        }
        
        $pastDays   = $this->ohdear->uptime(now()->subDays(6), now(), 'day');
        $pastMonths = $this->ohdear->uptime(now()->subMonths(11), now(), 'month');
        $downtimes  = $this->ohdear->downtime(now()->subMonths(5), now());
        $uptime     = $this->ohdear->uptimeCheck();
        $url        = $this->ohdear->url();

        return view('oh-dear::uptime.index', compact('pastDays', 'pastMonths', 'downtimes', 'uptime', 'url'));
    }
}