<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $followCount = $user->posts->count();
        $followerCount = $user->profile->followers->count();
        $followingCount = $user->following->count();

        return view('profiles.index', compact('user', 'follows', 'followCount', 'followerCount', 'followingCount')); //put user -> view
    }

    public function edit(User $user)
    {
        // $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        // $this->authorize('update', $user->profile);
        
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $img = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $img->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
