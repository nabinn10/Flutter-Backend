@extends('layouts.app')

@section('content')
@section('title')
    Categories
@endsection
<h1 class="text-4xl font-bold text-blue-900 mb-5">
    Categories
</h1>
<hr class="h-1 bg-red-500 mb-6">
<div class="flex justify-end mb-4">
    <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
        Create Category
    </a>
</div>
{{-- show the categories in table format --}}
<table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
    <thead>
        <tr class="bg-gray-100 text-gray-700">
            <th class="px-4 py-2 border-b">ID</th>
            <th class="px-4 py-2 border-b">Name</th>
          
            <th class="px-4 py-2 border-b">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 border-b">{{ $category->id }}</td>
            <td class="px-4 py-2 border-b">{{ $category->category_name }}</td>
           
            <td class="px-4 py-2 border-b">
                <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a> |
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

    
@endsection