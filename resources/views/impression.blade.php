<!DOCTYPE html>
<html lang="ja">
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/butas.impression.css') }}">
  <title>Mini Pig serch</title>
</head>
<body>
       <x-app-layout>
        <x-slot name="header">
            <nav class="flex justify-between">
                <a href="{{ url('/dashboard') }}" class="btn">Top   </a>
                <a href="{{ url('/impression') }}" class="btn">impression</a> 
                <a href="{{ url('/Matching') }}" class="btn">   Matching</a>
            </nav>
        </x-slot>
    </x-app-layout>


    <h1>MICRO PIG SERVICE impression</h1>
    <hr width=400 size=3>
    <p class="p1"></p1>
    <script src="../js/butas_events.js"></script>
    <p class="p2"></p2>
      <section class="news">
        <div class="inner">
          <h2>Event_Sns_infomation</h2>
          <ul class="news_list">
              <li class="news_list_item">
                <a href="">
                  <div class="news_list_date">
                    <time>2020.05.12</time>
                    <p class="news_item">イベントお知らせ</p>
                  </div>
                  <p>サイトリニューアルしました。</p>
                  <span class="arrow"></span>
                </a>
              </li>
              <li class="news_list_item">
                <a href="">
                  <div class="news_list_date">
                    <time>2020.05.12</time>
                    <p class="news_item">おすすめSNS紹介</p>
                  </div>
                  <p>記事が更新されました。。</p>
                  <span class="arrow"></span>
                </a>
              </li>
              <li class="news_list_item">
                <a href="">
                  <div class="news_list_date">
                    <time>2020.05.12</time>
                    <p class="news_item">イベントお知らせ</p>
                  </div>
                  <p>サイトリニューアルしました。</p>
                  <span class="arrow"></span>
                </a>
              </li>
        </ul>
        </div>
        <p class="news_btn"><a href="#" class="btn">一覧を見る</a></p>
        </section>
        </div>
</section>  
    <div class="rect"></div>    
</body>
</html>













