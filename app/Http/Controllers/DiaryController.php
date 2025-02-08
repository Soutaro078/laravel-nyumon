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

    //特定のIDを見つけるメソッド
    public function find($id) {
        $diary = Diary::find($id);
        if (!$diary) {
            abort(404, 'Diary not found');
        }
        return view('diary.find', compact('diary'));
    }

    // 編集を実行する関数
    public function edit($id) {
        $diary = Diary::find($id);
        if (!$diary) {
            abort(404, 'Diary not found');
        }
        return view('diary.update', compact('diary'));
    }

    //更新処理を実行する関数
    public function update(Request $request, $id) {
        // 更新対象となるデータを取得する
        $diary = Diary::find($id);

        // 入力値チェックを行う
        // タイトルは20文字以内、本文は400文字以内という制限を設ける
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);

        // チェック済みの値を使用して更新処理を行う
        $diary->update($validated);

        // 更新後、日記詳細ページにリダイレクトし、成功メッセージを表示
        return back()->with('message', '更新しました');
    }
      


}
