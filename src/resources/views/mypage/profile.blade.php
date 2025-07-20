@extends('layouts.default')

@section('title', 'プロフィール')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="profile">
        <div class="profile-image__wrapper">
            <img class="profile-image" src="{{ asset('storage/'.$profile->user_image) }}" alt="プロフィール画像">
        </div>
        <h2 class="user-name">{{ $user->name }}</h2>
        <div class="edit-btn">
            <a class="edit-btn--link" href="{{ route('edit') }}">プロフィールを編集</a>
        </div>
    </div>
    <div class="item-list__tabs">
        <a href="">出品した商品</a>
        <a href="">購入した商品</a>
    </div>
    <div class="item-cards__wrapper">
        @if(!empty($items))
            @foreach ($items as $item)
            <div class="item-card">
                <div class="item-image__wrapper">
                    <a href="{{ route('detail', ['item_id' => $item->id]) }}"><img class="item-image" src="{{ asset('storage/'.$item->image) }}" alt="商品画像"></a>
                </div>
                <h2 class="item-name">{{ $item->name }}</h2>
            </div>
            @endforeach
        @elseif(empty($items))
        <p>商品がありません</p>
        @endif
    </div>
</div>
@endsection