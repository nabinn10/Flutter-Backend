@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">All Posts</h1>

        {{-- Success message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Create post button --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('posts.create') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow-md transition">
                + Create New Post
            </a>
        </div>

        {{-- Posts table --}}
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-gray-100 text-gray-600 uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3 border">ID</th>
                        <th class="px-4 py-3 border">User</th>
                        <th class="px-4 py-3 border">Category</th>
                        <th class="px-4 py-3 border">Title</th>
                        <th class="px-4 py-3 border">Photo</th>
                        <th class="px-4 py-3 border">Body</th>
                        <th class="px-4 py-3 border text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border">{{ $post->id }}</td>
                            <td class="px-4 py-3 border">{{ $post->user->f_name ?? 'N/A' }}</td>
                            <td class="px-4 py-3 border">{{ $post->category->category_name ?? 'N/A' }}</td>
                            <td class="px-4 py-3 border">{{ $post->title }}</td>
                            <td class="px-4 py-3 border">
                               
                                    <img src="{{ asset('images/posts/' .$post->photo) }}" class="h-12 w-12 object-cover rounded" alt="Post Photo">
                              
                            </td>
                            <td class="px-4 py-3 border">{{ \Illuminate\Support\Str::limit($post->body, 50) }}</td>
                            <td class="px-4 py-3 border text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="text-indigo-600 hover:underline">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-center text-gray-500">
                                No posts available.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
