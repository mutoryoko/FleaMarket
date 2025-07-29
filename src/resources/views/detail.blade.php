@extends('layouts.default')

@section('title', '商品詳細')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('content')
    <div class="content">
        <div class="item-image__wrapper">
            <img class="item-image" src="{{ asset('storage/'.$item->item_image) }}" alt="商品画像" />
        </div>
        <div class="item-info__wrapper">
            <div class="item-info">
                <h2 class="item-name">{{ $item->item_name }}</h2>
                <p class="item-brand">{{ $item->brand ?? '' }}</p>
            </div>
            <div class="item-info">
                <p class="item-price"><span class="yen">¥</span>{{ number_format($item->price) }}<span class="tax">（税込）</span></p>
            </div>

            <div class="likes-comments__icons">
                {{-- いいね機能 --}}
                <div class="like-icon">
                    @if(Auth::check() && Auth::user()->likeItems($item->id))
                        <form class="like-form" action="{{ route('unlike', ['item_id' => $item->id] )}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="like-btn">
                                <img class="like-icon__img" src="{{ asset('storage/materials/star-icon-yellow.png') }}" alt="いいね済みのアイコン">
                            </button>
                        </form>
                    @else
                        <form class="like-form" action="{{ route('like', ['item_id' => $item->id] )}}" method="POST">
                            @csrf
                            <button type="submit" class="like-btn">
                                <img class="like-icon__img" src="{{ asset('storage/materials/star-icon.png') }}" alt="いいね前のアイコン">
                            </button>
                        </form>
                    @endif
                    <p class="count">{{ $item->likes()->count() }}</p>
                </div>

                <div class="comment-icon">
                    <img class="comment-icon__img" src="{{ asset('storage/materials/comment-icon.png') }}" alt="コメントのアイコン">
                    <p class="count">0</p>
                </div>
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
                    {{-- app/Helpers/helper.phpにテキストあり --}}
                    <p class="condition__text">{{ $item->condition_text }}</p>
                </div>
            </div>
            <div class="item-comments">
                <h3 class="comments-count ttl">コメント（数字）</h3>
                <img src="" alt="ユーザーのアイコン" />
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