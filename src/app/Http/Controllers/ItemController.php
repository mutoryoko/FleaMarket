<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::get(['id', 'name', 'image']);

        return view('index', compact('items'));
    }

    public function detail()
    {
        return view('detail');
    }
}
