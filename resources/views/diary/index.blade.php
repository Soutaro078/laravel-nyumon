<html>
<body>
@foreach ($diaries as $diary)
<div>
    <div>{{ $diary->date }}</div>
    <div>{{ $diary->title }}</div>
</div>
@endforeach
</body>
</html>
