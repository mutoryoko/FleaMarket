@extends('layouts.default')

@section('title', '商品購入')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}" />
@endsection

@section('content')
    <div class="content">
        <form class="payment-form" action="{{ route('checkout') }}" method="POST">
        @csrf
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
                    <select name="payment_method" class="payment__select" id="payment_method">
                        <option value="">選択してください</option>
                        <option value="1" {{ old('payment_method') == '1' ? 'selected' : '' }}>
                            コンビニ払い
                        </option>
                        <option value="2" {{ old('payment_method') == '2' ? 'selected' : '' }}>
                            カード払い
                        </option>
                    </select>
                    @error('payment_method')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="shipping-info">
                    <div class="shipping__head">
                        <h3 class="small-ttl">配送先</h3>
                        <a class="shipping__link" href="{{ route('address.edit', ['item_id' => $item->id]) }}">変更する</a>
                    </div>
                    <p class="postcode">〒{{ $profile->postcode }}</p>
                    <input name="shipping_postcode" type="hidden" value="{{ $profile->postcode }}">
                    <p class="address">{{ $profile->address }}</p>
                    <input name="shipping_address" type="hidden" value="{{ $profile->address }}">
                    <p class="building">{{ $profile->building ?? '' }}</p>
                    <input name="shipping_building" type="hidden" value="{{ $profile->building }}">
                    @if ($errors->hasAny(['shipping_postcode', 'shipping_address']))
                        <p class="error">{{ $message }}</p>
                    @endif
                </div>
            </div>
            <div class="payment__wrapper">
                <table class="payment-table">
                    <tr class="table-row">
                        <th class="table-th">商品代金</th>
                        <td class="table-td table__price"><span class="yen">¥</span>{{ number_format($item->price) }}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-th">支払い方法</th>
                        <td class="table-td" id="selected-payment-method">選択されていません</td>
                    </tr>
                </table>
                @if($isSold)
                    <button class="isSold" disabled>売り切れ</button>
                @else
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <button class="submit-btn" type="submit">購入する</button>
                @endif
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const paymentSelect = document.getElementById('payment_method');
            const paymentDisplay = document.getElementById('selected-payment-method');

            const methodNames = {
                '1': 'コンビニ払い',
                '2': 'カード払い'
            };

            const selected = paymentSelect.value;
            if (selected && methodNames[selected]) {
                paymentDisplay.textContent = methodNames[selected];
            }

            paymentSelect.addEventListener('change', function () {
                const selectedValue = this.value;
                paymentDisplay.textContent = methodNames[selectedValue] || '選択されていません';
            });
        });
    </script>
@endsection