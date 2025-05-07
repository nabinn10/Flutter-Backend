<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Online Liquor Vault</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo1.png') }}" type="image/x-icon" />

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Scrip  ts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">
    <!-- Main Wrapper -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <nav id="sidebar"
            class="fixed inset-y-0 left-0 w-64 bg-gray-100 shadow-lg transform -translate-x-full transition-transform duration-300 lg:translate-x-0 z-50 overflow-y-auto max-h-screen">
            <div class="p-5 flex justify-center">
                <a href="">
                    <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="w-24 rounded-md bg-gray-300 p-2">
                </a>
            </div>
            <ul class="mt-2 space-y-2 text-xl">
                <li>
                    <a href=""
                        class="flex items-center px-4 py-2 rounded-md transition-colors text-gray-900 hover:bg-blue-600 hover:text-white">
                        <i class='bx bx-home-alt text-2xl text-gray-900'></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href=""
                        class="flex items-center px-4 py-2 rounded-md transition-colors text-gray-900 hover:bg-blue-600 hover:text-white">
                        <i class='bx bx-home-alt text-2xl text-gray-900'></i>
                        <span class="ml-3">Category</span>
                    </a>
                </li>
                <li>
                    <a href=""
                        class="flex items-center px-4 py-2 rounded-md transition-colors text-gray-900 hover:bg-blue-600 hover:text-white">
                        <i class='bx bx-home-alt text-2xl text-gray-900'></i>
                        <span class="ml-3">Posts</span>
                    </a>
                </li>
               

                <li>
                    <a href=""
                        class="flex items-center px-4 py-2 rounded-md transition-colors text-gray-900 hover:bg-blue-600 hover:text-white">
                        <i class='bx bx-home-alt text-2xl text-gray-900'></i>
                        <span class="ml-3">New Item</span>
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center px-4 py-2 text-gray-900 hover:bg-blue-600 hover:text-white rounded-md transition-colors">
                            <i class='bx bx-log-out text-2xl text-gray-900'></i>
                            <span class="ml-3">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-white shadow-sm relative lg:ml-64">
            <header class="mb-6 flex items-center">
                <button id="menu-toggle" class="lg:hidden bg-blue-900 text-white p-2 rounded-md">
                    <i class='bx bx-menu'></i>
                </button>
                <h1 class="ml-4 text-xl md:text-2xl lg:text-3xl font-bold text-red-900">The Blogs</h1>
            </header>

            <!-- Main Content Placeholder -->
            @yield('content')
        </div>
    </div>

    <!-- JavaScript for Sidebar Toggle -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');

        // Toggle sidebar visibility
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        // Close sidebar when clicking outside (for smaller devices)
        document.addEventListener('click', (event) => {
            const isClickInside = sidebar.contains(event.target) || menuToggle.contains(event.target);
            if (!isClickInside && window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>

</html>
