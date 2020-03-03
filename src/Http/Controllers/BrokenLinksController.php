<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class BrokenLinksController {
    public function index() {
        $ohdear = new OhDear;

        return view('oh-dear::brokenLinks.index');
    }
}