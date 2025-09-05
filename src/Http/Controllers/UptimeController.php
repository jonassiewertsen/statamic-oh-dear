<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use OhDear\PhpSdk\Enums\UptimeSplit;

class UptimeController extends Controller
{
    public function __invoke()
    {
        $this->authorize('show ohdear');

        if ($this->ohdear === null) {
            return $this->errorView();
        }

        $pastDays   = $this->ohdear->uptime(now()->subDays(6), now(), UptimeSplit::Day);
        $pastMonths = $this->ohdear->uptime(now()->subMonths(11), now(), UptimeSplit::Month);
        $downtimes  = $this->ohdear->downtime(now()->subMonths(5), now());
        $uptime     = $this->ohdear->uptimeCheck();
        $url        = $this->ohdear->url();

        return view('oh-dear::uptime.index', compact('pastDays', 'pastMonths', 'downtimes', 'uptime', 'url'));
    }
}
