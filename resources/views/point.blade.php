@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="{{ asset('css/point.css') }}">
<header>
  <a href="/home"><h1 class = "header__title">Gohan.<br>Oyatsu</h1></a>
  <nav class="header_nav">
    <ul>
      <li class="header__nav--list"><a href="/index">店舗検索</a></li>
      <li class="header__nav--list"><a href="/store/register/page">店舗登録</a></li>
      <li class="header__nav--list"><a href="/point">ユーザーランキング</a></li>
      <li class="header__nav--list"><a href="/contact">お問い合わせ・アンケート</a></li>
      @guest
      <li class="header__nav--list"><a href="/register">会員登録</a></li>
      <li class="header__nav--list">
        <p class="login"><a href="{{ route('login') }}">{{ __('ログイン') }}</a></p>   
      </li>
      @endguest
      @auth
      <li class="header__nav--list">
        <form method="POST" action="{{ route('logout') }}">
        @csrf
          <a href="route('logout')"
            onclick="event.preventDefault();
            this.closest('form').submit();">
            {{ __('ログアウト') }}
          </a>
        </form>
      </li>
      <li class="header__nav--list">
        <p><?php $user = Auth::user(); ?>{{ $user->name}}さん</p>
      </li>
      @endauth
    </ul>
  </nav>
</header>

<div class="container">
  <h1 class="title">Gohan.Oyatsu 貢献度ポイントランキング</h1>
  <?php
  $rank = 1;
  $cnt = 1;
  $previous_point = 0;

  $ranking = '';
  $ranking .= '<table>';
  $ranking .= '<tr><th>順位</th><th>ユーザー名</th><th>ポイント</th><th>店舗登録数</th><th>メニュー登録数</th></tr>';
  foreach($items as $item){
    if($previous_point != $item['point']){
        $rank = $cnt;
    }
    if ($rank >= 6){
        break;
    }
    $ranking .= '<tr>';
    $ranking .= '<td class="rank">'.$rank.'</td>';
    $ranking .= '<td>'.$item['name'].' さん'.'</td>';
    $ranking .= '<td>'.$item['point'].' pt'.'</td>';
    $ranking .= '<td>'.$item['store_quantity'].'</td>';
    $ranking .= '<td>'.$item['menu_quantity'].'</td>';
    $ranking .= '</tr>';
    $previous_point = $item['point'];
    $cnt++;
  }
  $ranking .= '</table>';
  echo $ranking;
  ?>
  <p class="explanation-top">※上位5位まで表示しています</p>
  <p class="explanation-bottom">※ログイン後、ランキングページへアクセスす<br>　ることで、ご自身のポイントが更新されます</p>
</div>
@endsection
