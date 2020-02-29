<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

class OverviewController {
    public function index() {

       $ohDear = new \OhDear\PhpSdk\Ohdear(config('oh-dear.api_key'));
       $site = $ohDear->site(config('oh-dear.site_id'));
        $checks = $site->checks;

        return view('oh-dear::overview.index', compact('checks'));
    }
}