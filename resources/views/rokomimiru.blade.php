<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/butas.miru.css') }}">
    <title>Mini Pig Matching eturan</title>
</head>

<body>
     <x-app-layout>
    <x-slot name="header">
        <nav class="flex justify-between">
            <a href="{{ url('/dashboard') }}" class="btn">Top　</a>
            <a href="{{ url('/impression') }}" class="btn">impression　</a> 
            <a href="{{ url('/Matching') }}" class="btn">Matching</a>
        </nav>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
        </div>
    </div>
    </x-app-layout>
<section>
    <h2>飼い主同士の口コミ一覧</h2>
    @if($comments)
        @foreach($comments as $comment)
            <div class="post">
                <p>コメント: {{ $comment->comment ?? 'コメントなし' }}</p>
                <p>評価: {{ $comment->evaluation ?? '評価なし' }}</p>
                <p>By: {{ $comment->fromUser->name ?? 'ゲスト' }}</p>
                @if(Auth::id() === $comment->from_user_id)
                    <form action="{{ route('rokomi.comments.destroy', ['id' => $comment->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                @endif
            </div>
        @endforeach
    @else
        <p>ゲストの口コミは見れません、現在は飼い主さん同士の口コミしか見れません。</p>
    @endif
</section>
    <h1>Mini Pig Matching eturan</h1>
    <div class="filter-man">
        <a href="{{ route('rokomimiru', ['user_id' => Auth::check() ? Auth::id() : 'guest']) }}" class="btn">飼い主口コミを閲覧する<br>
    ページへ移動する！</a>
    </div>
    <div class="filter-girl">
        <a href="{{ route('rokomitoukou.create', ['user_id' => Auth::check() ? Auth::id() : 'guest']) }}" class="btn">飼い主口コミを投稿する<br>ページへ移動する！</a>
    </div>
    <h2></h2>
    <div class="rect"></div>
</body>

</html>
