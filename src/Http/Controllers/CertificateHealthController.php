<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class CertificateHealthController {
    public function index() {
        $ohdear = new OhDear;

        $certificate        = $ohdear->certificate();
        $certificateCheck   = $ohdear->certificateCheck();
        $url                = $ohdear->url();

        return view('oh-dear::certificate.index', compact('certificate', 'certificateCheck', 'url'));
    }
}