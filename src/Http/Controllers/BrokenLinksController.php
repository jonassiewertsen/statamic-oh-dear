<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class BrokenLinksController {
    public function index() {
        $ohdear = new OhDear;

        $brokenLinks        = $ohdear->brokenLinks();
        $brokenLinksCheck   = $ohdear->brokenLinksCheck();
        $url                = $ohdear->url();

        return view('oh-dear::brokenLinks.index', compact('brokenLinks', 'brokenLinksCheck', 'url'));
    }
}