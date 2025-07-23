<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExhibitionRequest;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Profile;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::get(['id', 'item_name', 'item_image']);

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
        $categories = Category::get(['id', 'name']);

        return view('sell', compact('categories'));
    }

    public function store(ExhibitionRequest $request)
    {
        $user = Auth::user();
        $form = $request->validated();
        $form['user_id'] = $user->id;
        $form['item_image'] = $request->file('item_image')->store('item-images', 'public');

        Item::create($form);

        return to_route('profile');
    }
}
