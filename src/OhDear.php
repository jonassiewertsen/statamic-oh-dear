<?php

namespace Jonassiewertsen\OhDear;

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
        return $this->site->uptime(
            $start->format('YmdHis'),
            $end->format('YmdHis'),
            $split);
    }

    public function downtime($start, $end) {
        return $this->site->downtime(
            $start->format('YmdHis'),
            $end->format('YmdHis'));
    }
}