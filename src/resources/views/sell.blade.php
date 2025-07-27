@extends('layouts.default')

@section('title', '商品出品')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}" />
@endsection

@section('content')
    <div class="content">
        <h2 class="title">商品の出品</h2>
        <form class="sell-form" action="{{ route('sell') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div>
                <h4 class="form__label">商品画像</h4>
                @livewire('item-image-preview')
                @error('item_image')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <h3 class="small-ttl">商品の詳細</h3>
            <div>
                <h4 class="form__label category__ttl">カテゴリー</h4>
                @foreach ($categories as $category)
                <label class="category__label">
                    <input class="category__check" name="categories[]" type="checkbox" value="{{ $category->id }}" {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : ''}} />
                    {{ $category->name }}
                </label>
                @endforeach
                @error('categories')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <h4 class="form__label condition__ttl">商品の状態</h4>
                @php
                $selectedCondition = old('condition', $item->condition ?? '');
                @endphp
                <select class="form__select" name="condition">
                    <option>選択してください</option>
                    @foreach(conditionOptions() as $value => $label)
                        <option value="{{ $value }}" {{ $selectedCondition == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('condition')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <h3 class="small-ttl">商品名と説明</h3>
            <div class="form__item">
                <h4 class="form__label">商品名</h4>
                <input class="form__item--input" type="text" name="item_name" value="{{ old('item_name')}}" />
                @error('item_name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__item">
                <h4 class="form__label">ブランド名</h4>
                <input class="form__item--input" type="text" name="brand" value="{{ old('brand')}}" />
            </div>
            <div class="form__item">
                <h4 class="form__label">商品の説明</h4>
                <textarea class="form__item--textarea" name="description" cols="30" rows="10">{{ old('description')}}</textarea>
                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__item">
                <h4 class="form__label">販売価格</h4>
                <input class="form__item--input" type="text" name="price" value="{{ old('price')}}" />
                @error('price')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button class="submit-btn" type="submit">出品する</button>
        </form>
    </div>
@endsection