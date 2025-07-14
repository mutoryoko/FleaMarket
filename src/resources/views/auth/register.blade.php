@extends('layouts.default')

@section('title', '会員登録')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css')}}" />
@endsection

@section('content')
    <div class="content">
        <h2 class="title">会員登録</h2>
        <form class="user-form" action="{{ route('register') }}" method="POST">
        @csrf
            <div class="user-form__item">
                <label class="user-form__label"><div>ユーザー名</div></label>
                <input class="user-form__input" type="text" name="name" value="{{ old('name') }}" />
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="user-form__item">
                <label class="user-form__label"><div>メールアドレス</div></label>
                <input class="user-form__input" type="text" name="email" value="{{ old('email') }}" />
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="user-form__item">
                <label class="user-form__label"><div>パスワード</div></label>
                <input class="user-form__input" type="password" name="password" />
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="user-form__item">
                <label class="user-form__label"><div>確認用パスワード</div></label>
                <input class="user-form__input" type="password" name="password_confirmation" />
                @error('password_confirmation')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button class="submit-btn" type="submit">登録する</button>
            <div class="user-form__link">
                <a href="{{ route('loginForm') }}">ログインはこちら</a>
            </div>
        </form>
    </div>
@endsection