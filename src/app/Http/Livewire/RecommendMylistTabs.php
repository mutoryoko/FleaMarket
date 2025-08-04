<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Support\Facades\Request;

class RecommendMylistTabs extends Component
{
    public $activeTab = 'recommend';

    public string $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        $this->activeTab = Auth::check() ? 'myList' : 'recommend';

        $tabParam = strtolower(Request::query('tab', ''));

        if ($tabParam === 'mylist') {
            $this->activeTab = 'myList';
        } else {
            $this->activeTab = 'recommend';
        }
    }

    public function render()
    {
        $query = Item::where('user_id', '!=', Auth::id());

        if ($this->search) {
            $query->where('item_name', 'like', '%' . $this->search . '%');
        }

        $items = $query->get(['id', 'item_name', 'item_image']);

        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        $likedItemIds = $user ? $user->likes()->pluck('item_id')->toArray() : [];
        $myListItems = $items->whereIn('id', $likedItemIds);

        $soldItemIds = Transaction::pluck('item_id')->toArray();

        return view('livewire.recommend-mylist-tabs', [
            'activeTab' => $this->activeTab,
            'items' => $items,
            'myListItems' => $myListItems,
            'soldItemIds' => $soldItemIds,
        ]);
    }
}