<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

class CertificateHealthController extends Controller {
    public function index() {
        if ($this->ohdear === null) {
            return $this->errorView();
        }

        $certificate        = $this->ohdear->certificate();
        $certificateCheck   = $this->ohdear->certificateCheck();
        $url                = $this->ohdear->url();

        return view('oh-dear::certificate.index', compact('certificate', 'certificateCheck', 'url'));
    }
}