@extends('layouts.master')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-8">
        <img src="{{ asset('images/posts/' . $post->photo) }}" alt="Post Image" class="w-full h-64 object-cover">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $post->title }}</h2>
            <p class="text-gray-600 mb-4">{{ $post->content }}</p>
            <p class="text-gray-500 text-sm">Published on: {{ $post->created_at->format('F j, Y') }}</p>
        </div>

        {{-- Favourite toggle --}}
        <div class="flex justify-end p-4">
            <form action="{{ route('posts.favourite', $post->id) }}" method="POST">
                @csrf
                <button type="submit" class="focus:outline-none">
                    <i
                        class="{{ $isFavourited ? 'fas text-red-500' : 'far text-gray-500 hover:text-red-500' }} fa-heart text-2xl transition duration-300"></i>
                </button>
            </form>
        </div>
    </div>


    {{-- Toggle icon JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const heartIcon = document.getElementById('heart-icon');
            const form = document.getElementById('favourite-form');

            form.addEventListener('submit', function(e) {
                // Optionally show filled heart immediately (optimistic UI)
                heartIcon.classList.remove('far'); // outline
                heartIcon.classList.add('fas', 'text-red-500'); // solid + red
            });
        });
    </script>
@endsection
