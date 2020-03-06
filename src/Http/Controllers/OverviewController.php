<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class OverviewController {
    public function index() {
        $ohdear = new OhDear;

        $checks = [
            'uptime'        => $ohdear->uptimeCheck(),
            'broken_links'  => $ohdear->brokenLinksCheck(),
            'mixed_content' => $ohdear->mixedContentCheck(),
            'certificate'   => $ohdear->certificateCheck(),
        ];

        $url = $ohdear->url();

        return view('oh-dear::overview.index', compact('checks', 'url'));
    }
}