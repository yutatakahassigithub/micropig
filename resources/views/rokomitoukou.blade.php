<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/butas.toukou.css') }}"> 
        <title>口コミ投稿フォーム</title>
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

        <h1>MICRO PIG SERVICE TOP</h1>
        @if(isset($error_message) && $error_message)
        <p>{{ $error_message }}</p>
        @else
        
        @if(isset($user) && $user)
        <form action="{{ route('rokomi.comments.store', ['user_id' => $user->id]) }}" method="POST">
        @csrf
        <!-- コメントの入力 -->
        <div>
            <label for="comment">コメント:</label>
            <textarea name="comment" id="comment" rows="5" required placeholder="こちらにコメントを入力してください。"></textarea>
        </div>
    
        <!-- 評価の入力 -->
        <div>
            <label for="evaluation">評価 (1-5):</label>
            <input type="number" name="evaluation" id="evaluation" min="1" max="5" required>
        </div>
    
        <!-- 送信ボタン -->
            <div>
                <button type="submit">コメントを投稿</button>
            </div>
        </form>
        
        <div>
        @else
            口コミ機能はまだ使えません。
        @endif
        </div>
         
       @endif     
    </div>

</body>
</html>
