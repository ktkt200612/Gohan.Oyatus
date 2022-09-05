@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="{{ asset('css/menu_delete.css') }}">
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





<h1 class="delete-title">削除の実行</h1>
<div class="container">
  <p class="delete-text">この操作は取り消しできません。<br>本当に削除を実行しますか？</p>
  <form action="{{ route('menu.delete') }}" method="POST">
  @csrf
    <input type="hidden"  name="id" value="{{$item->id}}">
    <div class="yes">
      <button type="submit" name="action" value="post">はい</button>
    </div>
    <div class="no">
      <button type="submit" name="action" value="back">戻る</button>
    </div>
  </form>
</div>
@endsection

      