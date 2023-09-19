<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="{{ asset('css/butas.1.css') }}">
  <title>Mini Pig serch</title>
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
     @if(auth()->check())
        <p>Welcome, {{ auth()->user()->name }}!</p>
    @else
        <p>Welcome, Guest!</p>
    @endif
 
    <h1>MICRO PIG SERVICE TOP</h1>
    <hr width=400 size=3>
    <h2>🐷マイクロブタとは？</h2>
    <p class="p1">・このサイトではマイクロブタに関する情報、マイクロブタに関するイベント、<br>
    実際の飼い主さんとつながれるサービスなどを提供している。<br>
    マイクロブタに興味のある人や実際に買おうかなと思っている人<br>
    にとっておすすめなＷＥＢサービスです。</p1>
    <script src="../jss/butas.js"></script>
    <div class="pig2">
      <img src="../css/26551396_s.jpg"　alt="pig2 Logo" />
    </div>
    <div class="pig3">
      <img src="../css/26551397_s.jpg" alt="pig3 Logo" />
    </div>
    <p class="p2">・マイクロブタは通常のブタと比べて体が小さく、可愛らしい姿をしています。 大人ブタ<br>
    の体重は通常20kg未満であるため、新世代ペットとして注目されています。<br>
    マイクロブタは賢く、綺麗好きで人に懐きやすい性格を持っています。</p2>
    <div class="rect"></div>   
</body>
</html>