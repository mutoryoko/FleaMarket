<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\PurchaseRequest;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    private function getItemAndProfile($id)
    {
        $item = Item::findOrFail($id);
        $user = Auth::user();
        $profile = $user->profile;

        return compact('item', 'user', 'profile');
    }

    public function index(string $id)
    {
        $data = $this->getItemAndProfile($id);

        return view('purchase', $data);
    }

    public function edit(string $id)
    {
        $data = $this->getItemAndProfile($id);

        return view('address', $data);
    }

    public function update(AddressRequest $request, string $id)
    {
        $item = Item::findOrFail($id);
        $user = Auth::user();
        $profile = $user->profile;

        $updateData = $request->validated();

        $profile->update($updateData);

        return to_route('purchase', ['item_id' => $item->id]);
    }

    public function buyItem(PurchaseRequest $request, string $id)
    {
        $item = Item::findOrFail($id);
        $buyer = Auth::user();

        Transaction::create([
            'item_id' => $item->id,
            'buyer_id' => $buyer->id,
            'payment_method' => $request->payment_method,
            'shipping_postcode' => $request->shipping_postcode,
            'shipping_address' => $request->shipping_address,
            'shipping_building' => $request->shipping_building,
        ]);

        return to_route('index');
    }
}
