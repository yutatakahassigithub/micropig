<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/butas.impression.css') }}">
  <title>Mini Pig impression</title>
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
    <h1>Mini Pig  impression</h1>
    <p class="p1"></p>
    <p class="p2"></p2>
      <section class="news">
        <div class="inner">
          <h2>Event_Sns_infomation　マイクロブタに関する情報を提供！</h2>
          <ul class="news_list">
              <li class="news_list_item">
                <a href="">
                  <div class="news_list_date">
                    <time>2023.09.26</time>
                    <p class="news_item">おすすめSNS紹介</p>
                  </div>
                  <p>https://twitter.com/pignic_cafe・ピグニックカフェ</p>
                  <span class="arrow"></span>
                </a>
              </li>
              <li class="news_list_item">
                <a href="">
                  <div class="news_list_date">
                    <time>2023.09.26</time>
                    <p class="news_item">おすすめSNS紹介</p>
                  </div>
                    <p>https://twitter.com/mipigcafe ・マイピックカフェ</p>
                  <span class="arrow"></span>
                </a>
              </li>
              <li class="news_list_item">
                <a href="">
                  <div class="news_list_date">
                    <time>2023.09.26</time>
                    <p class="news_item">サイトお知らせ</p>
                  </div>
                  <p>サイトオープンしました。</p>
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













