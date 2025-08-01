<div>
    <div class="tabs">
        <a href="{{ route('index') }}" class="{{ $activeTab === 'recommend' ? 'active' : '' }} recommend-tab">
            おすすめ
        </a>
        <a href="{{ route('myList') }}" class="{{ $activeTab === 'myList' ? 'active' : '' }} myList-tab">
            マイリスト
        </a>
    </div>
    <div class="tab-content mt-4">
        @if ($activeTab === 'recommend')
            @forelse($items as $item)
                <div class="item-card">
                    <div class="item-image__wrapper">
                        <a href="{{ route('detail', ['item_id' => $item->id]) }}">
                            <img class="item-image" src="{{ asset('storage/'.$item->item_image) }}" alt="商品画像" />
                        </a>
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
        @elseif ($activeTab === 'myList')
            @forelse($myListItems as $item)
                <div class="item-card">
                    <div class="item-image__wrapper">
                        <a href="{{ route('detail', ['item_id' => $item->id]) }}">
                            <img class="item-image" src="{{ asset('storage/'.$item->item_image) }}" alt="商品画像" />
                        </a>
                    </div>
                    <h2 class="item-name">{{ $item->item_name }}
                        @if(in_array($item->id, $soldItemIds))
                            <span class="sold">sold</span>
                        @endif
                    </h2>
                </div>
            @empty
                <p>マイリストに商品がありません</p>
            @endforelse
        @endif
    </div>
    <style>
        .tabs {
            border-bottom: 1px solid #000;
            padding-top: 40px;
            padding-left: 100px;
        }

        .tab-content {
            display: flex;
            flex-wrap: wrap;
            gap: 3%;
            padding: 50px;
            margin: 0 auto;
        }

        .recommend-tab, .myList-tab {
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
