<html>
<body>
@foreach ($diaries as $diary)
<div>
    <div><a href="{{ route('diary.find', $diary) }}">{{ $diary->title }}</a></div>
    <div>{{ $diary->body }}</div>
</div>
@endforeach
</body>
</html>
