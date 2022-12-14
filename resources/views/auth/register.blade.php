@extends('layouts.app')

@section('main')
<link rel="stylesheet" href="css/register.css">
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
        <p class="title">会員登録</p>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="errors" :errors="$errors" />

        <div class="wrapper">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name">
                    <input type="text" name="name" class="name" :value="old('name')" placeholder="ユーザー名"  required autofocus >
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email">
                    <input type="email" name="email" class="email" :value="old('email')" placeholder="メールアドレス"  required />
                </div>

                <!-- Password -->
                <div>
                    <label for="password">
                    <input
                        class="password"
                        type="password"
                        name="password"
                        required autocomplete="new-password" 
                        placeholder="パスワード"  >
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation">
                    <input
                        class="confirm"
                        type="password"
                        name="password_confirmation" required
                        placeholder="確認用パスワード"  >
                </div>

                <button class="register">
                    {{ __('会員登録') }}
                </button>
            </form>
        </div>
        <p class="text">アカウントをお持ちの方はこちらから</p>
        <p class="login"><a href="{{ route('login') }}">
            {{ __('ログイン') }}</a>  
        </p>              
    </div>
@endsection
