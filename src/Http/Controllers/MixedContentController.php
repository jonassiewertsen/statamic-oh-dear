<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class MixedContentController {
    public function index() {
        $ohdear = new OhDear;

        $mixedContent       = $ohdear->mixedContent();
        $mixedContentCheck  = $ohdear->mixedContentCheck();
        $url                = $ohdear->url();

        return view('oh-dear::mixedContent.index', compact('mixedContent', 'mixedContentCheck', 'url'));
    }
}