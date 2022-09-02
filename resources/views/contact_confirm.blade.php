@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="{{ asset('css/contact_confirm.css') }}">
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

<h1>内容確認</h1>
  <form action="{{ route('contact.send') }}" method="post">
    @csrf
    <div>
      <label>お名前</label>
      {{ $form['name']  }}
      <input type="hidden" name="name" value="{{ $form['name'] }}" />
    </div>
    <div>
      <span>性別</span>
      @if ($form['gender'] === '1')
        <span>男性</span>
      @elseif ($form['gender'] === '2')
        <span>女性</span>
      @endif
      <input type="hidden" name="gender" value="{{ $form['gender'] }}" />
    </div>
    <div>
      <label>メールアドレス</label>
      {{ $form['email']  }}
      <input type="hidden" name="email" value="{{ $form['email'] }}" />
    </div>
    
    <div>
      <span>ご意見</span>
      <span>{{ $form['opinion']  }}</span>
      <input type="hidden" name="opinion" value="{{ $form['opinion'] }}">
    </div>
    

    <div>
      <div>
        <span>機能充実度</span>
        @if ($form['review1'] === '0')
          <span>未選択</span>
        @elseif ($form['review1'] === '1')
          <span>星1</span>
        @elseif ($form['review1'] === '2')
          <span>星2</span>
        @elseif ($form['review1'] === '3')
          <span>星3</span>
        @elseif ($form['review1'] === '4')
          <span>星4</span>
        @elseif ($form['review1'] === '5')
          <span>星5</span>
        @endif
        <input type="hidden" name="review1" value="{{ $form['review1'] }}" />
      </div>
      <div>
        <span>期待度</span>
        @if ($form['review2'] === '0')
          <span>未選択</span>
        @elseif ($form['review2'] === '1')
          <span>星1</span>
        @elseif ($form['review2'] === '2')
          <span>星2</span>
        @elseif ($form['review2'] === '3')
          <span>星3</span>
        @elseif ($form['review2'] === '4')
          <span>星4</span>
        @elseif ($form['review2'] === '5')
          <span>星5</span>
        @endif
        <input type="hidden" name="review2" value="{{ $form['review2'] }}" />
      </div>
      <div>
        <span>好き度</span>
        @if ($form['review3'] === '0')
          <span>未選択</span>
        @elseif ($form['review3'] === '1')
          <span>星1</span>
        @elseif ($form['review3'] === '2')
          <span>星2</span>
        @elseif ($form['review3'] === '3')
          <span>星3</span>
        @elseif ($form['review3'] === '4')
          <span>星4</span>
        @elseif ($form['review3'] === '5')
          <span>星5</span>
        @endif
        <input type="hidden" name="review3" value="{{ $form['review3'] }}" />
      </div>
      <div>
      <button type="submit" name="action" value="post">送信</button><br>
      <button type="submit" name="action" value="back">修正する</button>
    </div>
    </div>
  </form>




@endsection
