@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="{{ asset('css/contact_confirm.css') }}">
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

<h1 class="title">内容確認</h1>
<div class="container">
  <form action="{{ route('contact.send') }}" method="post">
    @csrf
    <div class="item">
      <span class=name>・ユーザー名 or お名前</span>
      {{ $form['name']  }}
      <input type="hidden" name="name" value="{{ $form['name'] }}" />
    </div>
    <div class="item">
      <span class=gender>・性別</span>
      @if ($form['gender'] === '1')
        男性
      @elseif ($form['gender'] === '2')
        女性
      @endif
      <input type="hidden" name="gender" value="{{ $form['gender'] }}" />
    </div>
    <div class="item">
      <span class=mail>・メールアドレス</span>
      <label class="opinion-ans">{{ $form['email']  }}
      <input type="hidden" name="email" value="{{ $form['email'] }}" />
    </div>
    <div class="item">
      <span class=opinion>・ご意見</span>
      <label class="opinion-ans">{{ $form['opinion']  }}</label>
      <input type="hidden" name="opinion" value="{{ $form['opinion'] }}">
    </div>
      <div class="item">
        <span class=review1>・機能充実度</span>
        @if ($form['review1'] === '0')
          未選択
        @elseif ($form['review1'] === '1')
          星1
        @elseif ($form['review1'] === '2')
          星2
        @elseif ($form['review1'] === '3')
          星3
        @elseif ($form['review1'] === '4')
          星4
        @elseif ($form['review1'] === '5')
          星5
        @endif
        <input type="hidden" name="review1" value="{{ $form['review1'] }}" />
      </div>
      <div class="item">
        <span class=review2>・期待度</span>
        @if ($form['review2'] === '0')
          未選択
        @elseif ($form['review2'] === '1')
          星1
        @elseif ($form['review2'] === '2')
          星2
        @elseif ($form['review2'] === '3')
          星3
        @elseif ($form['review2'] === '4')
          星4
        @elseif ($form['review2'] === '5')
          星5
        @endif
        <input type="hidden" name="review2" value="{{ $form['review2'] }}" />
      </div>
      <div class="item">
        <span class=review3>・好き度</span>
        @if ($form['review3'] === '0')
          未選択
        @elseif ($form['review3'] === '1')
          星1
        @elseif ($form['review3'] === '2')
          星2
        @elseif ($form['review3'] === '3')
          星3
        @elseif ($form['review3'] === '4')
          星4
        @elseif ($form['review3'] === '5')
          星5
        @endif
        <input type="hidden" name="review3" value="{{ $form['review3'] }}" />
      </div>
      <div class="post">
        <button type="submit" name="action" value="post" >送信</button>
      </div>
      <div class="back">
        <button type="submit" name="action" value="back" class="b">修正する</button>
      </div>
    </div>
  </form>
</div>
@endsection
