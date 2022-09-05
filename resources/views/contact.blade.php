@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
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
<h1 class="title">お問い合わせ・アンケート<br>※アンケートだけでもぜひお願致します</h1>
<div class="container">
  <form action="{{ route('contact.confirm') }}" method="post" >
    @csrf
    <div class="item-title">
      <label for="name" class="title-name">ユーザー名 or お名前</label><span class="required">必須</span>
    </div>
    <input type="text" name="name" id="name" @auth value="<?php $user = Auth::user(); ?>{{ $user->name}}" @endauth value="{{ old('name') }}" />
    <div class=error>
      @error('name')
        {{ $message }}
      @enderror
    </div>
    <div class="item-title">
      <span class="title-gender" >性別</span><span class="required">必須</span>
    </div>
    <input type="radio" name="gender" value="1" id="male" checked  {{ old('gender') == '1' ? 'checked' : '' }}><label for="review000" checked ><label for="male">男性</label>
    <input type="radio" name="gender" value="2" id="female"  {{ old('gender') == '2' ? 'checked' : '' }}><label for="review000" checked ><label for="female">女性</label>
    <div class=error>
      @error('gender')
        {{ $message }}
      @enderror
    </div>
    <div class="item-title">
      <label for="email" class="title-email">メールアドレス</label><span class="required">必須</span>
    </div>
    <input type="text" name="email" id="email" @auth value="<?php $user = Auth::user(); ?>{{ $user->email}}"  @endauth value="{{ old('email') }}" />
    <div class=error>
      @error('email')
        {{ $message }}
      @enderror
    </div>
    <div class="item-title">
      <label for="opinion" class="opinion">内容</label>
    </div>
    <textarea name="opinion" id="opinion" cols="30" rows="10" maxlength="120"  >{{ old('opinion') }}</textarea>
    <div class="careful">※本サイトに対しての疑問・要望・ご意見など<br>※120文字以内で入力してください
    </div>
    <div class=error>
      @error('opinion')
        {{ $message }}
      @enderror
    </div>
    <p class="review-title">本サイトに対するアンケート</p>
    <div class="review1"> 
      <span class="title-review1">①機能充実度</span>
      <div class="stars1">
        <input id="review0" type="radio" name="review1"  value="0" checked {{ old('review1') == '0' ? 'checked' : '' }}><label for="review0" checked class="unselected">未選択</label>
        <span>
          <input id="review1" type="radio" name="review1" value="5" {{ old('review1') == '5' ? 'checked' : '' }}><label for="review1">★</label>
          <input id="review2" type="radio" name="review1" value="4"  {{ old('review1') == '4' ? 'checked' : '' }}><label for="review2">★</label>
          <input id="review3" type="radio" name="review1" value="3"  {{ old('review1') == '3' ? 'checked' : '' }}><label for="review3">★</label>
          <input id="review4" type="radio" name="review1" value="2"  {{ old('review1') == '2' ? 'checked' : '' }}><label for="review4">★</label>
          <input id="review5" type="radio" name="review1" value="1"  {{ old('review1') == '1' ? 'checked' : '' }}><label for="review5">★</label>
        </span>
      </div>
    </div>
    <div class="review2">
      <span class="title-review2">②期待度</span>
      <div class="stars2">
        <input id="review00" type="radio" name="review2" value="0" checked  {{ old('review2') == '0' ? 'checked' : '' }}><label for="review00" checked class="unselected" >未選択</label>
        <span>
          <input id="review01" type="radio" name="review2" value="5"  {{ old('review2') == '5' ? 'checked' : '' }}><label for="review01">★</label>
          <input id="review02" type="radio" name="review2" value="4"  {{ old('review2') == '4' ? 'checked' : '' }}><label for="review02">★</label>
          <input id="review03" type="radio" name="review2" value="3"  {{ old('review2') == '3' ? 'checked' : '' }}><label for="review03">★</label>
          <input id="review04" type="radio" name="review2" value="2"  {{ old('review2') == '2' ? 'checked' : '' }}><label for="review04">★</label>
          <input id="review05" type="radio" name="review2" value="1"  {{ old('review2') == '1' ? 'checked' : '' }}><label for="review05">★</label>
        </span>
      </div>
    </div>
    <div class="review3">
      <span class="title-review3">③好き度</span>
      <div class="stars3">
        <input id="review000" type="radio" name="review3" value="0" checked  {{ old('review3') == '0' ? 'checked' : '' }}><label for="review000" checked class="unselected" >未選択</label>
        <span>
          <input id="review001" type="radio" name="review3" value="5"  {{ old('review3') == '5' ? 'checked' : '' }}><label for="review001">★</label>
          <input id="review002" type="radio" name="review3" value="4"  {{ old('review3') == '4' ? 'checked' : '' }}><label for="review002">★</label>
          <input id="review003" type="radio" name="review3" value="3"  {{ old('review3') == '3' ? 'checked' : '' }}><label for="review003">★</label>
          <input id="review004" type="radio" name="review3" value="2"  {{ old('review3') == '2' ? 'checked' : '' }}><label for="review004">★</label>
          <input id="review005" type="radio" name="review3" value="1"  {{ old('review3') == '1' ? 'checked' : '' }}><label for="review005">★</label>
        </span>
      </div>
    </div>
    <div class="confirm">
      <button type="submit" >確認</button>
    </div>
  </form>
  <script src="{{ asset('js/contact.js') }}"></script>
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</div>


@endsection
