<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class OverviewController extends Controller {
    public function index() {
        if ($this->ohdear === null) {
            return $this->errorView();
        }

        $checks = [
            'uptime'        => $this->ohdear->uptimeCheck(),
            'broken_links'  => $this->ohdear->brokenLinksCheck(),
            'mixed_content' => $this->ohdear->mixedContentCheck(),
            'certificate'   => $this->ohdear->certificateCheck(),
        ];

        $url = $this->ohdear->url();

        return view('oh-dear::overview.index', compact('checks', 'url'));
    }
}