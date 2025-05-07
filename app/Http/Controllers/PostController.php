<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('photo');
        $data['user_id'] = auth()->id(); // enforce auth user

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required|string',
        ]);

        $request->merge(['user_id' => auth()->id()]);
        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Delete old image
            $oldPath = public_path('images/posts/' . $post->photo);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $photo = $request->file('photo');
            $photoname = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/posts/'), $photoname);
            $data['photo'] = $photoname;
        } else {
            unset($data['photo']);
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        // Delete image
        $photoPath = public_path('images/posts/' . $post->photo);
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
