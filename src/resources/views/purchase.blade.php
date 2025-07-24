@extends('layouts.default')

@section('title', '商品購入')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}" />
@endsection

@section('content')
    <div class="content">
        <div class="confirmation__wrapper">
            <div class="item-info">
                <div class="item-image__wrapper">
                    <img class="item-image" src="{{ asset('storage/'.$item->item_image) }}" alt="商品画像" />
                </div>
                <div>
                    <h2 class="item-name">{{ $item->item_name }}</h2>
                    <p class="item-price"><span class="yen">¥</span>{{ number_format($item->price) }}</p>
                </div>
            </div>
            <div class="payment-method">
                <h3 class="small-ttl">支払い方法</h3>
                <select name="payment_method" class="payment__select">
                    <option>選択してください</option>
                    <option value="1">コンビニ払い</option>
                    <option value="2">カード払い</option>
                </select>
            </div>
            <div class="shipping-info">
                <div class="shipping__head">
                    <h3 class="small-ttl">配送先</h3>
                    <a class="shipping__link" href="{{ route('address', ['item_id' => $item->id]) }}">変更する</a>
                </div>
                <p class="postcode">〒{{ $profile->postcode }}</p>
                <p class="address">{{ $profile->address }}</p>
                <p class="building">{{ $profile->building ?? '' }}</p>
            </div>
        </div>
        <div class="payment__wrapper">
            <form class="payment-form" action="">
                <table class="payment-table">
                    <tr class="table-row">
                        <th class="table-th">商品代金</th>
                        <td class="table-td table__price"><span class="yen">¥</span>{{ number_format($item->price) }}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-th">支払い方法</th>
                        <td class="table-td">コンビニ or カード</td>
                    </tr>
                </table>
                <button class="submit-btn" type="submit">購入する</button>
            </form>
        </div>
    </div>
@endsection