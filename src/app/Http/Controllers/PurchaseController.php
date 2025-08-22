<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
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

        $isSold = Transaction::where('item_id', $id)->exists();

        return view('purchase', array_merge($data, compact('isSold')));
    }

    public function edit(string $id)
    {
        $data = $this->getItemAndProfile($id);

        return view('address', $data);
    }

    //配送先変更処理
    public function update(AddressRequest $request, string $id)
    {
        $item = Item::findOrFail($id);
        $user = Auth::user();

        $updateData = $request->validated();
        /** @var \App\Models\User $user */
        $user->profile()->updateOrCreate([], $updateData);

        return to_route('purchase', ['item_id' => $item->id]);
    }
}
