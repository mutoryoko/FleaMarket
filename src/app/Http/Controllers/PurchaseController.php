<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Profile;
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

    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('address', compact('user', 'profile'));
    }
}
