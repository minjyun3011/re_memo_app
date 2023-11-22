<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>memo show</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>{{ $memo->title }}</h1>
    <p>{!! nl2br(e($memo->body)) !!}</p>
    <div class="button-group">
        <!-- $memoのidを元に編集ページへ遷移する -->
        <button onclick="location.href='{{ route('rememos.edit', $memo) }}'">編集する</button>
        <form action="{{ route('rememos.destroy', $memo) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
        </form>
    </div>
    <!-- $memoのidを元に編集ページへ遷移する -->
        <button onclick="location.href='{{ route('rememos.index', $memo) }}'">戻る</button>
</body>

</html>
