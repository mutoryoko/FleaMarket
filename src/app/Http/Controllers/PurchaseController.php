<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Item;
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

    public function buyItem()
    {
        //
    }
}
