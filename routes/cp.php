<?php

/*
|--------------------------------------------------------------------------
| CP routes
|--------------------------------------------------------------------------
*/

use Jonassiewertsen\OhDear\Http\Controllers\BrokenLinksController;
use Jonassiewertsen\OhDear\Http\Controllers\CertificateHealthController;
use Jonassiewertsen\OhDear\Http\Controllers\MixedContentController;
use Jonassiewertsen\OhDear\Http\Controllers\OverviewController;
use Jonassiewertsen\OhDear\Http\Controllers\UptimeController;

Route::prefix('oh-dear/')->name('oh-dear.')->group(function() {
    Route::get('/', OverviewController::class)->name('index');
    Route::get('/uptime', UptimeController::class)->name('uptime');
    Route::get('/broken-links', BrokenLinksController::class)->name('broken-links');
    Route::get('/mixed-content', MixedContentController::class)->name('mixed-content');
    Route::get('/certificate-health', CertificateHealthController::class)->name('certificate-health');
});
