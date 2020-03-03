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
        $downtime =  $this->site->downtime(
            $start->format('YmdHis'),
            $end->format('YmdHis'));

        $downtime = collect($downtime);

       return $downtime->transform(function($downtime) {
           $startedAt   = Carbon::parse($downtime->startedAt);
           $endedAt     = Carbon::parse($downtime->endedAt);
           $duration    = $startedAt->diffInMinutes($endedAt);

           return [
               'started_at' => $downtime->startedAt,
               'ended_at'   => $downtime->endedAt,
               'duration'   => $duration,
           ];
        });
    }

    public function brokenLinks() {
        return $this->site->brokenLinks();
    }

    public function url() {
        return [
            'name' => $this->site->sortUrl,
            'href' => $this->site->url,
        ];
    }

    public function checks() {
        return $this->site->checks;
    }

    public function uptimeCheck() {
        $uptime = collect($this->site->checks)
                    ->where('type', 'uptime');

        return $uptime->first()->attributes;
    }
}