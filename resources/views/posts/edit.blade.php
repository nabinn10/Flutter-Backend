@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Post</h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Hidden user_id field --}}
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category_id" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                @if ($post->photo)
                    <img src="{{ asset('images/posts/' . $post->photo) }}" alt="Post Image" class="h-32 mb-2">
                @endif
                <input type="file" name="photo" id="photo" class="mt-1 border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                <textarea name="body" id="body" rows="5"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('body', $post->body) }}</textarea>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('posts.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md shadow-sm">Cancel</a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md shadow-sm">Update</button>
            </div>
        </form>
    </div>
@endsection
