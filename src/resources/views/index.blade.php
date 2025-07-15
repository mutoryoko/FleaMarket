@extends('layouts.default')

@section('title', 'Coachtechフリマ')

@section('css')
    <link rel="stylesheet" href="{{ asset('index.css')}}">
@endsection

@section('content')
    {{-- <div>
        <livewire:product-tabs />
    </div> --}}
    <div class="content">
        <div>
            <a href="">おすすめ</a>
            <a href="">マイリスト</a>
        </div>
        <div>
            @if(!empty($items))
                @foreach ($items as $item)
                <div class="item_card">
                    <div>
                        <a href=""><img src="{{ asset('storage/'.$item->image) }}" alt="商品画像"></a>
                    </div>
                    <h2>{{ $item->name }}</h2>
                </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection