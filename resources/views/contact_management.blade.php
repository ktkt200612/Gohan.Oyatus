@extends('layouts.app')
@section('main')
<link rel="stylesheet" href="{{ asset('css/contact_management.css') }}">
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

<h1>お問い合わせ管理システム</h1>
  <form action="{{ route('contact.search') }}" method="post" class="form-content">
    @csrf
    <div>
      <label for="name">お名前</label>
      <input type="text" name="name" id="name" />
      <span >性別</span>
      <input type="radio" name="gender" value="0" id="all" checked /><label for="all">全て</label>
      <input type="radio" name="gender" value="1" id="male" /><label for="male">男性</label>
      <input type="radio" name="gender" value="2" id="female" />女性
    </div>
    <div>
      <label for="created_from">登録日</label>
      <input type="date" name="created_from" id="created_from" />
      <span> 〜 </span>
      <input type="date" name="created_to" id="created_to" />
    </div>
    <div>
      <label for="email">メールアドレス</label>
      <input type="text" name="email" id="email" />
    </div>
    <div>
      <button type="submit" name="action" value="post">検索</button><br>
      <button type="submit" formaction={{ route('contact.management') }} name="action" value="back">リセット</button>
    </div>
  </form>
  <div class="table-page">
    <div>
      @if (count($forms) > 0)
        <p>全{{ $forms->total() }}件中
          {{ ($forms->currentPage() - 1) * $forms->perPage() + 1 }}〜
          {{ ($forms->currentPage() - 1) * $forms->perPage() + 1 + (count($forms) - 1) }}件</p>
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
        <th scope="col">@sortablelink('id', 'ID')</th>
        <th scope="col">@sortablelink('name', 'お名前')</th>
        <th scope="col">@sortablelink('gender', '性別')</th>
        <th scope="col">@sortablelink('email', 'メールアドレス')</th>
        <th scope="col">@sortablelink('opinion', '内容')</th>
        <th scope="col">@sortablelink('review1', '機能充実度')</th>
        <th scope="col">@sortablelink('review2', '期待度')</th>
        <th scope="col">@sortablelink('review3', '好き度')</th>
        <th></th>
      </tr>
      @foreach ($forms as $form)
        <tr>
          <td scope="row"><input type="hidden" name="id" value="{{ $form->id }}">{{ $form->id }}</td>
          <td>{{ $form->name }}</td>
          <td>
            @if ($form->gender == '1')
              男性
            @elseif ($form->gender =='2')
              女性
            @endif
          </td>
          <td>{{ $form->email }}</td>
          <td class="opinion">{{ $form->opinion }}</td>
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
