@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="{{ asset('css/store_edit.css') }}">
<header>
  <a href="/home"><h1 class = "header__title">Gohan.<br>Oyatsu</h1></a>
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

<h1 class="title">店舗編集</h1>
<form method="POST" action="{{ route('store.edit') }}" enctype="multipart/form-data" >
  @csrf
  <div class="edit-item">
    <div class="item">外観写真<span class="required">必須</span> <span class="caution">※スクエア型でアップロードしてください</span></div>
    <input type="file" name="outside_photo" accept=".png, .jpg, .jpeg, .pdf">
    @error('outside_photo')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">内観写真<span class="required">必須</span> <span class="caution">※スクエア型でアップロードしてください</span></div>
    <input type="file" name="inside_photo" accept=".png, .jpg, .jpeg, .pdf">
    @error('inside_photo')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">店舗名<span class="required">必須</span></div>
    <input type="text" name="store_name" value = "{{ $form->store_name }}">
    @error('store_name')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">かな<span class="required">必須</span></div>
    <input type="text" name="kana"  value = "{{ $form->kana }}">
    @error('kana')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">エリア<span class="required">必須</span></div>
    <select name="area" >
      <option>{{ $form->area }}</option>
      <option></option>
      <option>和歌山市</option>
      <option>海南市</option>
      <option>橋本市</option>
      <option>有田市</option>
      <option>御坊市</option>
      <option>田辺市</option>
      <option>新宮市</option>
      <option>紀の川市</option>
      <option>岩出市</option>
      <option>紀美野町</option>
      <option>かつらぎ町</option>
      <option>九度山町</option>
      <option>高野町</option>
      <option>湯浅町</option>
      <option>広川町</option>
      <option>有田川町</option>
      <option>美浜町</option>
      <option>日高町</option>
      <option>由良町</option>
      <option>印南町</option>
      <option>みなべ町</option>
      <option>日高川町</option>
      <option>白浜町</option>
      <option>上富田町</option>
      <option>すさみ町</option>
      <option>那智勝浦町</option>
      <option>太地町</option>
      <option>古座川町</option>
      <option>北山村</option>
      <option>串本町</option>
    </select>
    @error('area')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">住所<span class="required">必須</span></div>
    <input type="text" name="store_address" value = "{{ $form->store_address }}">
    @error('store_address')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">ジャンル<span class="required">必須</span></div>
    <div class="genre-top">
      <select name="genre1" >
        <option>{{ $form->genre1 }}</option>
        <option></option>
        <option>モーニング</option>
        <option>ランチ</option>
        <option>カフェ</option>
        <option>ディナー</option>
        <option>夜カフェ</option>
        <option>バー</option>
        <option>居酒屋</option>
        <option>定食等</option>
      </select>
      <select name="genre2">
        <option>{{ $form->genre2 }}</option>
        <option></option>
        <option>モーニング</option>
        <option>ランチ</option>
        <option>カフェ</option>
        <option>ディナー</option>
        <option>夜カフェ</option>
        <option>バー</option>
        <option>居酒屋</option>
        <option>定食等</option>
      </select>
      <select name="genre3">
        <option>{{ $form->genre3 }}</option>
        <option></option>
        <option>モーニング</option>
        <option>ランチ</option>
        <option>カフェ</option>
        <option>ディナー</option>
        <option>夜カフェ</option>
        <option>バー</option>
        <option>居酒屋</option>
        <option>定食等</option>
      </select>
      <select name="genre4">
        <option>{{ $form->genre4 }}</option>
        <option></option>
        <option>モーニング</option>
        <option>ランチ</option>
        <option>カフェ</option>
        <option>ディナー</option>
        <option>夜カフェ</option>
        <option>バー</option>
        <option>居酒屋</option>
        <option>定食等</option>
      </select>
    </div>
    <br>
    <div class="genre-bottom">
      <select name="genre5">
        <option>{{ $form->genre5 }}</option>
        <option></option>
        <option>モーニング</option>
        <option>ランチ</option>
        <option>カフェ</option>
        <option>ディナー</option>
        <option>夜カフェ</option>
        <option>バー</option>
        <option>居酒屋</option>
        <option>定食等</option>
      </select>
      <select name="genre6">
        <option>{{ $form->genre6 }}</option>
        <option></option>
        <option>モーニング</option>
        <option>ランチ</option>
        <option>カフェ</option>
        <option>ディナー</option>
        <option>夜カフェ</option>
        <option>バー</option>
        <option>居酒屋</option>
        <option>定食等</option>
      </select>
      <select name="genre7">
        <option>{{ $form->genre7 }}</option>
        <option></option>
        <option>モーニング</option>
        <option>ランチ</option>
        <option>カフェ</option>
        <option>ディナー</option>
        <option>夜カフェ</option>
        <option>バー</option>
        <option>居酒屋</option>
        <option>定食等</option>
      </select>
      <select name="genre8" >
        <option>{{ $form->genre8 }}</option>
        <option></option>
        <option>モーニング</option>
        <option>ランチ</option>
        <option>カフェ</option>
        <option>ディナー</option>
        <option>夜カフェ</option>
        <option>バー</option>
        <option>居酒屋</option>
        <option>定食等</option>
      </select>
      @error('genre1')
        <span class="error-message">{{$message}}</span>
      @enderror
    </div>
    <div class="item">定休日</div>
    <input type="text" name="regular_holiday" value = "{{ $form->regular_holiday }}">
    @error('regular_holiday')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">営業時間</div>
    <input type="text" name="business_hours" value = "{{ $form->business_hours }}">
    @error('business_hours')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">電話番号 <span class="caution">※ハイフン無しで数字のみ</span></div>
    <input type="text" name="store_phone_number" value = "{{ $form->store_phone_number }}" >
    @if($errors->has('store_phone_number'))
			@foreach($errors->get('store_phone_number') as $message)
				<span class="error-message">{{$message}}</span>
			@endforeach
		@endif 
  </div>
  <div class="edit-button">
    <button name="id" value="{{ $form->id }}">編集完了</button>
  </div>
</form>

<form method="GET" action="{{ route('store.delete.page') }}">
@csrf
  <div class="delete-button">
    <button name="id" value="{{ $form->id }}">店舗削除</button>
  </div>
</form>
@endsection
