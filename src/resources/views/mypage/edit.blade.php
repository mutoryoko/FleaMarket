@extends('layouts.default')

@section('title', 'プロフィール設定')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit.css')}}">
@endsection

@section('content')
    <div class="content">
        <h2 class="title">プロフィール設定</h2>
        <form class="user-form" action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="user-form__item">
                <img src="" alt="">
                <input class="form__input" type="file" name="user_image">
                @error('user_image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="user-form__item">
                <label for="user_name" class="user-form__label"><div>ユーザー名</div></label>
                <input id="user_name" class="user-form__input" type="text" name="name">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="user-form__item">
                <label for="postcode" class="user-form__label"><div>郵便番号</div></label>
                <input id="postcode" class="user-form__input" type="text" name="postcode">
                @error('postcode')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="user-form__item">
                <label for="address" class="user-form__label"><div>住所</div></label>
                <input id="address" class="user-form__input" type="text" name="address">
                @error('address')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="user-form__item">
                <label for="building" class="user-form__label"><div>建物名</div></label>
                <input id="building" class="user-form__input" type="text" name="building">
            </div>

            <button class="submit-btn" type="submit">更新する</button>
        </form>
    </div>
@endsection