@extends('layouts.default')

@section('title', 'Coachtechフリマ')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    <div class="content">
        <div class="item-list__tabs">
            <a class="recommend" href="">おすすめ</a>
            <a href="">マイリスト</a>
        </div>
        <div class="item-cards__wrapper">
            @forelse($items as $item)
                <div class="item-card">
                    <div class="item-image__wrapper">
                        <a href="{{ route('detail', ['item_id' => $item->id]) }}"><img class="item-image" src="{{ asset('storage/'.$item->item_image) }}" alt="商品画像" /></a>
                    </div>
                    <h2 class="item-name">{{ $item->item_name }}
                        @if(in_array($item->id, $soldItemIds))
                            <span class="sold">sold</span>
                        @endif
                    </h2>
                </div>
            @empty
                <p>商品がありません</p>
            @endforelse
        </div>
    </div>
@endsection