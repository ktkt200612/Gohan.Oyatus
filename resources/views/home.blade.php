@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="css/home.css">
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

<div class="about">
  <p class="about__title">和歌山の飲食店を盛り上げよう</p>
  <div class="pickup">
    <p class="pickup__text">\ みんなで飲食店のメニューを作り上げていくサイトです /</p>
    <p class="pickup__text">会員登録をして、お気に入りの店舗、メニューを投稿してください！</p>
    <p class="pickup__text">お店探しにもぜひご利用ください 🔍</p>
  </div>
</div>

<div class="img">
  <img src="image/home1.jpg" alt="img" width="33%" height="400" onerror="this.src='image/noimage.png';this.onerror=false;" />
  <img src="image/home5.jpg" alt="img" width="33%" height="400" onerror="this.src='image/noimage.png';this.onerror=false;" />
  <img src="image/home3.jpg" alt="img" width="33%" height="400" onerror="this.src='image/noimage.png';this.onerror=false;" />
  <div class="img__bottom">
    <img src="image/home4.jpg" alt="img" width="24.5%" height="300" onerror="this.src='image/noimage.png';this.onerror=false;" />
    <img src="image/home7.jpg" alt="img" width="24.5%" height="300" onerror="this.src='image/noimage.png';this.onerror=false;" />
    <img src="image/home6.jpg" alt="img" width="24.5%" height="300" onerror="this.src='image/noimage.png';this.onerror=false;" />
    <img src="image/home2.jpg" alt="img" width="24.5%" height="300" onerror="this.src='image/noimage.png';this.onerror=false;" />
  </div>
</div>
@endsection
