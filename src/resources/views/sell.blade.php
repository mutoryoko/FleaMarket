@extends('layouts.default')

@section('title', '商品出品')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}" />
@endsection

@section('content')
    <div class="content">
        <h2 class="title">商品の出品</h2>
        <form class="sell-form" action="" method="POST" enctype="multipart/form-data">
        @csrf
            <h4 class="form__label">商品画像</h4>
            <div class="item-image__wrapper">
                <label class="file-upload__btn">
                    画像を選択する
                    <input wire:model="image" type="file" name="item_image" style="display:none;" />
                </label>
                {{-- @if($fileName)
                    <span class="file__name">{{ $fileName }}</span>
                @endif --}}
            </div>

            <h3 class="small-ttl">商品の詳細</h3>
            <h4 class="form__label category__ttl">カテゴリー</h4>
            @foreach ($categories as $category)
                <label class="category__label">
                    <input type="checkbox">{{ $category->name }}</input>
                </label>
                <input type="hidden" value="{{ $category->id }}">
            @endforeach
            <h4 class="form__label condition__ttl">商品の状態</h4>
            @php
                $selectedCondition = old('condition', $item->condition ?? '');
            @endphp
            <select class="form__select" name="condition">
                <option>選択してください</option>
                @foreach(conditionOptions() as $value => $label)
                    <option value="{{ $value }}" {{ $selectedCondition == $value ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>

            <h3 class="small-ttl">商品名と説明</h3>
            <div class="form__item">
                <h4 class="form__label">商品名</h4>
                <input class="form__item--input" type="text" name="item_name" value="{{ old('item_name')}}">
            </div>
            <div class="form__item">
                <h4 class="form__label">ブランド名</h4>
                <input class="form__item--input" type="text" name="brand" value="{{ old('brand')}}">
            </div>
            <div class="form__item">
                <h4 class="form__label">商品の説明</h4>
                <textarea class="form__item--textarea" name="description" cols="30" rows="10">{{ old('description')}}</textarea>
            </div>
            <div class="form__item">
                <h4 class="form__label">販売価格</h4>
                <input class="form__item--input" type="text" name="price" value="{{ old('price')}}">
            </div>

            <button class="submit-btn" type="submit">出品する</button>
        </form>
    </div>
@endsection