@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="{{ asset('css/menu_edit.css') }}">
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

<h1 class=title>メニュー編集</h1>
<form method="POST" action="{{ route('menu.edit') }}" enctype="multipart/form-data" >
  @csrf
  <div class="edit-item">
    <div class="item">写真<span class="required">必須</span> <span class="caution">※スクエア型でアップロードしてください</span></div>
    <input type="file" name="photo" accept=".png, .jpg, .jpeg, .pdf">
    @error('photo')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">料理名<span class="required">必須</span></div>
    <input type="text" name="menu_name" value = "{{ $form->menu_name }}">
    @error('menu_name')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">かな<span class="required">必須</span></div>
    <input type="text" name="kana"  value = "{{ $form->kana }}">
    @error('kana')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">限定品情報 <span class="caution"> ※(例) 夏季限定・数量限定 etc</span></div>
    <input type="text" name="limited" value = "{{ $form->limited }}">
    @error('limited')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">検索ワード <span class="caution">  ※料理につながるワードを入力　(例) パフェ・いちご・魚・中華 etc</span></div>
    <input type="text" name="search_word" value = "{{ $form->search_word }}" >
  </div>
  <div class="edit-button">
    <button name="id" value="{{ $form->id }}">編集完了</button>
  </div>
</form>

<form method="GET" action="{{ route('menu.delete.page') }}">
@csrf
  <div class="delete-button">
    <button name="id" value="{{ $form->id }}">メニュー削除</button>
  </div>
</form>
@endsection
