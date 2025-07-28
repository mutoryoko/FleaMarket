<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;



class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['store', 'destroy']);
    }

    public function store(Item $item)
    {
        //
    }
}
