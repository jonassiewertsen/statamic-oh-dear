<?php

return [
    /**
     * By default, the Oh Dear auto maintenance mode is turned off.
     *
     * With the auto maintenance turned on, the maintenance windows will be
     * set automatically, if calling the artisan up and down commands.
     */
    'auto_maintenance' => env('OH_DEAR_AUTO_MAINTENANCE', false),

    /**
     * You need to provide a Oh Dear API Key, so we can talk to your sites.
     */
    'api_key' => env('OH_DEAR_API_KEY'),

    /**
     * Let us know, which site we should talk to.
     */
    'site_id' => env('OH_DEAR_SITE_ID'),
];
