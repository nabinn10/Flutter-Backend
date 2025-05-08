<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $post = \App\Models\Post::findOrFail($id);
        return view('postview', compact('post'));
    }
    
}
