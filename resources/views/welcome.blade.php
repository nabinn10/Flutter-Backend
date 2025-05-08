@extends('layouts.master')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Latest Posts</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">

                    {{-- Show image if exists --}}
                    @if($post->photo)
                        <img src="{{ asset('images/posts/' . $post->photo) }}" alt="Post Image" class="w-full h-48 object-cover rounded-t-lg">
                    @endif

                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                        <p class="text-sm text-gray-600 mb-1">
                            Category: <span class="font-medium">{{ $post->category->category_name ?? 'Uncategorized' }}</span>
                        </p>
                        <p class="text-gray-700 text-sm mb-4">
                            {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 100) }}
                        </p>
                        <a href="{{ route('postview', $post->id) }}"
                           class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Read More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
