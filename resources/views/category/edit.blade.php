@extends('layouts.app')
@section('content')
@section('title')

@endsection
<h1 class="text-4xl font-bold text-blue-900 mb-5">
    Edit Category
</h1>
<hr class="h-1 bg-red-500 mb-6">

{{-- form to edit category --}}
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="category_name" class="block text-gray-700">Category Name</label>
        <input type="text" name="category_name" id="category_name" value="{{ $category->category_name }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update Category</button>
</form>


@endsection