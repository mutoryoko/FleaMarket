<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class PurchaseController extends Controller
{
    public function index()
    {
        $item = Item::all();

        return view('purchase', compact('item'));
    }
}
