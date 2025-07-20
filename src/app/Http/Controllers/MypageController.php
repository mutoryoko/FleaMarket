<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;


class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('mypage.profile', compact('user', 'profile'));
    }

    public function edit()
    {
        $user= Auth::user();
        $profile = $user->profile;

        return view('mypage.edit', compact('user', 'profile'));
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $profile = $user->profile;
        $data = $request->validated();

        if($request->has('user_image')) {
            if ($profile && $profile->user_image) {
                Storage::disk('public')->delete($profile->user_image);
            }
            $data['user_image'] = $request->file('user_image')->store('profile-images', 'public');
        }

        if ($profile) {
            $profile->update($data);
        } else {
            $data['user_id'] = $user->id;
            Profile::create($data);
        }

        return to_route('index');
    }
}
