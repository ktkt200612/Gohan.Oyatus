@extends('layouts.app')

@section('main')
<link rel="stylesheet" href="css/login.css">
<header>
    <a href="/home"><h1 class = "header__title">Gohan.<br>Oyatsu</h1></a>
    <nav class="header_nav">
        <ul>
            <li class="header__nav--list"><a href="/home">ホーム</a></li>
            <li class="header__nav--list"><a href="/index">店舗検索</a></li>
            <li class="header__nav--list"><a href="/point">ユーザーランキング</a></li>
            <li class="header__nav--list"><a href="/contact">お問い合わせ・アンケート</a></li>
        </ul>
    </nav>
</header>

    <div class="container">
        <p class="title">ログイン</p>

        <!-- Session Status -->
        <x-auth-session-status class="errors" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="errors" :errors="$errors" />

        <div class="wrapper">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input class="email" type="email" name="email" :value="old('email')" placeholder="メールアドレス" required autofocus />
                </div>

                <!-- Password -->
                <div>
                    <x-input class="password"
                        type="password"
                        name="password"
                        required autocomplete="current-password" 
                        placeholder="パスワード"/>
                </div>

                <!-- Login -->
                <div>                
                    <x-button class="login">
                        {{ __('ログイン') }}
                    </x-button>
            </form>
        </div>
        <p class="text">アカウントをお持ちでない方はこちらから</p>
        <p class="register"><a href="/register">会員登録</a></p>
        </div>
    </div>
@endsection
