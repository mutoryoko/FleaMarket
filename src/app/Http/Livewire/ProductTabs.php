<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ProductTabs extends Component
{
    public $tab = 'recommended';

    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {
        return view('livewire.product-tabs', [
            'recommendedProducts' => Item::where('recommended', true)->get(),
            'favoriteProducts' => Auth::check() ? Auth::user()->favorites : collect(),
        ]);
    }
}
