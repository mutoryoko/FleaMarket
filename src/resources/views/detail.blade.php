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
            <div class="item-info">
                <h2 class="item-name">{{ $item->name }}</h2>
                <p class="item-brand">{{ $item->brand ?? '' }}</p>
            </div>
            <div class="item-info">
                <p class="item-price"><span class="yen">¥</span>{{ number_format($item->price) }}<span class="tax">（税込）</span></p>
            </div>
            <div class="item-info">
                <a href="">いいね</a>
                <a href="">コメント</a>
            </div>
            <div>
                <a class="purchase__btn" href="{{ route('purchase', ['item_id' => $item->id]) }}">購入手続きへ</a> 
            </div>
            <div class="item-info">
                <h3 class="ttl">商品説明</h3>
                <p class="description-content">{{ $item->description }}</p>
            </div>
            <div class="item-info">
                <h3 class="ttl">商品の情報</h3>
                <div class="category">
                    <h4 class="small-ttl">カテゴリー</h4>
                    @foreach ($categories as $category)
                        <p class="category__name">{{ $category }}</p>
                    @endforeach
                </div>
                <div class="condition">
                    <h4 class="small-ttl">商品の状態</h4>
                    <p class="condition__text">{{ $item->condition_text }}</p>
                </div>
            </div>
            <div class="item-comments">
                <h3 class="comments-count">コメント（数字）</h3>
                <img src="{{ asset('storage/'.$userImage) }}" alt="ユーザーのアイコン">
                <p>コメントした人の名前</p>
                <p>コメント表示</p>
            </div>
            <form class="comment-form" action="" method="POST">
                @csrf
                <label for="comment"><div class="comment__label">商品へのコメント</div></label>
                <textarea class="comment__text" name="content" id="comment" cols="30" rows="10"></textarea>
                <button class="comment__btn--submit" type="submit">コメントを送信する</button>
            </form>
        </div>
    </div>
@endsection