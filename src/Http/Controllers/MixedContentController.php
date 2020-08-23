<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

class MixedContentController extends Controller
{
    public function index()
    {
        $this->authorize('show ohdear');

        if ($this->ohdear === null) {
            return $this->errorView();
        }

        $mixedContent      = $this->ohdear->mixedContent();
        $mixedContentCheck = $this->ohdear->mixedContentCheck();
        $url               = $this->ohdear->url();

        return view('oh-dear::mixedContent.index', compact('mixedContent', 'mixedContentCheck', 'url'));
    }
}
