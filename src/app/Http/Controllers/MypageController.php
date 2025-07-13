<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function profile()
    {
        //
    }

    public function edit()
    {
        return view('mypage.edit');
    }
}
