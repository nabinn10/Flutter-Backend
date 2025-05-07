@extends('layouts.app')


@section('content')
@section('title')
    Categories
@endsection
<h1 class="text-4xl font-bold text-blue-900 mb-5">
    Create Categories
</h1>
<hr class="h-1 bg-red-500 mb-6">

{{-- form to create category --}}
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Create Category</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-4 w-full">
            <label for="category_name" class="block text-gray-700 font-bold mb-2">Category Name:</label>
            <input type="text" name="category_name" id="category_name" class="border border-gray-300 rounded-md w-full px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create</button>
    </form>
</div>

@endsection
