<!-- タイトルを H1 タグで表示する -->
<h1>{{ $diary->title }}</h1>
<div>
  <a href="{{ route('diary.edit', $diary) }}">
    <button>編集</button>
  </a>
</div>
<!-- 内容と日付を表示する -->
<div>
  <div>{{ $diary->date }}</div>
  <div>{{ $diary->body }}</div>
</div>

<form method="post" action="{{ route('diary.destroy', $diary->id) }}">
  @csrf
  @method('delete')
  <button>削除</button>
</form>