<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;

class DiaryController extends Controller
{
    //Diaryを表示するView
    public function index() {
        // $name = 'Laravel';
        $diaries = Diary::all();
        return view('diary.index', compact('diaries'));
    }
    // 新規画面作成メソッド
    public function create() {
        return view('diary.create');
    }

    // 新規データ保存メソッド
    public function save(Request $request) {
        //①入力データを格納する
        // <input name="title"...> で指定された内容を取得する
        $title = $request->input('title');
        // <input name="body"...> で指定された内容を取得する
        $body = $request->input('body');

        // ②入力内容を validate メソッドを使って精査する
        $validated = $request->validate([
            'title' => 'required|max:20',    // title は入力必須、かつ 20文字以内 
            'body' => 'required',            // body は入力必須
        ]);

        // 精査済みのデータを利用する
        $title = $validated['title'];
        $body = $validated['body'];

        // ③新しい Diary モデルインスタンスを作成
        $diary = new Diary();

        $diary->date = date("Y-m-d");           // 現在の日付をセット
        $diary->title = $validated['title'];    // 保存する項目をセット
        $diary->body = $validated['body'];      // 保存する項目をセット

        // データベースに保存
        $diary->save();

        // ④保存後にリダイレクトする（例：日記入力ページへ）
        return back()->with('message', '保存しました');
      }

    public function find($id) {
        // findメソッドでidを取得
        $diary = Diary::find($id);
        // viewにデータを渡す
        return view('diary.find', compact('diary'));
    }


}
