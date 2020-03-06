<?php

/*
|--------------------------------------------------------------------------
| CP routes
|--------------------------------------------------------------------------
*/

Route::prefix('oh-dear/')->name('oh-dear.')->namespace('Http\\Controllers\\')->group(function() {
    Route::get('/', 'OverviewController@index')->name('index');
    Route::get('/uptime', 'UptimeController@index')->name('uptime');
    Route::get('/broken-links', 'BrokenLinksController@index')->name('broken-links');
    Route::get('/mixed-content', 'MixedContentController@index')->name('mixed-content');
    Route::get('/certificate-health', 'CertificateHealthController@index')->name('certificate-health');
});