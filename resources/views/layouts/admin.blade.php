<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Portfolio Admin') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="flex">
            <div class="w-64 min-h-screen bg-gray-800 text-white">
                <div class="px-4 py-6">
                    <h2 class="text-2xl font-bold">Portfolio Admin</h2>
                </div>
                <nav class="mt-6">
                    <div class="px-4">
                        <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-500' : 'hover:bg-gray-700' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('admin.profile.index') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.profile.*') ? 'bg-blue-500' : 'hover:bg-gray-700' }}">
                            Profile
                        </a>
                        <a href="{{ route('admin.projects.index') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.projects.*') ? 'bg-blue-500' : 'hover:bg-gray-700' }}">
                            Projects
                        </a>
                        <a href="{{ route('admin.skills.index') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.skills.*') ? 'bg-blue-500' : 'hover:bg-gray-700' }}">
                            Skills
                        </a>
                        <a href="{{ route('admin.certificates.index') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.experiences.*') ? 'bg-blue-500' : 'hover:bg-gray-700' }}">
                            Certificates
                        </a>
                        <a href="{{ route('admin.education.index') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.education.*') ? 'bg-blue-500' : 'hover:bg-gray-700' }}">
                            Education
                        </a>
                        <a href="{{ route('admin.testimonials.index') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.testimonials.*') ? 'bg-blue-500' : 'hover:bg-gray-700' }}">
                            Testimonials
                        </a>
                    </div>
                </nav>
                <div class="px-4 py-6 mt-auto">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full py-2 px-4 rounded bg-red-500 hover:bg-red-600 transition duration-200">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>

            <!-- Content -->
            <div class="flex-1">
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-2xl font-bold text-gray-900">
                            @yield('header')
                        </h1>
                    </div>
                </header>
                <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
