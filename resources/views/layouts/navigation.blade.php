<nav class="bg-white">
    <!-- Top thin maroon strip -->
    <div class="bg-[#8b1b10] text-yellow-200 text-xs uppercase text-center py-1">
        SELAMAT DATANG DI WEBSITE RESMI
    </div>

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Left: Logo -->
            <div class="flex items-center gap-6">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <x-application-logo class="h-10 w-auto" />
                    <span
                        class="hidden md:inline-block font-bold text-lg text-[#8b1b10]">{{ config('app.name', 'Portfolio') }}</span>
                </a>
            </div>

            <!-- Center: Navigation Links (desktop) -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-[#8b1b10] transition">Home</a>

                <div class="relative group">
                    <button class="flex items-center gap-2 text-gray-700 hover:text-[#8b1b10] transition">Profil
                        <svg class="h-4 w-4 text-gray-500 group-hover:text-[#8b1b10]" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4z" />
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-3 w-48 bg-white border rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none group-hover:pointer-events-auto z-50">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Visi & Misi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Struktur</a>
                    </div>
                </div>

                <a href="#" class="text-gray-700 hover:text-[#8b1b10] transition">Berita Berdampak</a>

                <div class="relative group">
                    <button class="flex items-center gap-2 text-gray-700 hover:text-[#8b1b10] transition">Kemahasiswaan
                        <svg class="h-4 w-4 text-gray-500 group-hover:text-[#8b1b10]" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4z" />
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-3 w-48 bg-white border rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none group-hover:pointer-events-auto z-50">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Kegiatan</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Prestasi</a>
                    </div>
                </div>

                <div class="relative group">
                    <button class="flex items-center gap-2 text-gray-700 hover:text-[#8b1b10] transition">Akademik
                        <svg class="h-4 w-4 text-gray-500 group-hover:text-[#8b1b10]" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4z" />
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-3 w-48 bg-white border rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none group-hover:pointer-events-auto z-50">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Program Studi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Kalender</a>
                    </div>
                </div>

                <a href="#" class="text-gray-700 hover:text-[#8b1b10] transition">Riset</a>
                <a href="#" class="text-gray-700 hover:text-[#8b1b10] transition">PPID</a>

                <div class="relative group">
                    <button class="flex items-center gap-2 text-gray-700 hover:text-[#8b1b10] transition">Dokumen
                        <svg class="h-4 w-4 text-gray-500 group-hover:text-[#8b1b10]" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4z" />
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-3 w-48 bg-white border rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none group-hover:pointer-events-auto z-50">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Form</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Panduan</a>
                    </div>
                </div>
            </div>

            <!-- Right: Icons -->
            <div class="flex items-center gap-4">
                <button id="nav-search-btn" class="text-gray-600 hover:text-[#8b1b10] transition hidden lg:inline-flex">
                    <i class="fas fa-search"></i>
                </button>
                <button id="nav-theme-toggle" class="text-gray-600 hover:text-[#8b1b10] transition">
                    <i class="fas fa-moon"></i>
                </button>

                <!-- Mobile Hamburger -->
                <div class="md:hidden">
                    <button id="nav-toggle"
                        class="p-2 rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-800 transition">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu (hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100">
        <div class="px-4 pt-4 pb-6 space-y-3">
            <a href="{{ route('home') }}" class="block text-gray-700 py-2">Home</a>

            <div class="border-t border-gray-100 pt-3">
                <button data-toggle="submenu" data-target="#submenu-profil"
                    class="w-full flex items-center justify-between py-2 text-gray-700">
                    Profil
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4z" />
                    </svg>
                </button>
                <div id="submenu-profil" class="hidden pl-4">
                    <a href="#" class="block py-2 text-gray-600">Visi & Misi</a>
                    <a href="#" class="block py-2 text-gray-600">Struktur</a>
                </div>
            </div>

            <a href="#" class="block text-gray-700 py-2">Berita Berdampak</a>

            <div class="border-t border-gray-100 pt-3">
                <button data-toggle="submenu" data-target="#submenu-kemahasiswaan"
                    class="w-full flex items-center justify-between py-2 text-gray-700">Kemahasiswaan
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4z" />
                    </svg>
                </button>
                <div id="submenu-kemahasiswaan" class="hidden pl-4">
                    <a href="#" class="block py-2 text-gray-600">Kegiatan</a>
                    <a href="#" class="block py-2 text-gray-600">Prestasi</a>
                </div>
            </div>

            <a href="#" class="block text-gray-700 py-2">Riset</a>
            <a href="#" class="block text-gray-700 py-2">PPID</a>

            <div class="border-t border-gray-100 pt-3">
                <button data-toggle="submenu" data-target="#submenu-dokumen"
                    class="w-full flex items-center justify-between py-2 text-gray-700">Dokumen
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4z" />
                    </svg>
                </button>
                <div id="submenu-dokumen" class="hidden pl-4">
                    <a href="#" class="block py-2 text-gray-600">Form</a>
                    <a href="#" class="block py-2 text-gray-600">Panduan</a>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-100">
                @auth
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    <form method="POST" action="{{ route('logout') }}" class="mt-3">
                        @csrf
                        <button type="submit" class="w-full text-left py-2 text-gray-700">Log Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block text-gray-700 py-2">Log in</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
