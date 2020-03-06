<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class MixedContentController extends Controller {
    public function index() {
        if ($this->ohdear === null) {
            return $this->errorView();
        }

        $mixedContent       = $this->ohdear->mixedContent();
        $mixedContentCheck  = $this->ohdear->mixedContentCheck();
        $url                = $this->ohdear->url();

        return view('oh-dear::mixedContent.index', compact('mixedContent', 'mixedContentCheck', 'url'));
    }
}