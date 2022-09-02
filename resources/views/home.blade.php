@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="css/home.css">
<header>
  <a href="/home"><h1 class = "header__title">Gohan.<br>Oyatsu</h1></a>
  <nav class="header_nav">
    <ul>
      <li class="header__nav--list"><a href="/index">店舗検索</a></li>
      <li class="header__nav--list"><a href="/store/register/page">店舗登録</a></li>
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
          <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
            this.closest('form').submit();">
            {{ __('ログアウト') }}
          </x-dropdown-link>
        </form></a>
      </li>
      <li class="header__nav--list">
        <p><?php $user = Auth::user(); ?>{{ $user->name}}さん</p>
      </li>
      @endauth
    </ul>
  </nav>
</header>
<div class="about">
  <p class="about__title">和歌山県内の飲食店を盛り上げよう</p>
  <div class="pickup">
    <p class="pickup__text">みんなで飲食店のメニューを作り上げていくサイトです</p>
    <p class="pickup__text">おすすめの店舗、料理を投稿してください</p>
  </div>
</div>
<div class="img">
  <img src="image/home4.jpg" alt="img" width="33%" height="400" onerror="this.src='image/noimage.png';this.onerror=false;" />
  <img src="image/home7.jpg" alt="img" width="33%" height="400" onerror="this.src='image/noimage.png';this.onerror=false;" />
  <img src="image/home3.jpg" alt="img" width="33%" height="400" onerror="this.src='image/noimage.png';this.onerror=false;" />
  <div class="img__bottom">
    <img src="image/home1.jpg" alt="img" width="24.5%" height="300" onerror="this.src='image/noimage.png';this.onerror=false;" />
    <img src="image/home5.jpg" alt="img" width="24.5%" height="300" onerror="this.src='image/noimage.png';this.onerror=false;" />
    <img src="image/home6.jpg" alt="img" width="24.5%" height="300" onerror="this.src='image/noimage.png';this.onerror=false;" />
    <img src="image/home2.jpg" alt="img" width="24.5%" height="300" onerror="this.src='image/noimage.png';this.onerror=false;" />
  </div>
</div>
@endsection
