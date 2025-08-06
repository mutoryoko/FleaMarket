@extends('layouts.default')

@section('title', 'プロフィール')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="profile__wrapper">
        <div class="user-info">
            <div class="user-image__wrapper">
                <img class="user-img" src="{{ asset('storage/'.$profile->user_image) }}" alt="プロフィール画像">
            </div>
            <h2 class="user-name">{{ $user->name }}</h2>
        </div>
        <div class="edit-btn">
            <a class="edit-btn--link" href="{{ route('profile.edit') }}">プロフィールを編集</a>
        </div>
    </div>

    <livewire:transaction-tabs />
</div>
@endsection