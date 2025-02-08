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

# 日記の新規作成画面
// Route::get('/diary/create(URLの名前)', [DiaryController::class, 'create（メソッド名）'])->name('diary.create（ルートの名前を指定');
Route::get('/diary/create', [DiaryController::class, 'create'])->name('diary.create');

// 新しいデータを保存するルーティング設定
Route::post('/diary', [DiaryController::class, 'save'])->name('diary.save');

//個別ページへのルーティング設定
// Route::get('students/{id}', [DiaryController::class, 'find'])->name('diary.find');
Route::get('/diary/{id}', [DiaryController::class, 'find'])->name('diary.find');
