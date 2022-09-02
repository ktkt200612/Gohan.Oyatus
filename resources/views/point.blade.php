@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="{{ asset('css/point.css') }}">
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

<h1 class="title">貢献度ポイントランキング</h1>


<table>
  <tr>
    <th>お名前</th>
    <th>合計獲得ポイント総数</th>
    <th>店舗登録</th>
    <th>メニュー登録数</th>
  </tr>
  @foreach ($items as $item)
  <tr>
    <td>
      {{$item->getUserName()}}
    </td>
    <td>
      {{$item->getPoint()}}
    </td>
    <td>
      {{$item->getStoreQuantity()}}
    </td>
    <td>
      {{$item->getMenuQuantity()}}
    </td>
  </tr>
  @endforeach
</table>
  
</form>
@endsection
