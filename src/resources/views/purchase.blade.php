@extends('layouts.default')

@section('title', '商品購入')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}" />
@endsection

@section('content')
    <div class="content">
        <div class="confirm">
            <div class="item-info">
                <div>
                    <img src="" alt="">
                </div>
                <h2>{{ $item->item_name }}</h2>
                <p><span class="yen">¥</span>{{ $item->price }}</p>
            </div>
            <div class="payment-method">
                <h3>支払い方法</h3>
                <select name="payment_method">
                    <option>選択してください</option>
                    <option value="1">コンビニ払い</option>
                    <option value="2">カード払い</option>
                </select>
            </div>
            <div class="shipping-info">
                <div class="shipping__head">
                    <h3>配送先</h3>
                    <a href="">変更する</a>
                </div>
                <p>{{ $profile->postcode }}</p>
                <p>{{ $profile->address }}</p>
                <p>{{ $profile->building ?? '' }}</p>
            </div>
        </div>
        <div class="payment">
            <form action="">
                <table class="payment-form">
                    <tr>
                        <th>商品代金</th>
                        <td><span class="yen">¥</span>{{ $item->price }}</td>
                    </tr>
                    <tr>
                        <th>支払い方法</th>
                        <td>コンビニ or カード</td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection