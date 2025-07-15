<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::only(['item_name', 'item_image']);

        return view('index', compact('item'));
    }
}
