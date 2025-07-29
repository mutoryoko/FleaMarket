<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;


class LikeController extends Controller
{
    /**
     * 商品にいいねを付ける
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($item_id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $alreadyLiked = $user->likeItems($item_id);

        if (!$alreadyLiked) {
            $user->likes()->attach($item_id);
        }

        return redirect()->back();
    }
    /**
     * 商品のいいね解除
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($item_id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->likeItems($item_id)) {
            $user->likes()->detach($item_id);
        }

        return redirect()->back();
    }
}
