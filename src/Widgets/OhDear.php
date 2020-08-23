<?php

namespace Jonassiewertsen\OhDear\Widgets;

use Statamic\Widgets\Widget;
use Statamic\Facades\User;
use Jonassiewertsen\OhDear\OhDear as OhDearInstance;

class OhDear extends Widget
{
    /**
     * The HTML that should be shown in the widget
     *
     * @return \Illuminate\View\View
     */
    public function html()
    {
        if (!User::current()->can('show ohdear')) {
            return;
        }

        $ohdear = new OhDearInstance();

        // Prevent the Widget from showing, when the token or site has not been set
        if ($ohdear->ohDear === null || $ohdear->site === null) {
            return;
        }

        $checks = [
            'uptime'        => $ohdear->uptimeCheck(),
            'broken_links'  => $ohdear->brokenLinksCheck(),
            'mixed_content' => $ohdear->mixedContentCheck(),
            'certificate'   => $ohdear->certificateCheck(),
        ];

        return view('oh-dear::widget.index', compact('checks'));
    }
}
