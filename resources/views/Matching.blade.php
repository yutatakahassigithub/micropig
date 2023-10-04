<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/butas.match.css') }}"> 
    <title>Mini Pig Matching</title>
</head>
<body>
     <x-app-layout>
    <x-slot name="header">
        <nav class="flex justify-between">
            <a href="{{ url('/dashboard') }}" class="btn">Top　</a>
            <a href="{{ url('/impression') }}" class="btn">impression</a> 
            <a href="{{ url('/Matching') }}" class="btn">　Matching</a>
        </nav>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
        </div>
    </div>
    </x-app-layout>
    <h1>Mini Pig Matching</h1>
    <div class="pig1">
        <img src="../css/match_micropig.jpg"　alt="pig1 Logo" />
    </div>
    <p class="pp1">・このコンテンツページではマイクロブタを買っている飼い主さん<br>
        とのマッチング紹介サービスである。会いたいマイクロブタの飼い主さん<br>
    との連絡先を提供しています。会いたい場合は連絡してください。</p>
    </p>
    <hr class="hr1" width=400 size=3>
    <script src="{{ asset('css/butas_match.js') }}"></script>
    <h2>飼い主さんを探す！連絡が取れます！</h2>
    <div class="filter-buttons">
       <a href="{{ route('kensaku') }}" class="btn">飼い主さん情報<br>
    ページへ移動する！</a>
    </div>  
</body>
</html>
