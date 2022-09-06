@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="{{ asset('css/store_register.css') }}">
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

<h1 class="title">店舗登録</h1>
<form method="POST" action="{{ route('store.register') }}" enctype="multipart/form-data" >
@csrf
  <div class="register-item">
    <div class="item">外観写真<span class="required">必須</span> <span class="caution">※スクエア型でアップロードして下さい</span></div>
    <input type="file" name="outside_photo" accept=".png, .jpg, .jpeg, .pdf" required>
    @error('outside_photo')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">内観写真<span class="required">必須</span> <span class="caution">※スクエア型でアップロードして下さい</span></div>
    <input type="file" name="inside_photo" accept=".png, .jpg, .jpeg, .pdf" required>
    @error('inside_photo')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">店舗名<span class="required">必須</span></div>
    <input type="text" name="store_name" value="{{ old('store_name') }}">
    @error('store_name')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">かな<span class="required">必須</span></div>
    <input type="text" name="kana"  value="{{ old('kana') }}">
    @error('kana')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">エリア<span class="required">必須</span></div>
    <select name="area">
      <option value="" selected disabled>選択してください</option>
      <option value="和歌山市" @if(old('area')=='和歌山市') selected @endif>和歌山市</option>
      <option value="海南市" @if(old('area')=='海南市') selected @endif>海南市</option>
      <option value="橋本市" @if(old('area')=='橋本市') selected @endif>橋本市</option>
      <option value="有田市" @if(old('area')=='有田市') selected @endif>有田市</option>
      <option value="御坊市" @if(old('area')=='御坊市') selected @endif>御坊市</option>
      <option value="田辺市" @if(old('area')=='田辺市') selected @endif>田辺市</option>
      <option value="新宮市" @if(old('area')=='新宮市') selected @endif>新宮市</option>
      <option value="紀の川市" @if(old('area')=='紀の川市') selected @endif>紀の川市</option>
      <option value="岩出市" @if(old('area')=='岩出市') selected @endif>岩出市</option>
      <option value="紀美野町" @if(old('area')=='紀美野町') selected @endif>紀美野町</option>
      <option value="かつらぎ町" @if(old('area')=='かつらぎ町') selected @endif>かつらぎ町</option>
      <option value="九度山町" @if(old('area')=='九度山町') selected @endif>九度山町</option>
      <option value="高野町" @if(old('area')=='高野町') selected @endif>高野町</option>
      <option value="湯浅町" @if(old('area')=='湯浅町') selected @endif>湯浅町</option>
      <option value="広川町" @if(old('area')=='広川町') selected @endif>広川町</option>
      <option value="有田川町" @if(old('area')=='有田川町') selected @endif>有田川町</option>
      <option value="美浜町" @if(old('area')=='美浜町') selected @endif>美浜町</option>
      <option value="日高川町" @if(old('area')=='日高川町') selected @endif>日高川町</option>
      <option value="由良町" @if(old('area')=='由良町') selected @endif>由良町</option>
      <option value="印南町" @if(old('area')=='印南町') selected @endif>印南町</option>
      <option value="みなべ町" @if(old('area')=='みなべ町') selected @endif>みなべ町</option>
      <option value="日高川町" @if(old('area')=='日高川町') selected @endif>日高川町</option>
      <option value="白浜町" @if(old('area')=='白浜町') selected @endif>白浜町</option>
      <option value="上富田町" @if(old('area')=='上富田町') selected @endif>上富田町</option>
      <option value="すさみ町" @if(old('area')=='すさみ町') selected @endif>すさみ町</option>
      <option value="那智勝浦町" @if(old('area')=='那智勝浦町') selected @endif>那智勝浦町</option>
      <option value="太地町" @if(old('area')=='太地町') selected @endif>太地町</option>
      <option value="古座川町" @if(old('area')=='古座川町') selected @endif>古座川町</option>
      <option value="北山村" @if(old('area')=='北山村') selected @endif>北山村</option>
      <option value="串本町" @if(old('area')=='串本町') selected @endif>串本町</option>
    </select>
    @error('area')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">住所<span class="required">必須</span></div>
    <input type="text" name="store_address" value="{{ old('store_address') }}">
    @error('store_address')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">ジャンル<span class="required">必須</span></div>
    <div class="genre-top">
      <select name="genre1">
        <option value="" selected disabled>選択してください</option>
        <option value="モーニング" @if(old('genre1')=='モーニング') selected @endif>モーニング</option>
        <option value="ランチ" @if(old('genre1')=='ランチ') selected @endif>ランチ</option>
        <option value="カフェ" @if(old('genre1')=='カフェ') selected @endif>カフェ</option>
        <option value="ディナー" @if(old('genre1')=='ディナー') selected @endif>ディナー</option>
        <option value="夜カフェ" @if(old('genre1')=='夜カフェ') selected @endif>夜カフェ</option>
        <option value="バー" @if(old('genre1')=='バー') selected @endif>バー</option>
        <option value="居酒屋" @if(old('genre1')=='居酒屋') selected @endif>居酒屋</option>
        <option value="定食等" @if(old('genre1')=='定食等') selected @endif>定食等</option>
      </select>
      <select name="genre2">
        <option></option>
        <option value="モーニング" @if(old('genre2')=='モーニング') selected @endif>モーニング</option>
        <option value="ランチ" @if(old('genre2')=='ランチ') selected @endif>ランチ</option>
        <option value="カフェ" @if(old('genre2')=='カフェ') selected @endif>カフェ</option>
        <option value="ディナー" @if(old('genre2')=='ディナー') selected @endif>ディナー</option>
        <option value="夜カフェ" @if(old('genre2')=='夜カフェ') selected @endif>夜カフェ</option>
        <option value="バー" @if(old('genre2')=='バー') selected @endif>バー</option>
        <option value="居酒屋" @if(old('genre2')=='居酒屋') selected @endif>居酒屋</option>
        <option value="定食等" @if(old('genre2')=='定食等') selected @endif>定食等</option>
      </select>
      <select name="genre3">
        <option></option>
        <option value="モーニング" @if(old('genre3')=='モーニング') selected @endif>モーニング</option>
        <option value="ランチ" @if(old('genre3')=='ランチ') selected @endif>ランチ</option>
        <option value="カフェ" @if(old('genre3')=='カフェ') selected @endif>カフェ</option>
        <option value="ディナー" @if(old('genre3')=='ディナー') selected @endif>ディナー</option>
        <option value="夜カフェ" @if(old('genre3')=='夜カフェ') selected @endif>夜カフェ</option>
        <option value="バー" @if(old('genre3')=='バー') selected @endif>バー</option>
        <option value="居酒屋" @if(old('genre3')=='居酒屋') selected @endif>居酒屋</option>
        <option value="定食等" @if(old('genre3')=='定食等') selected @endif>定食等</option>
      </select>
      <select name="genre4">
        <option></option>
        <option value="モーニング" @if(old('genre4')=='モーニング') selected @endif>モーニング</option>
        <option value="ランチ" @if(old('genre4')=='ランチ') selected @endif>ランチ</option>
        <option value="カフェ" @if(old('genre4')=='カフェ') selected @endif>カフェ</option>
        <option value="ディナー" @if(old('genre4')=='ディナー') selected @endif>ディナー</option>
        <option value="夜カフェ" @if(old('genre4')=='夜カフェ') selected @endif>夜カフェ</option>
        <option value="バー" @if(old('genre4')=='バー') selected @endif>バー</option>
        <option value="居酒屋" @if(old('genre4')=='居酒屋') selected @endif>居酒屋</option>
        <option value="定食等" @if(old('genre4')=='定食等') selected @endif>定食等</option>
      </select>
    </div>
    <br>
    <div class="genre-bottom">
      <select name="genre5">
        <option></option>
        <option value="モーニング" @if(old('genre5')=='モーニング') selected @endif>モーニング</option>
        <option value="ランチ" @if(old('genre5')=='ランチ') selected @endif>ランチ</option>
        <option value="カフェ" @if(old('genre5')=='カフェ') selected @endif>カフェ</option>
        <option value="ディナー" @if(old('genre5')=='ディナー') selected @endif>ディナー</option>
        <option value="夜カフェ" @if(old('genre5')=='夜カフェ') selected @endif>夜カフェ</option>
        <option value="バー" @if(old('genre5')=='バー') selected @endif>バー</option>
        <option value="居酒屋" @if(old('genre5')=='居酒屋') selected @endif>居酒屋</option>
        <option value="定食等" @if(old('genre5')=='定食等') selected @endif>定食等</option>
      </select>
      <select name="genre6">
        <option></option>
        <option value="モーニング" @if(old('genre6')=='モーニング') selected @endif>モーニング</option>
        <option value="ランチ" @if(old('genre6')=='ランチ') selected @endif>ランチ</option>
        <option value="カフェ" @if(old('genre6')=='カフェ') selected @endif>カフェ</option>
        <option value="ディナー" @if(old('genre6')=='ディナー') selected @endif>ディナー</option>
        <option value="夜カフェ" @if(old('genre6')=='夜カフェ') selected @endif>夜カフェ</option>
        <option value="バー" @if(old('genre6')=='バー') selected @endif>バー</option>
        <option value="居酒屋" @if(old('genre6')=='居酒屋') selected @endif>居酒屋</option>
        <option value="定食等" @if(old('genre6')=='定食等') selected @endif>定食等</option>
      </select>
      <select name="genre7">
        <option></option>
        <option value="モーニング" @if(old('genre7')=='モーニング') selected @endif>モーニング</option>
        <option value="ランチ" @if(old('genre7')=='ランチ') selected @endif>ランチ</option>
        <option value="カフェ" @if(old('genre7')=='カフェ') selected @endif>カフェ</option>
        <option value="ディナー" @if(old('genre7')=='ディナー') selected @endif>ディナー</option>
        <option value="夜カフェ" @if(old('genre7')=='夜カフェ') selected @endif>夜カフェ</option>
        <option value="バー" @if(old('genre7')=='バー') selected @endif>バー</option>
        <option value="居酒屋" @if(old('genre7')=='居酒屋') selected @endif>居酒屋</option>
        <option value="定食等" @if(old('genre7')=='定食等') selected @endif>定食等</option>
      </select>
      <select name="genre8">
        <option></option>
        <option value="モーニング" @if(old('genre8')=='モーニング') selected @endif>モーニング</option>
        <option value="ランチ" @if(old('genre8')=='ランチ') selected @endif>ランチ</option>
        <option value="カフェ" @if(old('genre8')=='カフェ') selected @endif>カフェ</option>
        <option value="ディナー" @if(old('genre8')=='ディナー') selected @endif>ディナー</option>
        <option value="夜カフェ" @if(old('genre8')=='夜カフェ') selected @endif>夜カフェ</option>
        <option value="バー" @if(old('genre8')=='バー') selected @endif>バー</option>
        <option value="居酒屋" @if(old('genre8')=='居酒屋') selected @endif>居酒屋</option>
        <option value="定食等" @if(old('genre8')=='定食等') selected @endif>定食等</option>
      </select>
      @error('genre1')
        <span class="error-message">{{$message}}</span>
      @enderror
    </div>
    <div class="item">定休日</div>
    <input type="text" name="regular_holiday"  value="{{ old('regular_holiday') }}">
    @error('regular_holiday')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">営業時間</div>
    <input type="text" name="business_hours"  value="{{ old('business_hours') }}">
    @error('business_hours')
      <span class="error-message">{{$message}}</span>
    @enderror
    <div class="item">電話番号 <span class="caution">※ハイフン無しで数字のみ</span></div>
    <input type="text" name="store_phone_number" value="{{ old('store_phone_number') }}">
    @if($errors->has('store_phone_number'))
			@foreach($errors->get('store_phone_number') as $message)
				<span class="error-message">{{$message}}</span>
			@endforeach
		@endif 
  </div>
  <div class="register-button">
    <button>登録</button>
  </div>
</form>
@endsection
