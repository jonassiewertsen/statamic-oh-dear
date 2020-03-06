<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class BrokenLinksController extends Controller {
    public function index() {
        if ($this->ohdear === null) {
            return $this->errorView();
        }

        $brokenLinks        = $this->ohdear->brokenLinks();
        $brokenLinksCheck   = $this->ohdear->brokenLinksCheck();
        $url                = $this->ohdear->url();

        return view('oh-dear::brokenLinks.index', compact('brokenLinks', 'brokenLinksCheck', 'url'));
    }
}