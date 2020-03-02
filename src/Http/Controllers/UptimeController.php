<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

class UptimeController {
    public function index() {
        return view('oh-dear::uptime.index');
    }
}