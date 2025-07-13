@extends('layouts.default')

@section('title', '会員登録')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css')}}" />
@endsection

@section('content')
    <div class="content">
        <h2>会員登録</h2>
        <form class="register-form" action="" method="POST">
        @csrf
            <label class="form-label"><div>ユーザー名</div></label>
            <input type="text" name="name" value="{{ old('name') }}" />
            <label class="form-label"><div>メールアドレス</div></label>
            <input type="text" name="email" value="{{ old('email') }}" />
            <label class="form-label"><div>パスワード</div></label>
            <input type="password" name="password" />
            <label class="form-label"><div>確認用パスワード</div></label>
            <input type="password" name="password_confirmation" />

            <div class="register-form__btn">
                <button class="register-form__btn--submit" type="submit">登録する</button>
            </div>
            <div class="login__link">
                <a href="">ログインはこちら</a>
            </div>
        </form>
    </div>
@endsection