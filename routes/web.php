<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/station5', function () {
    return 'Station5';
});

Route::get('/diary', function () {
    return 'Hello!';
});