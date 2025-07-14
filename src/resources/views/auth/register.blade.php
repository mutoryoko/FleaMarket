@extends('layouts.default')

@section('title', '会員登録')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css')}}" />
@endsection

@section('content')
    <div class="content">
        <h2 class="title">会員登録</h2>
        <form class="register-form" action="" method="POST">
        @csrf
            <div class="form-item">
                <label class="form-label"><div>ユーザー名</div></label>
                <input class="form-item__input" type="text" name="name" value="{{ old('name') }}" />
            </div>
            <div class="form-item">
                <label class="form-label"><div>メールアドレス</div></label>
                <input class="form-item__input" type="text" name="email" value="{{ old('email') }}" />
            </div>
            <div class="form-item">
                <label class="form-label"><div>パスワード</div></label>
                <input class="form-item__input" type="password" name="password" />
            </div>
            <div class="form-item">
                <label class="form-label"><div>確認用パスワード</div></label>
                <input class="form-item__input" type="password" name="password_confirmation" />
            </div>

            <div class="register-form__btn">
                <button class="register-form__btn--submit" type="submit">登録する</button>
            </div>
            <div class="login__link">
                <a href="">ログインはこちら</a>
            </div>
        </form>
    </div>
@endsection