<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="{{ asset('css/butas.css') }}">
        <title>Mini Pig service</title>
    </head>
<body>
    <div class="wrap">
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><div class="hutunohito1"> 飼い主マイページ</div>
                    @else
                        <a href="{{ route('login') }}" class="login-link　text-sm text-gray-700 dark:text-gray-500 underline"><div class="hutunohito2"> ・飼い主ログイン</div></a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="login-link　ml-4 text-sm text-gray-700 dark:text-gray-500 underline"><div class="hutunohito3"> ・飼い主新登録</div></a>
                        @endif
                    @endauth
                </div>
            @endif
    <div class="hutunohito"> 
       <a href="{{ route('dashboard') }}" class="btn">飼い主じゃない人はこちらから！(ゲストさん）</a>
    </div>  
    <h1>Mini Pig service</h1>
    <h2>🐷マイクロブタとは？</h2>
    <p class="p1">・このサイトではマイクロブタに関する情報、<br>
    マイクロブタに関するイベント、実際の飼い主さんと<br>
    つながれるサービスなどを提供しています。<br>
    マイクロブタに興味のある人や実際に飼っている人<br>
    にとっておすすめなＷＥＢサービスです。</p1>
    <div class="pig2">
     <img src="{{ asset('css/26551396_s.jpg') }}" alt="pig2 Logo" />
    </div>
    <div class="pig3">
      <img src="{{ asset('css/26551397_s.jpg') }}" alt="pig3 Logo" />
    </div>
    <p class="p2">・マイクロブタは通常のブタと比べて体が小さく、<br>
    可愛らしい姿をしています。大人の体重は通常20kg未満であるため、<br>
    新世代ペットとして注目されています。マイクロブタは賢く、<br>
    綺麗好きで人に懐きやすい性格を持っています。</p2>
    <div class="pig4">
      <img src="{{ asset('css/3631803_s.jpg') }}" alt="pig4 Logo" />
    </div>
     <h4>🐽🐽🐽よろしくね！🐽🐽🐽</h4>
     <h5>🐖🐖🐖🐖🐖🐖🐖🐖🐖🐖🐖</h5>
    </div>
</body>
</html>