<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index(string $id)
    {
        $item = Item::findOrFail($id);
        $user = Auth::user();
        $profile = $user->profile;

        return view('purchase', compact('item', 'user', 'profile'));
    }

    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        $user = Auth::user();
        $profile = $user->profile;

        return view('address', compact('item', 'user', 'profile'));
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
}
