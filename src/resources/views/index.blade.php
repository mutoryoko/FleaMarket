@extends('layouts.default')

@section('title', 'Coachtechフリマ')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    {{-- <div>
        <livewire:product-tabs />
    </div> --}}
    <div class="content">
        <div class="item-tabs">
            <a href="">おすすめ</a>
            <a href="">マイリスト</a>
        </div>
        <div class="item-cards__wrapper">
            @if(!empty($items))
                @foreach ($items as $item)
                <div class="item-card">
                    <div class="item-image__wrapper">
                        <a href=""><img class="item-image" src="{{ asset('storage/'.$item->image) }}" alt="商品画像"></a>
                    </div>
                    <h2 class="item-name">{{ $item->name }}</h2>
                </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection