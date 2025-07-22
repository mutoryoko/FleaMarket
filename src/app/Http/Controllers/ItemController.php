<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Profile;
use App\Models\Comment;
use App\Models\Category;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::get(['id', 'name', 'image']);

        return view('index', compact('items'));
    }

    public function myList()
    {
        //
    }

    public function detail(string $id)
    {
        $item = Item::find($id);
        $categories = $item->categories()->pluck('name')->toArray();

        return view('detail', compact('item', 'categories'));
    }

    public function sellForm()
    {
        return view('sell');
    }

    public function store()
    {
        //
    }
}
