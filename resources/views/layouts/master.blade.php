<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog Landing</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800">

    {{-- Header --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">My Blog</h1>
            <nav class="space-x-6">
                <a href="#" class="text-gray-700 hover:text-blue-500 font-medium transition">Home</a>
                <a href="#" class="text-gray-700 hover:text-blue-500 font-medium transition">Posts</a>
                <a href="#" class="text-gray-700 hover:text-blue-500 font-medium transition">Contact</a>
            </nav>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="max-w-6xl mx-auto px-4 py-12">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-sm">&copy; {{ date('Y') }} <span class="font-semibold">My Blog</span>. All rights reserved.</p>
            <div class="mt-2 space-x-4">
                <a href="#" class="text-gray-400 hover:text-white transition">Privacy</a>
                <a href="#" class="text-gray-400 hover:text-white transition">Terms</a>
                <a href="#" class="text-gray-400 hover:text-white transition">Contact</a>
            </div>
        </div>
    </footer>

</body>
</html>
