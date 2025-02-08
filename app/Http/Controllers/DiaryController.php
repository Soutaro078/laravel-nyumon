<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiaryController extends Controller
{
    //メソッドの追加
    public function index() {
        $name = 'Laravel';
        return view('diary.index', compact('name'));
    }
}
