@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="css/index.css">
<header>
  <a href="/home"><h1 class = "header__title">Gohan.<br>Oyatsu</h1></a>
  <nav class="header_nav">
    <ul>
      <li class="header__nav--list"><a href="/home">ホーム</a></li>
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

<div class="search">
  <form action="{{ route('search') }}" method="post" class="form-content">
    @csrf
    <div class="area">
      <select name="area" value="{{ old('area') }}">
        @if (isset( $keyword['area'])) <option> {{$keyword['area']}} </option>@endif 
        <option value="">和歌山県内全て</option>
        <option value="和歌山市">和歌山市</option>
        <option value="海南市">海南市</option>
        <option value="橋本市">橋本市</option>
        <option value="有田市">有田市</option>
        <option value="御坊市">御坊市</option>
        <option value="田辺市">田辺市</option>
        <option value="新宮市">新宮市</option>
        <option value="紀の川市">紀の川市</option>
        <option value="岩出市">岩出市</option>
        <option value="紀美野町">紀美野町</option>
        <option value="かつらぎ町">かつらぎ町</option>
        <option value="九度山町">九度山町</option>
        <option value="高野町">高野町</option>
        <option value="湯浅町">湯浅町</option>
        <option value="広川町">広川町</option>
        <option value="有田川町">有田川町</option>
        <option value="美浜町">美浜町</option>
        <option value="日高町">日高町</option>
        <option value="由良町">由良町</option>
        <option value="印南町">印南町</option>
        <option value="みなべ町">みなべ町</option>
        <option value="日高川町">日高川町</option>
        <option value="白浜町">白浜町</option>
        <option value="上富田町">上富田町</option>
        <option value="すさみ町">すさみ町</option>
        <option value="那智勝浦町">那智勝浦町</option>
        <option value="太地町">太地町</option>
        <option value="古座川町">古座川町</option>
        <option value="北山村">北山村</option>
        <option value="串本町">串本町</option>
      </select>
    </div>
    <div class="genre">
      <select name="genre"  value="{{ old('genre') }}">
      @if (isset( $keyword['genre'])) <option> {{$keyword['genre']}}</option>@endif 
        <option value="">全てのジャンル</option>
        <option value="モーニング">モーニング</option>
        <option value="ランチ">ランチ</option>
        <option value="カフェ">カフェ</option>
        <option value="ディナー">ディナー</option>
        <option value="夜カフェ">夜カフェ</option>
        <option value="バー">バー</option>
        <option value="居酒屋">居酒屋</option>
        <option value="テイクアウト">テイクアウト</option>
      </select>
    </div>
    <div class="word">
      <input name="search_word"  placeholder="食べたい物・飲みたい物・店舗名" value="@if (isset( $keyword['search_word'])){{$keyword['search_word']}}@endif"   value="{{ old('search_word') }}">
    </div>
    <div class="button">
      <button type="submit" value="post" class="button--search">検索</button>
      <button type="submit" formaction={{ route('index') }} class="button--reset">リセット</button>
    </div>
  </form>
</div>

<div class="page">
  @if (count($forms) > 0)   {{-- (count($forms) = 現ページに表示されているアイテムトータル数 --}}
    <p>全{{ $forms->total() }}件中  {{-- $forms->total() = アイテムトータルの数--}}
      {{ ($forms->currentPage() - 1) * $forms->perPage() + 1 }}〜{{-- $forms->currentPage() = 現ページ数字--}}{{ ($forms->currentPage() - 1) * $forms->perPage() + 1 + (count($forms) - 1) }}件</p>  {{-- $forms->perPage() = 現ページのアイテム個数--}}
  @else
    <p>データがありません。</p>
  @endif
</div>

<div class="container">
  @foreach ($forms as $form)
  <form action="{{ route('store') }}" method="get" class="form">
  @csrf
    <button type="submit"  name="id" value="{{ $form->id }}" class="container-button">
      <div class="photo">
        <img src="{{ Storage::disk('s3')->url("$form->outside_photo")}}"  width="300" height="300" class="outside" onerror="this.src='image/no_image.png';this.onerror=false;" ><img src="{{ Storage::disk('s3')->url("$form->inside_photo")}}"  width="300" height="300" class="inside" onerror="this.src='image/no_image.png';this.onerror=false;" >
      </div>
      <div class="information">
        <div class="store-name">
        {{ $form->store_name }}
        </div>         
        <div class="address">【住所】</div><div class="address-item">{{ $form->store_address }}</div>
        <div class="genre">【ジャンル】</div><div class="genre-item">{{ $form->genre1 }} @if(isset( $form->genre2 ))/ {{ $form->genre2 }}@endif @if(isset( $form->genre3 ))/ {{ $form->genre3 }}@endif @if(isset( $form->genre4 ))/ {{ $form->genre4 }}@endif @if(isset( $form->genre5 ))/ {{ $form->genre5 }}@endif @if(isset( $form->genre6 ))/ {{ $form->genre6 }}@endif @if(isset( $form->genre7 ))/ {{ $form->genre7 }}@endif  @if(isset( $form->genre8 ))/ {{ $form->genre8 }}@endif</div>
        <div class="holiday">【定休日】</div><div class="holiday-item">{{ $form->regular_holiday }}</div>
        <div class="hours">【営業時間】</div><div class="hours-item">{{ $form->business_hours }}</div>
        <div class="number">【電話番号】</div><div class="number-item">{{ $form->store_phone_number }}</div>
      </div>
    </button>
  </form>
  @endforeach
</div>

<div class="pagination">
  {{ $forms->appends(request()->input())->links('pagination::bootstrap-4') }}
</div>
@endsection
