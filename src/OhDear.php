<?php

namespace Jonassiewertsen\OhDear;

use Illuminate\Support\Carbon;
use \OhDear\PhpSdk\Ohdear as OhdearSDK;

class OhDear {
    /**
     * The Odear instance
     *
     * @var OhdearSDK
     */
    public $ohDear;
    /**
     * The specific monitored Oh Dear site
     *
     * @var \OhDear\PhpSdk\Resources\Site
     */
    public $site;

    public function __construct() {
        $this->ohDear   = new OhdearSDK(config('oh-dear.api_key'));
        $this->site     = $this->ohDear->site(config('oh-dear.site_id'));
    }

    public function uptime($start, $end, $split) {
        $uptime = $this->site->uptime(
            $start->format('YmdHis'),
            $end->format('YmdHis'),
            $split);

        $uptime = collect($uptime);

        $uptime->transform(function($entry) {

            // TODO: Make format customizable. Loalized?
            // TODO: Carbon format into helper function?
            $datetime = Carbon::parse($entry->datetime)->format('Y-m-d');

            return [
              'datetime' => $datetime,
              'uptimePercentage' => $entry->uptimePercentage,
            ];
        });

        return $uptime;
    }

    public function downtime($start, $end) {
        return $this->site->downtime(
            $start->format('YmdHis'),
            $end->format('YmdHis'));
    }
}