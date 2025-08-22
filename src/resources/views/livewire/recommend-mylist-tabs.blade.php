<div>
    <div class="tabs">
        <a href="{{ route('index', ['search' => $this->search ?: null]) }}" class="{{ $activeTab === 'recommend' ? 'active' : '' }} recommend-tab">
            おすすめ
        </a>
        <a href="{{ route('index',  ['tab' => 'mylist', 'search' => $this->search ?: null]) }}" class="{{ $activeTab === 'mylist' ? 'active' : '' }} myList-tab">
            マイリスト
        </a>
    </div>
    <div class="tab__content mt-4">
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
        @elseif ($activeTab === 'mylist')
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
                <p>商品がありません</p>
            @endforelse
        @endif
    </div>
</div>
