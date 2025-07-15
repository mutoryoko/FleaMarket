<div>
    <div class="tabs">
        <button wire:click="selectTab('recommended')" class="{{ $tab === 'recommended' ? 'active' : '' }}">
            おすすめ商品
        </button>
        <button wire:click="selectTab('favorites')" class="{{ $tab === 'favorites' ? 'active' : '' }}">
            お気に入り商品
        </button>
    </div>

    <div class="tab-content mt-4">
        @if ($tab === 'recommended')
            @forelse ($recommendedItems as $item)
                <div>{{ $item->name }}</div>
            @empty
                <div>おすすめ商品がありません。</div>
            @endforelse
        @elseif ($tab === 'favorites')
            @forelse ($favoriteItems as $item)
                <div>{{ $item->name }}</div>
            @empty
                <div>お気に入り商品がありません。</div>
            @endforelse
        @endif
    </div>

    <style>
        .tabs button {
            padding: 8px 16px;
            margin-right: 10px;
            border: none;
            background: #eee;
            cursor: pointer;
        }
        .tabs .active {
            background: #3490dc;
            color: white;
        }
    </style>
</div>

