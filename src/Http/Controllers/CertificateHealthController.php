<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class CertificateHealthController {
    public function index() {
        $ohdear = new OhDear;

        $certificate = $ohdear->certificate();
        $url         = $ohdear->url();

        return view('oh-dear::certificateHealth.index', compact('certificate', 'url'));
    }
}