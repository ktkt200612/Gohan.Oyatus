@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="{{ asset('css/store.css') }}">
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
  <div class="wrapper-top">
    <div class="store-name">{{ $form->store_name }}</div>
    <div class="store">
      <div class="address"><span class="item">住所</span>：{{ $form->store_address }}</div>
      <div class="number"><span class="item">電話番号</span>：{{ $form->store_phone_number }}</div>
      <div class="genre"><span class="item">ジャンル</span>：{{ $form->genre1 }} @if(!empty( $form->genre2 ))   /{{ $form->genre2 }} @endif @if(!empty( $form->genre3 ))   /{{ $form->genre3 }} @endif @if(!empty( $form->genre4 ))   /{{ $form->genre4 }} @endif @if(!empty( $form->genre5 ))   /{{ $form->genre5 }} @endif @if(!empty( $form->genre6 ))   /{{ $form->genre6 }} @endif @if(!empty( $form->genre7 ))   /{{ $form->genre7 }} @endif @if(!empty( $form->genre8 ))   /{{ $form->genre8 }} @endif
      </div>
      <div class="hours"><span class="item">営業時間</span>：{{ $form->business_hours }}</div>
      <div class="holiday"><span class="item">定休日</span>：{{ $form->regular_holiday }}</div>
      <form action="{{ route('store.edit.page') }}" method="get">
        @csrf
        @if(( $form->user_id )==(Auth::id()))   
          <div class="store-edit-button">
            <button type="submit"  name="id" value="{{ $form->id }}">店舗編集</button>
          </div>
        @endif
      </form>
    </div>
  </div>
  <div class="wrapper-bottom">
    <div class="title">〜 Menu 〜</div>
    <form action="{{ route('menu.register.page') }}" method="get">
    @csrf
      <div class="menu-register-button">
        <button type="submit"  name="id" value="{{ $form->id }}">メニュー登録</button>
      </div>
    </form>
    <div class="menu">
      <table>
        @foreach ($items as $item)
          @if($loop->iteration %2 !=0)
            <tr>
          @endif
          <td class="photo"><img src="data:/jpg;base64,{{ $item->photo }}" width="300" height="300" onerror="this.src='image/no_image.png';this.onerror=false;" ></td>
          <td class="menu-name">{{ $item->menu_name }}</td>
          <td class="limited">{{ $item->limited }}</td>
          <td class="menu-edit-button">
            <form action="{{ route('menu.edit.page') }}" method="get">
            @csrf
              @if(( $item->user_id )==(Auth::id()))   
              <div class="edit-button">
                <button type="submit"  name="id" value="{{ $item->id }}">編集</button>
              </div>
              @endif
            </form>
          </td>
          @if($loop->iteration %2 ==0)
            </tr>
          @endif
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
