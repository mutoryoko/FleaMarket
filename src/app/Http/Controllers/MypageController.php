<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class MypageController extends Controller
{
    public function index()
    {
        return view('mypage.profile');
    }

    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('mypage.edit', compact('user', 'profile'));
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $profile = $user->profile;
        $updateData = $request->validated();

        if($request->hasFile('user_image')) {
            if ($profile && $profile->user_image) {
                Storage::disk('public')->delete($profile->user_image);
            }
            $updateData['user_image'] = $request->file('user_image')->store('profile-images', 'public');
        }

        if ($profile) {
            $profile->update($updateData);
        } else {
            $updateData['user_id'] = $user->id;
            Profile::create($updateData);
        }

        return to_route('profile');
    }
}
