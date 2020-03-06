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
        try {
            $this->ohDear   = new OhdearSDK(config('oh-dear.api_key'));
            $this->site     = $this->ohDear->site(config('oh-dear.site_id'));
        } catch (\Exception $e) {
            // Setting values to null, in case something goes wrong.
            $this->ohDear   = null;
            $this->site     = null;
        }
    }

    public function uptime($start, $end, $split) {
        $uptime = $this->site->uptime(
            $start->format('YmdHis'),
            $end->format('YmdHis'),
            $split);

        $uptime = collect($uptime);

        return $uptime->transform(function($entry) {
            // formatting the datetime
            $datetime = Carbon::parse($entry->datetime)->format('Y-m-d');

            return [
              'datetime' => $datetime,
              'uptimePercentage' => $entry->uptimePercentage,
            ];
        });
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

    public function mixedContent() {
        return $this->site->mixedContent();
    }

    public function certificate() {
        return $this->site->certificateHealth();
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

    public function brokenLinksCheck() {
        $links = collect($this->site->checks)
            ->where('type', 'broken_links');

        return  $links->first()->attributes;
    }

    public function mixedContentCheck() {
        $contents = collect($this->site->checks)
            ->where('type', 'mixed_content');

        return $contents->first()->attributes;
    }

    public function certificateCheck() {
        $certificate = collect($this->site->checks)
            ->where('type', 'certificate_health');

        return $certificate->first()->attributes;
    }
}