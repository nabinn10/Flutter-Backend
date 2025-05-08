<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagessController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function welcome()
    {
        $posts = \App\Models\Post::latest()->get();
        return view('welcome', compact('posts'));
    }
    // post view

    public function postview($id)
    {
        $post = Post::findOrFail($id);
        $isFavourited = false;

        if (Auth::check()) {
            $isFavourited = Favourite::where('user_id', Auth::id())
                ->where('post_id', $post->id)
                ->exists();
        }

        return view('postview', compact('post', 'isFavourited'));
    }

    public function favourite($postId)
    {
        $user = Auth::user();

        // Avoid duplicate favourites
        $alreadyFavourited = Favourite::where('user_id', $user->id)
            ->where('post_id', $postId)
            ->first();

        if (!$alreadyFavourited) {
            Favourite::create([
                'user_id' => $user->id,
                'post_id' => $postId,
            ]);
        } else {
            return redirect()->back()->with('info', 'Post is already in favourites.');
        }

        return redirect()->back()->with('success', 'Post added to favourites.');
    }


    public function toggleFavourite($postId)
    {
        $userId = Auth::id();

        $existing = Favourite::where('user_id', $userId)->where('post_id', $postId)->first();

        if ($existing) {
            $existing->delete(); // unfavourite
        } else {
            Favourite::create([
                'user_id' => $userId,
                'post_id' => $postId,
            ]);
        }

        return back();
    }
}
