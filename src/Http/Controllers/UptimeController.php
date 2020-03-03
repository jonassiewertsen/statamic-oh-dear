<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class UptimeController {
    public function index() {
        $ohdear = new OhDear;

        // TODO: Add the option, that checks can be disabled
        $pastDays   = $ohdear->uptime(now()->subDays(6), now(), 'day');
        $pastMonths = $ohdear->uptime(now()->subMonths(11), now(), 'month');
        $downtimes  = $ohdear->downtime(now()->subMonths(5), now());
        $uptime     = $ohdear->uptimeCheck();
        $url        = $ohdear->url();

        return view('oh-dear::uptime.index', compact('pastDays', 'pastMonths', 'downtimes', 'uptime', 'url'));
    }
}