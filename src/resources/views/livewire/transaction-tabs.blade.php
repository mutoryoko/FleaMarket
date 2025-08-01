<div>
    <div class="tabs">
        <a href="{{ route('mypage.sell') }}" class="{{ $tab === 'selling' ? 'active' : '' }} sell-tab">
            出品した商品
        </a>
        <a href="{{ route('mypage.buy') }}" class="{{ $tab === 'buying' ? 'active' : '' }} buy-tab">
            購入した商品
        </a>
    </div>

    <div class="tab-content mt-4">
        @if ($tab === 'selling')
            @forelse ($sellingItems as $sellingItem)
                <div class="item-card">
                    <div class="item-image__wrapper">
                        <a href="{{ route('detail', ['item_id' => $sellingItem->id]) }}">
                            <img class="item-image" src="{{ asset('storage/'.$sellingItem->item_image) }}" alt="商品画像">
                        </a>
                    </div>
                    <h2 class="item-name">{{ $sellingItem->item_name }}</h2>
                </div>
            @empty
                <p>出品した商品がありません。</p>
            @endforelse
        @elseif ($tab === 'buying')
            @forelse ($buyingItems as $buyingItem)
                <div class="item-card">
                    <div class="item-image__wrapper">
                        <a href="{{ route('detail', ['item_id' => $buyingItem->id]) }}">
                            <img class="item-image" src="{{ asset('storage/'.$buyingItem->item_image) }}" alt="商品画像">
                        </a>
                    </div>
                    <h2 class="item-name">{{ $buyingItem->item_name }}</h2>
                </div>
            @empty
                <p>購入した商品がありません。</p>
            @endforelse
        @endif
    </div>

    <style>
        .tabs {
            border-bottom: 1px solid #000;
            padding-left: 80px;
        }

        .tab-content {
            display: flex;
            flex-wrap: wrap;
            gap: 3%;
            padding: 50px;
            margin: 0 auto;
        }

        .sell-tab, .buy-tab {
            display: inline-block;
            color: #000;
            background: transparent;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 10px;
            margin-right: 30px;
            cursor: pointer;
        }

        .tabs .active {
            color: rgb(255, 85, 85);
        }
    </style>
</div>
