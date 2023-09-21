<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/butas.miru.css') }}">
    <title>butas_matching</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <nav class="flex justify-between">
                <a href="{{ url('/dashboard') }}" class="btn">Top</a>
                <a href="{{ url('/impression') }}" class="btn">impression</a>
                <a href="{{ url('/Matching') }}" class="btn">Matching</a>
            </nav>
        </x-slot>
    </x-app-layout>

 <!-- 口コミ一覧表示 -->

<section>
    <h2>飼い主の口コミ一覧</h2>

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

<!-- すべてのユーザーに表示するリンクは不要になるので、削除します -->

<!-- ... -->



    <h1>MAICRO PIG SERVICE Match</h1>
    <hr class="hr" width=400 size=3>
    <hr class="hr1" width=400 size=3>


    <h2></h2>
    <div class="filter-buttons">
        <button onclick="filterOwners('kanto')">　　</button>
        <button onclick="filterOwners('kansai')"> 　　</button>
        <button onclick="filterOwners('island')"> 　　</button>
    </div>
    <div class="rect"></div>
</body>

</html>