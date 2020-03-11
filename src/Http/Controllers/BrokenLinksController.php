<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

class BrokenLinksController extends Controller {
    public function index() {
        $this->authorize('show ohdear');

        if ($this->ohdear === null) {
            return $this->errorView();
        }

        $brokenLinks        = $this->ohdear->brokenLinks();
        $brokenLinksCheck   = $this->ohdear->brokenLinksCheck();
        $url                = $this->ohdear->url();

        return view('oh-dear::brokenLinks.index', compact('brokenLinks', 'brokenLinksCheck', 'url'));
    }
}