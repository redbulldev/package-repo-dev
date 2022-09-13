<?php

use Illuminate\Support\Facades\Route;

use Rebbull\Http\Controllers\DemoController;


Route::get('/demo', function () {
    return 'hello world';
});


Route::get('/test', [DemoController::class, 'getIndex']);
