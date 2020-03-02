<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class OverviewController {
    public function index() {
        return view('oh-dear::overview.index');
    }
}