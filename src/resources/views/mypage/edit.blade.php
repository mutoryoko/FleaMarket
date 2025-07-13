@extends('layouts.default')

@section('title', 'プロフィール設定')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css')}}">
@endsection

@section('content')
    <div class="content">
        <h2>プロフィール設定</h2>
        <form class="profile-form" action="" method="POST" enctype="multipart/form-data">
        @csrf
            <label class="form-label">
                <img src="" alt="">
                <input type="file" name="user_image">
            </label>
            <label class="form-label">
                <div>ユーザー名</div>
                <input type="text" name="">
            </label>
            <label class="form-label">
                <div>郵便番号</div>
                <input type="text" name="postcode">
            </label>
            <label class="form-label">
                <div>住所</div>
                <input type="text" name="address">
            </label>
            <label class="form-label">
                <div>建物名</div>
                <input type="text" name="building">
            </label>

            <div class="register-form__btn">
                <button class="register-form__btn--submit" type="submit">更新する</button>
            </div>
        </form>
    </div>
@endsection