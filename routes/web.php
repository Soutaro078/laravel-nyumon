<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiaryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/station5', function () {
    return 'Station5';
});

// Route::get('/diary', function () {
//     return 'Hello!';
// });
Route::get('/diary', [DiaryController::class, 'index'])->name('diary.index');
