<?php

/*
|--------------------------------------------------------------------------
| CP routes
|--------------------------------------------------------------------------
*/

Route::prefix('oh-dear/')->name('oh-dear.')->namespace('Http\\Controllers\\')->group(function() {
    Route::get('/', function () {
        return 'hello';
    })->name('index');
});