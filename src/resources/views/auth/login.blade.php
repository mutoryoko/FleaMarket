@extends('layouts.default')

@section('title', 'ログイン')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
@endsection

@section('content')
    <div class="content">
        <h2>ログイン</h2>
        <form class="register-form" action="" method="POST">
        @csrf
            <label class="form-label"><div>メールアドレス</div></label>
            <input type="text" name="email" >
            <label class="form-label"><div>パスワード</div></label>
            <input type="password" name="password">

            <div class="login-form__btn">
                <button class="register-form__btn--submit" type="submit">登録する</button>
            </div>
            <div class="register__link">
                <a href="">会員登録はこちら</a>
            </div>
        </form>
    </div>
@endsection