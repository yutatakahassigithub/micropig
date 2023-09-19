<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/butas.kensaku.css') }}"> 
    <title>butas_matching</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <nav class="flex justify-between">
                <a href="{{ url('/dashboard') }}" class="btn">Top </a>
                <a href="{{ url('/impression') }}" class="btn"> impression</a> 
                <a href="{{ url('/Matching') }}" class="btn"> Matching</a>
            </nav>
        </x-slot>
    </x-app-layout>
    <h1>MAICRO PIG SERVICE Match</h1>
    <hr class="hr" width=400 size=3>
    
    <hr class="hr1" width=400 size=3>
   <script src="{{ asset('css/butas_match.js') }}"></script>

    <h2>飼い主さんを探す！連絡が取れます！</h2>
      <div class="filter-buttons">
        <button onclick="filterOwners('east')"></button>
        <button onclick="filterOwners('west')"></button>
        <button onclick="filterOwners('islands')"></button>
    </div>
    <div class="users-list">
    @foreach($users as $user)
        <div class="user-card">
            <h3>{{ $user->name }}</h3>
            <p>Email: {{ $user->email }}</p>
            <p>Area: {{ $user->area }}</p>
            <p>SNS: {{ $user->sns }}</p>
            @if($user->picture)
                <img src="{{ Storage::url($user->picture) }}" alt="User Profile Picture">

            @endif
            <p>{{ $user->explain }}</p>
            </div>
        @endforeach
    </div>
    
<div class="filter-man">
    <!-- ログインしている場合は、Auth::id() を使用し、そうでない場合は適切な代替値または動作を提供します -->
    <a href="{{ route('rokomimiru', ['userId' => Auth::check() ? Auth::id() : 'guest']) }}" class="btn">飼い主口コミを閲覧する<br>
        ページへ移動する！</a>
</div>

<div class="filter-girl">
    <a href="{{ route('rokomitoukou', ['userId' => Auth::check() ? Auth::id() : 'guest']) }}" class="btn">飼い主口コミを投稿する<br>
        ページへ移動する！</a>
</div>

    </div>  
        <div class="rect"></div>  
</body>
</html>
