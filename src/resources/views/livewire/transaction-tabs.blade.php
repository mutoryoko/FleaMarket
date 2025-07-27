<div>
    <div class="tabs">
        <button wire:click="selectTab('selling')" class="{{ $tab === 'selling' ? 'active' : '' }}">
            出品した商品
        </button>
        <button wire:click="selectTab('buying')" class="{{ $tab === 'buying' ? 'active' : '' }}">
            購入した商品
        </button>
    </div>

    <div class="tab-content mt-4">
        @if ($tab === 'selling')
            @forelse ($sellingItems as $sellingItem)
                <div class="item-card">
                    <div class="item-image__wrapper">
                        <a href="{{ route('detail', ['item_id' => $sellingItem->id]) }}"><img class="item-image" src="{{ asset('storage/'.$sellingItem->item_image) }}" alt="商品画像"></a>
                    </div>
                    <h2 class="item-name">{{ $sellingItem->item_name }}</h2>
                </div>
            @empty
                <div>出品した商品がありません。</div>
            @endforelse
        @elseif ($tab === 'buying')
            @forelse ($buyingItems as $buyingItem)
                <div class="item-card">
                    <div class="item-image__wrapper">
                        <a href="{{ route('detail', ['item_id' => $buyingItem->id]) }}"><img class="item-image" src="{{ asset('storage/'.$buyingItem->item_image) }}" alt="商品画像"></a>
                    </div>
                    <h2 class="item-name">{{ $buyingItem->item_name }}</h2>
                </div>
            @empty
                <div>購入した商品がありません。</div>
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

        .tabs button {
            border: none;
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
