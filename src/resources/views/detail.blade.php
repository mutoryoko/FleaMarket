@extends('layouts.default')

@section('title', '商品詳細')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="item-image__wrapper">
            <img src="{{'storage/'.$item->image }}" alt="商品画像">
        </div>
        <div class="item-info__wrapper">
            <h2 class="item-name">{{ $item->name }}</h2>
            <p class="item-brand">{{ $item->brand ?? '' }}</p>
            <p class="item-price"><span class="yen">¥</span>{{ number_format($item->price) }}</p>
            <div>
                <a href="">いいね</a>
                <a href="">コメント</a>
            </div>
            <div>
                @auth
                    <a href="">購入手続きへ</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}">購入手続きへ</a>
                @endguest
            </div>
            <div>
                <h3>商品説明</h3>
                <p>{{ $item->description }}</p>
            </div>
            <div>
                <h3>商品の情報</h3>
                <label for="">カテゴリー</label>
                <input type="radio">
                <label for="">商品の状態</label>
                <p>{{ $item->condition }}</p>
            </div>
            <div class="item-comments">
                <h3>コメント（数字）</h3>
                <img src="{{ asset('storage/'.$userImage) }}" alt="ユーザーのアイコン">
                <p>コメントした人の名前</p>
                <p>コメント表示</p>
            </div>
            <form class="comment-form" action="" method="POST">
                @csrf
                <label for="comment"><div>商品へのコメント</div></label>
                <textarea name="content" id="comment" cols="30" rows="10"></textarea>
                <button>コメントを送信する</button>
            </form>
        </div>
    </div>
@endsection