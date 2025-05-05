<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar-link.active {
            background-color: #4a5568; /* Darker shade for active link */
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @if(trim($__env->yieldContent('sidebar')))
            <aside class="bg-gray-800 text-white w-64 flex-shrink-0">
                @yield('sidebar')
            </aside>
        @endif

        <!-- Main Content -->
        <main class="flex-1 overflow-x-auto">
            <div class="p-4">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
