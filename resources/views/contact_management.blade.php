@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="{{ asset('css/contact_management.css') }}">
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

<h1 class=title>お問い合わせ・アンケート管理システム</h1>
<div class="container">
  <form action="{{ route('contact.search') }}" method="post" class="form-content">
    @csrf
    <div>
      <label for="name">ユーザー名 or 名前</label>
      <input type="text" name="name" id="name" >
      <span class=gender >性別</span>
      <input type="radio" name="gender" value="0" id="all" checked /><span class="all">全て</span>
      <input type="radio" name="gender" value="1" id="male"><span  class="male">男性</span>
      <input type="radio" name="gender" value="2" id="female"><span class="female">女性</span>
    </div>
    <div>
      <label for="created_from">登録日</label>
      <input type="date" name="created_from" id="created_from" />
      <span>　〜　</span>
      <input type="date" name="created_to" id="created_to" />
    </div>
    <div>
      <label for="email">メールアドレス</label>
      <input type="text" name="email" id="email" />
    </div>
    <div class="button">
      <div class="post">
        <button type="submit" name="action" value="post" >検索</button>
      </div><br>
      <div  class=back>
        <button type="submit" formaction={{ route('contact.management') }} name="action" value="back">リセット</button>
      </div>
    </div>
  </form>
</div>
<div class="wrap">
  <div class="table-page">
    <div>
      @if (count($forms) > 0)
        <p>全{{ $forms->total() }}件中
          {{ ($forms->currentPage() - 1) * $forms->perPage() + 1 }}〜{{ ($forms->currentPage() - 1) * $forms->perPage() + 1 + (count($forms) - 1) }}件</p>
      @else
        <p>データがありません。</p>
      @endif
    </div>
    <div>
      {{ $forms->appends(request()->input())->links('pagination::bootstrap-4') }}
    </div>
  </div>
  <div class="form-table">
    <table>
      <tr class="table-title">
        <th scope="col" class="id">@sortablelink('id', 'ID')</th>
        <th scope="col" class="name">@sortablelink('name', 'ユーザー名 or 名前')</th>
        <th scope="col" class="gender">@sortablelink('gender', '性別')</th>
        <th scope="col" class="email">@sortablelink('email', 'メールアドレス')</th>
        <th scope="col" class="opinion">@sortablelink('opinion', '内容')</th>
        <th scope="col" class="review1">@sortablelink('review1', '機能充実度')</th>
        <th scope="col" class="review2">@sortablelink('review2', '期待度')</th>
        <th scope="col" class="review3">@sortablelink('review3', '好き度')</th>
        <th></th>
      </tr>
      @foreach ($forms as $form)
        <tr>
          <td>{{ $form->id }}</td>
          <td>{{ $form->name }}</td>
          <td>
            @if ($form->gender == '1')
              男性
            @elseif ($form->gender =='2')
              女性
            @endif
          </td>
          <td  class="form-email">{{ $form->email }}</td>
          <td class="form-opinion">{{ $form->opinion }}</td>
          <td>
            @if ($form->review1 == '0')
              未選択
            @elseif ($form->review1 =='1')
              星1
            @elseif ($form->review1 =='2')
              星2
            @elseif ($form->review1 =='3')
              星3
            @elseif ($form->review1 =='4')
              星4
            @elseif ($form->review1 =='5')
              星5
            @endif
          </td>
          <td>
            @if ($form->review2 == '0')
              未選択
            @elseif ($form->review2 =='1')
              星1
            @elseif ($form->review2 =='2')
              星2
            @elseif ($form->review2 =='3')
              星3
            @elseif ($form->review2 =='4')
              星4
            @elseif ($form->review2 =='5')
              星5
            @endif
          </td>
          <td>
            @if ($form->review3 == '0')
              未選択
            @elseif ($form->review3 =='1')
              星1
            @elseif ($form->review3 =='2')
              星2
            @elseif ($form->review3 =='3')
              星3
            @elseif ($form->review3 =='4')
              星4
            @elseif ($form->review3 =='5')
              星5
            @endif
          </td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
