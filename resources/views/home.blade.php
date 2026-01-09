<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $profile->name ?? config('app.name', 'Portfolio') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/portfolio-icon.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/portfolio-icon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/portfolio-icon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <!-- Header/Navigation -->
    <header class="bg-white shadow fixed w-full z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-800">
                <a href="#home">{{ $profile->name ?? 'Portfolio' }}</a>
            </div>
            <nav class="hidden md:flex space-x-8">
                <a href="#home" class="text-gray-700 hover:text-blue-500 transition">Home</a>
                <a href="#about" class="text-gray-700 hover:text-blue-500 transition">About</a>
                <a href="#skills" class="text-gray-700 hover:text-blue-500 transition">Skills</a>
                <a href="#projects" class="text-gray-700 hover:text-blue-500 transition">Projects</a>
                <a href="#certificates" class="text-gray-700 hover:text-blue-500 transition">Certificates</a>
                <a href="#education" class="text-gray-700 hover:text-blue-500 transition">Education</a>
                <a href="#testimonials" class="text-gray-700 hover:text-blue-500 transition">Comment</a>
                <a href="#contact" class="text-gray-700 hover:text-blue-500 transition">Contact</a>
            </nav>
            <button class="block md:hidden">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </header>

    <style>
        /* Calculate navbar height - adjust the value based on your navbar height */
        :root {
            --navbar-height: 70px;
        }

        /* Ensure the navbar stays on top with a higher z-index */
        header {
            z-index: 9999 !important;
            /* Override any other z-index */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Fix padding for the first section */
        #home {
            padding-top: var(--navbar-height) !important;
        }

        /* Make sure all other sections have proper spacing for the fixed navbar when using anchor links */
        html {
            scroll-padding-top: var(--navbar-height);
            scroll-behavior: smooth;
        }

        /* Fix for mobile menu to be above all content */
        #mobileMenu {
            z-index: 10000 !important;
        }
    </style>

    <!-- Hero Section with Enhanced Creative Blur Gradient Background (with wavy bottom) -->
    <section id="home" class="min-h-screen flex items-center relative overflow-hidden bg-transparent">
        <!-- Gradient Background Base Layer -->
        <div
            class="absolute inset-0 bg-gradient-to-br from-blue-400/30 via-indigo-300/40 to-purple-400/30 backdrop-blur-xl">
        </div>

        <!-- Glass Morphism Effect Layer -->
        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm"></div>

        <!-- Animated Background Elements with Enhanced Visual Effects -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Enhanced Circles with Glassmorphism -->
            <div class="circles">
                <div
                    class="circle-1 absolute rounded-full bg-gradient-to-r from-blue-400/30 to-indigo-500/30 backdrop-blur-md w-48 h-48 top-[10%] left-[15%] border border-white/20 shadow-lg">
                </div>
                <div
                    class="circle-2 absolute rounded-full bg-gradient-to-br from-indigo-400/30 to-purple-500/30 backdrop-blur-md w-72 h-72 top-[60%] left-[5%] border border-white/20 shadow-lg">
                </div>
                <div
                    class="circle-3 absolute rounded-full bg-gradient-to-l from-blue-300/30 to-cyan-500/30 backdrop-blur-md w-36 h-36 top-[20%] right-[10%] border border-white/20 shadow-lg">
                </div>
                <div
                    class="circle-4 absolute rounded-full bg-gradient-to-tr from-purple-400/30 to-pink-500/30 backdrop-blur-md w-60 h-60 bottom-[10%] right-[20%] border border-white/20 shadow-lg">
                </div>
                <div
                    class="circle-5 absolute rounded-full bg-gradient-to-tl from-cyan-400/30 to-blue-500/30 backdrop-blur-md w-44 h-44 bottom-[30%] left-[30%] border border-white/20 shadow-lg">
                </div>
            </div>

            <!-- Enhanced Shapes with Glassmorphism -->
            <div class="floating-shapes">
                <div
                    class="shape-1 absolute bg-gradient-to-br from-blue-400/30 to-indigo-500/30 backdrop-blur-md w-16 h-16 top-[15%] left-[30%] border border-white/20 shadow-lg">
                </div>
                <div
                    class="shape-2 absolute bg-gradient-to-br from-purple-400/30 to-pink-500/30 backdrop-blur-md w-20 h-20 top-[70%] left-[65%] border border-white/20 shadow-lg">
                </div>
                <div
                    class="shape-3 absolute bg-gradient-to-br from-cyan-400/30 to-blue-500/30 backdrop-blur-md w-12 h-12 top-[40%] right-[25%] border border-white/20 shadow-lg">
                </div>
                <div
                    class="shape-4 absolute bg-gradient-to-br from-indigo-400/30 to-purple-500/30 backdrop-blur-md w-16 h-16 bottom-[20%] left-[15%] rounded-tl-3xl rounded-br-3xl rounded-tr-md rounded-bl-md border border-white/20 shadow-lg">
                </div>
            </div>

            <!-- Additional Light Beams for Dynamic Effect -->
            <div class="light-beams">
                <div
                    class="absolute top-0 left-1/4 w-64 h-96 bg-gradient-to-b from-blue-400/20 to-transparent transform -rotate-45 blur-3xl">
                </div>
                <div
                    class="absolute bottom-0 right-1/4 w-64 h-96 bg-gradient-to-t from-purple-400/20 to-transparent transform rotate-45 blur-3xl">
                </div>
            </div>

            <!-- Dynamic Mesh Grid Overlay -->
            <div
                class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAwIDAgTCAyMCAwIE0gMCAwIEwgMCAyMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJyZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMDUpIiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-30">
            </div>
        </div>

        <div class="container mx-auto px-4 py-20 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4 text-gray-800">Hi, I'm <span
                            class="text-blue-600">{{ $profile->name ?? 'Developer' }}</span></h1>
                    <h2 class="text-2xl md:text-3xl text-gray-700 mb-6">{{ $profile->role ?? 'Web Developer' }}</h2>
                    <p class="text-gray-600 mb-8 text-lg max-w-lg">
                        {{ $profile->bio ?? 'A passionate web developer focused on creating beautiful and functional websites and applications.' }}
                    </p>
                    <div class="flex space-x-4">
                        <a href="#contact"
                            class="px-6 py-3 border border-blue-500 text-blue-600 rounded-md hover:bg-blue-50 transition backdrop-blur-sm bg-white/30 shadow-md hover:shadow-lg">Contact
                            Me</a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-end">
                    <div class="relative">
                        @if($profile->avatar ?? false)
                            <img src="{{ asset('storage/' . $profile->avatar) }}" alt="{{ $profile->name }}" loading="eager"
                                decoding="async" fetchpriority="high"
                                class="rounded-full w-64 h-64 object-cover border-8 border-white/90 shadow-xl">
                        @else
                            <div
                                class="rounded-full w-64 h-64 bg-gray-300/90 flex items-center justify-center border-8 border-white/90 shadow-xl backdrop-blur-sm">
                                <svg class="h-24 w-24 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                </svg>
                            </div>
                        @endif
                        <div class="absolute -bottom-4 -right-4 bg-blue-600 text-white rounded-full p-4 shadow-lg">
                            <i class="fas fa-code text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wavy SVG bottom edge -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none pointer-events-none"
            style="height: 96px;">
            <svg class="relative block w-full h-full" viewBox="0 0 1200 120" preserveAspectRatio="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M0,0 C150,100 350,100 600,50 C850,0 1050,0 1200,50 L1200,120 L0,120 Z" fill="#ffffff"></path>
            </svg>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">About Me</h2>
                <div class="w-20 h-1 bg-blue-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    {{ $profile->bio ?? 'I am a passionate web developer with certificates in creating stunning, functional websites and applications.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="bg-blue-100 text-blue-500 rounded-full p-4 inline-block mb-4">
                        <i class="fas fa-laptop-code text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Web Development</h3>
                    <p class="text-gray-600">Creating responsive and accessible websites that provide an excellent user
                        certificates.</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="bg-blue-100 text-blue-500 rounded-full p-4 inline-block mb-4">
                        <i class="fas fa-mobile-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Responsive Design</h3>
                    <p class="text-gray-600">Building websites that look great on all devices, from desktop to mobile.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="bg-blue-100 text-blue-500 rounded-full p-4 inline-block mb-4">
                        <i class="fas fa-server text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Backend Development</h3>
                    <p class="text-gray-600">Developing robust backend systems that power web applications.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">My Skills</h2>
                <div class="w-20 h-1 bg-blue-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Here are some of the technologies and skills I've worked
                    with.</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                @forelse($skills as $skill)
                    <div
                        class="flex flex-col items-center bg-white shadow-md rounded-lg p-6 transition-transform hover:transform hover:scale-105">
                        @if($skill->icon)
                            <div class="mb-4">
                                <img src="{{ Storage::url($skill->icon) }}" alt="{{ $skill->name }}" loading="lazy"
                                    decoding="async" fetchpriority="low" class="w-16 h-16 object-contain">
                            </div>
                        @endif
                        <h3 class="text-gray-800 text-center font-medium">{{ $skill->name }}</h3>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500">No skills added yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">My Projects</h2>
                <div class="w-20 h-1 bg-blue-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Here are some of the projects I've worked on.</p>
            </div>

            <!-- Initial 6 Projects -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php $counter = 0; @endphp
                @forelse($projects as $project)
                    @if($counter < 6)
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                            @php
                                $coverUrl = $project->cover_image ? asset('storage/' . $project->cover_image) : ($project->images->count() ? asset('storage/' . $project->images->first()->path) : '');
                            @endphp
                            @if($coverUrl)
                                <img src="{{ $coverUrl }}" alt="{{ $project->title }}" loading="lazy" decoding="async"
                                    fetchpriority="low" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gradient-to-r from-gray-100 to-gray-200"></div>
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $project->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>

                                @if($project->techStackArray)
                                    <div class="mb-4 flex flex-wrap gap-2">
                                        @foreach($project->techStackArray as $tech)
                                            <span class="inline-flex items-center px-3 py-1 bg-blue-50 text-sm rounded-full text-blue-700 border border-blue-100">{{ $tech }}</span>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="flex justify-between items-center">
                                    <div></div>
                                    <div class="flex items-center space-x-3">
                                        <button type="button"
                                            class="view-details-btn px-4 py-2 bg-white text-black rounded-full font-black shadow hover:scale-105 transform transition"
                                            data-title="{{ e($project->title) }}"
                                            data-description="{{ e($project->description) }}"
                                            data-tech_stack="{{ $project->tech_stack ?? '' }}"
                                            data-tech_stack_items="{{ $project->techStackArray ? implode('|', $project->techStackArray) : '' }}"
                                            data-project_url="{{ $project->project_url ?? '' }}"
                                            data-github_url="{{ $project->github_url ?? '' }}" data-image_url="{{ $coverUrl }}"
                                            data-created_at="{{ $project->created_at }}"
                                            data-image_urls="{{ $project->imageUrls ? implode('|', $project->imageUrls) : '' }}">
                                            View Details
                                        </button>
                                        @if($project->project_url)
                                            <a href="{{ $project->project_url }}" target="_blank"
                                                class="text-blue-500 hover:text-blue-700">
                                                <i class="fas fa-external-link-alt"></i> Open
                                            </a>
                                        @endif
                                        @if($project->github_url)
                                            <a href="{{ $project->github_url }}" target="_blank"
                                                class="text-gray-800 hover:text-gray-900">
                                                <i class="fab fa-github"></i> GitHub
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $counter++; @endphp
                    @endif
                @empty
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-500">No projects added yet.</p>
                    </div>
                @endforelse
            </div>

            <!-- Hidden Projects (More than 6) -->
            @if(count($projects) > 6)
                <div id="hidden-projects" class="hidden grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                    @php $counter = 0; @endphp
                    @foreach($projects as $project)
                        @if($counter >= 6)
                            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                                @php
                                    $coverUrl = $project->cover_image ? asset('storage/' . $project->cover_image) : ($project->images->count() ? asset('storage/' . $project->images->first()->path) : '');
                                @endphp
                                @if($coverUrl)
                                    <img src="{{ $coverUrl }}" alt="{{ $project->title }}" loading="lazy" decoding="async"
                                        fetchpriority="low" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gradient-to-r from-gray-100 to-gray-200"></div>
                                @endif
                                <div class="p-6">
                                    <h3 class="text-xl font-bold mb-2">{{ $project->title }}</h3>
                                    <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-blue-500 font-semibold">{{ $project->category }}</span>
                                        <div class="flex items-center space-x-3">
                                            <button type="button"
                                                class="view-details-btn px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-500 text-black rounded-full font-black shadow hover:scale-105 transform transition"
                                                data-title="{{ e($project->title) }}"
                                                data-description="{{ e($project->description) }}"
                                                data-category="{{ e($project->category) }}"
                                                data-project_url="{{ $project->project_url ?? '' }}"
                                                data-github_url="{{ $project->github_url ?? '' }}" data-image_url="{{ $coverUrl }}"
                                                data-created_at="{{ $project->created_at }}"
                                                data-image_urls="{{ $project->imageUrls ? implode('|', $project->imageUrls) : '' }}">
                                                View Details
                                            </button>
                                            @if($project->project_url)
                                                <a href="{{ $project->project_url }}" target="_blank"
                                                    class="text-blue-500 hover:text-blue-700">
                                                    <i class="fas fa-external-link-alt"></i> Open
                                                </a>
                                            @endif
                                            @if($project->github_url)
                                                <a href="{{ $project->github_url }}" target="_blank"
                                                    class="text-gray-800 hover:text-gray-900">
                                                    <i class="fab fa-github"></i> GitHub
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @php $counter++; @endphp
                    @endforeach
                </div>

                <!-- Show More Button -->
                <div class="text-center mt-12">
                    <button id="show-more-btn"
                        class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-300 flex items-center mx-auto">
                        <span id="button-text">Show More Projects</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" id="button-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
            @endif
        </div>

        <!-- JavaScript for Show More functionality -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const showMoreBtn = document.getElementById('show-more-btn');
                const hiddenProjects = document.getElementById('hidden-projects');
                const buttonText = document.getElementById('button-text');
                const buttonIcon = document.getElementById('button-icon');

                if (showMoreBtn) {
                    showMoreBtn.addEventListener('click', function () {
                        if (hiddenProjects.classList.contains('hidden')) {
                            // Show hidden projects
                            hiddenProjects.classList.remove('hidden');
                            buttonText.textContent = 'Show Less';
                            buttonIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />';

                            // Smooth scroll to hidden projects
                            hiddenProjects.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        } else {
                            // Hide projects
                            hiddenProjects.classList.add('hidden');
                            buttonText.textContent = 'Show More Projects';
                            buttonIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />';

                            // Scroll back to projects section
                            document.getElementById('projects').scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                    });
                }
            });
        </script>

        <!-- Project Details Modal (compact box) -->
        <div id="projectModal" class="fixed inset-0 z-50 hidden items-center justify-center p-6">
            <div id="projectModalOverlay" class="absolute inset-0 bg-black/60 backdrop-blur-sm z-0"></div>

            <div
                class="relative z-10 max-w-md w-full bg-white rounded-xl shadow-2xl overflow-hidden transform transition-all">
                <button id="closeProjectModal"
                    class="absolute top-3 right-3 bg-white/90 rounded-full p-2 shadow hover:bg-white transition z-20">
                    <svg class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="p-6 text-center">
                    <!-- Carousel container -->
                    <div id="projectCarousel" class="relative w-full mb-4">
                        <div id="projectSlides" class="overflow-hidden rounded-md">
                            <!-- slides injected here -->
                        </div>

                        <a id="carouselGithubBadge" href="#" target="_blank"
                            class="absolute top-2 right-2 bg-gray-800 text-white p-2 rounded-full shadow hidden"
                            title="View on GitHub" aria-label="View on GitHub">
                            <i class="fab fa-github"></i>
                        </a>

                        <button id="carouselPrev"
                            class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/90 rounded-full p-2 shadow hidden">
                            <svg class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <button id="carouselNext"
                            class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/90 rounded-full p-2 shadow hidden">
                            <svg class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div id="carouselDots" class="flex justify-center mt-3 gap-2"></div>
                    </div>

                    <h3 id="projectModalTitle" class="text-2xl font-black mb-2 text-gray-900"></h3>
                    <p id="projectModalCategory"
                        class="inline-block text-sm text-white bg-gradient-to-r from-yellow-400 to-orange-500 px-3 py-1 rounded-full font-black mb-4">
                    </p>
                    <p id="projectModalDescription" class="text-gray-700 mb-4 text-left"></p>
                    <div id="projectModalTechStack" class="mb-4 flex flex-wrap gap-2"></div>
                    <p id="projectModalDate" class="text-gray-500 text-sm mb-4">&nbsp;</p>

                    <div class="mt-4 flex justify-center gap-3">
                        <a id="projectModalLink" href="#" target="_blank"
                            class="px-4 py-2 bg-blue-400 text-white font-bold rounded-full shadow hidden">Open
                            Project</a>
                        <a id="projectModalGithub" href="#" target="_blank"
                            class="px-4 py-2 bg-gray-800 text-white font-bold rounded-full shadow hidden">GitHub</a>
                        <button id="projectModalCloseBtn"
                            class="px-4 py-2 border border-gray-200 rounded-full">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Delegate click handler for project details
                document.querySelectorAll('.view-details-btn').forEach(btn => {
                    btn.addEventListener('click', function () {
                        // Build details object from data- attributes (avoids embedding JSON in attributes)
                        const details = {
                            title: this.dataset.title || '',
                            description: this.dataset.description || '',
                            category: this.dataset.category || '',
                            project_url: this.dataset.project_url || null,
                            github_url: this.dataset.github_url || null,
                            image_url: this.dataset.image_url || null,
                            created_at: this.dataset.created_at || null,
                            tech_stack_items: this.dataset.tech_stack_items || ''
                        };

                        document.getElementById('projectModalTitle').innerText = details.title || 'Untitled';
                        document.getElementById('projectModalCategory').innerText = details.category || '';
                        document.getElementById('projectModalDescription').innerText = details.description || '';
                        document.getElementById('projectModalDate').innerText = details.created_at ? new Date(details.created_at).toLocaleDateString() : '';

                        // Populate tech stack badges in modal
                        const techStackRaw = (details.tech_stack_items || '').trim();
                        const techStackContainer = document.getElementById('projectModalTechStack');
                        techStackContainer.innerHTML = '';
                        if (techStackRaw) {
                            techStackRaw.split('|').filter(Boolean).forEach(t => {
                                const span = document.createElement('span');
                                span.className = 'inline-flex items-center px-3 py-1 bg-blue-50 text-sm rounded-full text-blue-700 border border-blue-100 mr-2 mb-2';
                                span.innerText = t;
                                techStackContainer.appendChild(span);
                            });
                        }
                        // Build carousel images list from data-image_urls attribute
                        const imageUrlsRaw = (this.dataset.image_urls || '').trim();
                        let imageUrls = [];

                        if (imageUrlsRaw) {
                            imageUrls = imageUrlsRaw.split('|').filter(Boolean);
                        } else if (details.image_url) {
                            imageUrls = [details.image_url];
                        }

                        // Populate carousel
                        const slidesContainer = document.getElementById('projectSlides');
                        const dotsContainer = document.getElementById('carouselDots');
                        const prevBtn = document.getElementById('carouselPrev');
                        const nextBtn = document.getElementById('carouselNext');
                        const openLink = document.getElementById('projectModalLink');

                        slidesContainer.innerHTML = '';
                        dotsContainer.innerHTML = '';

                        imageUrls.forEach((url, index) => {
                            const slide = document.createElement('div');
                            slide.className = 'slide w-full';
                            slide.style.display = index === 0 ? 'block' : 'none';

                            const img = document.createElement('img');
                            img.src = url;
                            img.alt = details.title || 'Project image';
                            img.className = 'w-full h-56 object-cover rounded-md';

                            slide.appendChild(img);
                            slidesContainer.appendChild(slide);

                            const dot = document.createElement('button');
                            dot.className = 'w-3 h-3 rounded-full bg-gray-300';
                            if (index === 0) dot.classList.add('bg-gray-700');
                            dot.addEventListener('click', () => showSlide(index));
                            dotsContainer.appendChild(dot);
                        });

                        function showSlide(i) {
                            const slides = slidesContainer.querySelectorAll('.slide');
                            const dots = dotsContainer.querySelectorAll('button');
                            slides.forEach((s, idx) => s.style.display = idx === i ? 'block' : 'none');
                            dots.forEach((d, idx) => d.classList.toggle('bg-gray-700', idx === i));
                            currentIndex = i;
                        }

                        let currentIndex = 0;

                        if (imageUrls.length > 1) {
                            prevBtn.classList.remove('hidden');
                            nextBtn.classList.remove('hidden');

                            prevBtn.onclick = () => showSlide((currentIndex - 1 + imageUrls.length) % imageUrls.length);
                            nextBtn.onclick = () => showSlide((currentIndex + 1) % imageUrls.length);

                            // optional keyboard support
                            document.addEventListener('keydown', function (e) {
                                if (e.key === 'ArrowLeft') prevBtn.click();
                                if (e.key === 'ArrowRight') nextBtn.click();
                            });

                            // swipe support
                            let touchStartX = 0;
                            slidesContainer.addEventListener('touchstart', (e) => { touchStartX = e.changedTouches[0].screenX; }, { passive: true });
                            slidesContainer.addEventListener('touchend', (e) => {
                                const dist = e.changedTouches[0].screenX - touchStartX;
                                if (dist > 40) prevBtn.click();
                                if (dist < -40) nextBtn.click();
                            }, { passive: true });
                        } else {
                            prevBtn.classList.add('hidden');
                            nextBtn.classList.add('hidden');
                        }

                        // Normalize and open project URL in a new tab when clicked
                        function normalizeUrl(u) {
                            if (!u) return null;
                            if (/^(https?:)?\/\//i.test(u)) return u;
                            return 'https://' + u;
                        }

                        if (details.project_url) {
                            const projectUrl = normalizeUrl(details.project_url);
                            openLink.href = projectUrl;
                            openLink.classList.remove('hidden');
                            // Explicit click handler as a fallback to ensure it opens
                            openLink.onclick = (e) => {
                                e.stopPropagation();
                                window.open(projectUrl, '_blank', 'noopener,noreferrer');
                            };
                        } else {
                            openLink.href = '#';
                            openLink.classList.add('hidden');
                            openLink.onclick = null;
                        }

                        const githubLink = document.getElementById('projectModalGithub');
                        const carouselBadgeEl = document.getElementById('carouselGithubBadge');
                        if (details.github_url) {
                            const ghUrl = normalizeUrl(details.github_url);
                            githubLink.href = ghUrl;
                            githubLink.classList.remove('hidden');
                            githubLink.onclick = (e) => {
                                e.stopPropagation();
                                window.open(ghUrl, '_blank', 'noopener,noreferrer');
                            };
                            if (carouselBadgeEl) {
                                carouselBadgeEl.href = ghUrl;
                                carouselBadgeEl.classList.remove('hidden');
                                carouselBadgeEl.onclick = (e) => {
                                    e.stopPropagation();
                                    window.open(ghUrl, '_blank', 'noopener,noreferrer');
                                };
                            }
                        } else {
                            githubLink.href = '#';
                            githubLink.classList.add('hidden');
                            githubLink.onclick = null;
                            if (carouselBadgeEl) {
                                carouselBadgeEl.href = '#';
                                carouselBadgeEl.classList.add('hidden');
                                carouselBadgeEl.onclick = null;
                            }
                        }

                        // Show modal (with animation)
                        const modal = document.getElementById('projectModal');
                        const overlay = document.getElementById('projectModalOverlay');

                        // Show with enter animation
                        modal.classList.remove('hidden');
                        modal.classList.add('flex', 'modal-enter');
                        overlay.classList.add('overlay-enter');
                        modal.classList.remove('modal-leave');
                        overlay.classList.remove('overlay-leave');

                        // Remove enter class after animation ends
                        const removeEnter = function () {
                            modal.classList.remove('modal-enter');
                            modal.removeEventListener('animationend', removeEnter);
                        };
                        modal.addEventListener('animationend', removeEnter);

                        // Close handlers with leave animation
                        const closeModal = () => {
                            modal.classList.add('modal-leave');
                            overlay.classList.add('overlay-leave');
                            modal.classList.remove('modal-enter');
                            overlay.classList.remove('overlay-enter');

                            const handleLeaveEnd = function () {
                                modal.classList.add('hidden');
                                modal.classList.remove('flex', 'modal-leave');
                                overlay.classList.remove('overlay-leave');
                                modal.removeEventListener('animationend', handleLeaveEnd);
                            };

                            modal.addEventListener('animationend', handleLeaveEnd);
                        };

                        document.getElementById('closeProjectModal').onclick = closeModal;
                        document.getElementById('projectModalOverlay').onclick = closeModal;
                        document.getElementById('projectModalCloseBtn').onclick = closeModal;

                        document.addEventListener('keydown', function escHandler(e) {
                            if (e.key === 'Escape') {
                                closeModal();
                                document.removeEventListener('keydown', escHandler);
                            }
                        });
                    });
                });
            });
        </script>

        <style>
            /* Modal animations */
            @keyframes modalZoomIn {
                0% {
                    transform: scale(0.92);
                    opacity: 0;
                }

                60% {
                    transform: scale(1.03);
                    opacity: 1;
                }

                100% {
                    transform: scale(1);
                    opacity: 1;
                }
            }

            @keyframes modalZoomOut {
                0% {
                    transform: scale(1);
                    opacity: 1;
                }

                100% {
                    transform: scale(0.96);
                    opacity: 0;
                }
            }

            .modal-enter {
                animation: modalZoomIn 360ms cubic-bezier(.2, .9, .2, 1) forwards;
            }

            .modal-leave {
                animation: modalZoomOut 200ms ease forwards;
            }

            /* Overlay fade */
            @keyframes overlayFadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            @keyframes overlayFadeOut {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                }
            }

            #projectModalOverlay.overlay-enter {
                animation: overlayFadeIn 280ms ease forwards;
            }

            #projectModalOverlay.overlay-leave {
                animation: overlayFadeOut 180ms ease forwards;
            }
        </style>
    </section>

    <!-- Certificate and License Section with Creative Gradient Background -->
    <section id="certificates" class="py-20 relative overflow-hidden">
        <!-- Gradient Background Base -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-300/40 via-indigo-400/30 to-purple-300/40 bg-animate">
        </div>

        <!-- Glassmorphism Overlay -->
        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm"></div>

        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Floating Circles -->
            <div class="circles">
                <div
                    class="circle-1 absolute rounded-full bg-gradient-to-r from-blue-400/20 to-indigo-500/20 backdrop-blur-md w-40 h-40 top-[15%] left-[10%] border border-white/20">
                </div>
                <div
                    class="circle-2 absolute rounded-full bg-gradient-to-tr from-indigo-300/20 to-purple-500/20 backdrop-blur-md w-60 h-60 bottom-[20%] left-[5%] border border-white/20">
                </div>
                <div
                    class="circle-3 absolute rounded-full bg-gradient-to-bl from-blue-300/20 to-cyan-500/20 backdrop-blur-md w-32 h-32 top-[30%] right-[15%] border border-white/20">
                </div>
                <div
                    class="circle-4 absolute rounded-full bg-gradient-to-tl from-purple-400/20 to-pink-500/20 backdrop-blur-md w-48 h-48 bottom-[10%] right-[10%] border border-white/20">
                </div>
            </div>

            <!-- Light Beams -->
            <div class="light-beams">
                <div
                    class="absolute top-0 left-1/3 w-64 h-96 bg-gradient-to-b from-blue-400/10 to-transparent transform -rotate-45 blur-2xl glow-effect">
                </div>
                <div
                    class="absolute bottom-0 right-1/3 w-64 h-96 bg-gradient-to-t from-purple-400/10 to-transparent transform rotate-45 blur-2xl glow-effect">
                </div>
            </div>

            <!-- Subtle Grid Pattern -->
            <div
                class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAwIDAgTCAyMCAwIE0gMCAwIEwgMCAyMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJyZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMDUpIiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20">
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4 text-gray-800">Certificates</h2>
                <div class="w-20 h-1 bg-blue-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">My certificates and professional licenses.</p>
            </div>

            <!-- Scrollable container with hidden scrollbar -->
            <div class="relative">
                <div class="flex overflow-x-auto pb-8 space-x-6 snap-x certificates-container"
                    style="-ms-overflow-style: none; scrollbar-width: none;">
                    <style>
                        /* Hide scrollbar for Chrome, Safari and Opera */
                        .certificates-container::-webkit-scrollbar {
                            display: none;
                        }

                        /* Hide scrollbar for IE, Edge and Firefox */
                        .certificates-container {
                            -ms-overflow-style: none;
                            /* IE and Edge */
                            scrollbar-width: none;
                            /* Firefox */
                        }
                    </style>
                    @forelse($certificates as $certificate)
                        <div
                            class="flex-none w-80 snap-center bg-white/80 backdrop-blur-md rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300 border-t-4 border-blue-500">
                            <!-- Certificate Image -->
                            <div class="h-48 overflow-hidden bg-gray-50/90">
                                @if($certificate->certificate_logo)
                                    <img src="{{ Storage::url($certificate->certificate_logo) }}" alt="{{ $certificate->name }}"
                                        loading="lazy" decoding="async" fetchpriority="low" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-100/90">
                                        <span class="text-gray-400">No Image</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Certificate Information -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $certificate->name }}</h3>
                                <h4 class="text-lg text-blue-600 mb-3">{{ $certificate->organization }}</h4>

                                <p class="text-gray-600 mb-4 line-clamp-3">{{ $certificate->description }}</p>

                                <div class="flex flex-wrap items-center gap-2 text-sm">
                                    <span
                                        class="flex items-center text-gray-500 bg-blue-100/80 backdrop-blur-sm px-3 py-1 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Verified
                                    </span>

                                    @if(isset($certificate->issue_date))
                                        <span
                                            class="flex items-center text-gray-500 bg-blue-100/80 backdrop-blur-sm px-3 py-1 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ \Carbon\Carbon::parse($certificate->issue_date)->format('M Y') }}
                                        </span>
                                    @endif

                                    @if(isset($certificate->credential_id))
                                        <span
                                            class="flex items-center text-gray-500 bg-blue-100/80 backdrop-blur-sm px-3 py-1 rounded-full text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                            </svg>
                                            ID: {{ $certificate->credential_id }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-full text-center py-8">
                            <p class="text-gray-500">No certificates or licenses added yet.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Navigation buttons with enhanced styling -->
                <div class="flex justify-center mt-4 space-x-2">
                    <button
                        class="scroll-btn-left p-2 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 focus:outline-none transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button
                        class="scroll-btn-right p-2 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 focus:outline-none transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Scroll buttons JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const scrollContainer = document.querySelector('.certificates-container');
                const leftBtn = document.querySelector('.scroll-btn-left');
                const rightBtn = document.querySelector('.scroll-btn-right');

                if (leftBtn && rightBtn && scrollContainer) {
                    leftBtn.addEventListener('click', function () {
                        scrollContainer.scrollBy({ left: -300, behavior: 'smooth' });
                    });

                    rightBtn.addEventListener('click', function () {
                        scrollContainer.scrollBy({ left: 300, behavior: 'smooth' });
                    });
                }
            });
        </script>
    </section>

    <!-- Education Section -->
    <section id="education" class="py-20 bg-gradient-to-br from-white to-blue-50 relative overflow-hidden">
        <!-- Modern Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="education-shapes opacity-20">
                <!-- Floating Elements -->
                <div class="absolute w-72 h-72 rounded-full bg-blue-400 blur-3xl top-0 -left-20 animate-pulse"></div>
                <div class="absolute w-96 h-96 rounded-full bg-indigo-400 blur-3xl bottom-0 -right-20 animate-pulse"
                    style="animation-delay: 2s;"></div>
                <div class="absolute w-64 h-64 rounded-full bg-cyan-400 blur-3xl top-1/3 right-1/4 animate-pulse"
                    style="animation-delay: 3s;"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <h2
                    class="text-4xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                    Education</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto mb-8 rounded-full"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">My academic background and qualifications.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                @forelse($educations as $education)
                    <div
                        class="group bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-blue-200 transform hover:-translate-y-1">
                        <div class="flex items-start mb-5">
                            @if($education->institution_logo)
                                <div class="mr-5">
                                    <div
                                        class="h-16 w-16 rounded-lg bg-white shadow-sm p-2 flex items-center justify-center overflow-hidden">
                                        <img src="{{ asset('storage/' . $education->institution_logo) }}"
                                            alt="{{ $education->institution }}" loading="lazy" decoding="async"
                                            fetchpriority="low" class="h-12 w-12 object-contain">
                                    </div>
                                </div>
                            @else
                                <div class="mr-5">
                                    <div
                                        class="h-16 w-16 rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center">
                                        <i class="fas fa-graduation-cap text-2xl"></i>
                                    </div>
                                </div>
                            @endif
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
                                    {{ $education->degree }}
                                </h3>
                                <h4 class="text-indigo-600 font-medium">{{ $education->institution }}</h4>
                            </div>
                        </div>

                        <div class="ml-0 md:ml-20">
                            <p class="text-gray-600">{{ $education->description }}</p>

                            @if($education->achievements)
                                <div class="mt-4">
                                    <h5 class="font-semibold text-gray-700 mb-3">Highlights:</h5>
                                    <ul class="space-y-2">
                                        @foreach(explode("\n", $education->achievements) as $achievement)
                                            @if(trim($achievement))
                                                <li class="flex items-start">
                                                    <span class="text-blue-500 mr-2 mt-1"><i class="fas fa-check-circle"></i></span>
                                                    <span class="text-gray-600">{{ trim($achievement) }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center py-12 bg-white rounded-xl shadow-sm">
                        <div class="text-gray-400 mb-3">
                            <i class="fas fa-graduation-cap text-5xl opacity-30"></i>
                        </div>
                        <p class="text-gray-500">No education information available yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Optional: Add this script at the end of your body tag for subtle animations -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add subtle entrance animations
            const educationCards = document.querySelectorAll('#education .grid > div');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('opacity-100');
                            entry.target.classList.remove('opacity-0', 'translate-y-8');
                        }, index * 150);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            educationCards.forEach((card) => {
                card.classList.add('opacity-0', 'translate-y-8', 'transition-all', 'duration-700');
                observer.observe(card);
            });
        });
    </script>

    <<!-- Testimonials Section -->
        <section id="testimonials" class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
            <!-- Background Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute opacity-10 top-0 left-0 w-full h-full"
                    style="background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z\' fill=\'%23000000\' fill-opacity=\'0.1\' fill-rule=\'evenodd\'/%3E%3C/svg%3E')">
                </div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="text-center mb-16">
                    <h2
                        class="text-4xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                        Comment</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto mb-8 rounded-full"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">What people say about working with me.</p>
                </div>

                <!-- Testimonials Carousel Container -->
                <div class="relative max-w-6xl mx-auto px-4 overflow-hidden" id="testimonials-container">
                    <!-- Carousel Track -->
                    <div class="testimonials-track flex transition-transform duration-500 ease-out">
                        @forelse($testimonials as $testimonial)
                            <div class="testimonial-slide w-full md:w-1/3 flex-shrink-0 px-4">
                                <div
                                    class="bg-white rounded-2xl shadow-lg overflow-hidden h-full transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1 flex flex-col">
                                    <div
                                        class="absolute top-0 right-0 w-32 h-32 -mt-12 -mr-12 bg-gradient-to-br from-blue-400 to-indigo-500 opacity-10 rounded-full">
                                    </div>

                                    <div class="p-8 relative flex flex-col h-full">
                                        <!-- Quote Icon -->
                                        <div class="absolute top-6 right-8 text-gray-200">
                                            <svg class="w-12 h-12" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.571-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z" />
                                            </svg>
                                        </div>

                                        <!-- Rating Stars -->
                                        <div class="text-yellow-400 mb-6 flex">
                                            @for($i = 0; $i < 5; $i++)
                                                @if($i < $testimonial->rating)
                                                    <svg class="w-5 h-5 mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
                                                    </svg>
                                                @else
                                                    <svg class="w-5 h-5 mr-1 text-yellow-200" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
                                                    </svg>
                                                @endif
                                            @endfor
                                        </div>

                                        <!-- Testimonial Content -->
                                        <p class="text-gray-600 italic mb-8 flex-grow">"{{ $testimonial->content }}"</p>

                                        <!-- Profile Info -->
                                        <div class="mt-auto pt-6 border-t border-gray-100 flex items-center">
                                            @if($testimonial->avatar)
                                                <img src="{{ asset('storage/' . $testimonial->avatar) }}"
                                                    alt="{{ $testimonial->name }}" loading="lazy" decoding="async"
                                                    fetchpriority="low"
                                                    class="w-14 h-14 rounded-full object-cover border-2 border-blue-100">
                                            @else
                                                <div
                                                    class="w-14 h-14 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-white">
                                                    <span
                                                        class="text-lg font-bold">{{ substr($testimonial->name, 0, 1) }}</span>
                                                </div>
                                            @endif

                                            <div class="ml-4">
                                                <h4 class="font-bold text-gray-800">{{ $testimonial->name }}</h4>
                                                <p class="text-blue-600 text-sm">{{ $testimonial->position }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="w-full text-center py-16">
                                <div class="bg-white rounded-2xl shadow-lg p-12">
                                    <div
                                        class="mx-auto w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mb-6">
                                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-500">No comment available yet.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination/Indicator Dots -->
                    <div class="flex justify-center mt-10 space-x-2 pagination-dots">
                        <!-- Will be populated by JS -->
                    </div>

                    <!-- Navigation Arrows (Optional) -->
                    <button
                        class="absolute top-1/2 -left-4 transform -translate-y-1/2 bg-white rounded-full shadow-lg p-3 focus:outline-none hover:bg-blue-50 transition-colors hidden md:block"
                        id="prev-btn">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                    <button
                        class="absolute top-1/2 -right-4 transform -translate-y-1/2 bg-white rounded-full shadow-lg p-3 focus:outline-none hover:bg-blue-50 transition-colors hidden md:block"
                        id="next-btn">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        <!-- Script for the Carousel -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const track = document.querySelector('.testimonials-track');
                const slides = document.querySelectorAll('.testimonial-slide');
                const dotsContainer = document.querySelector('.pagination-dots');
                const prevButton = document.getElementById('prev-btn');
                const nextButton = document.getElementById('next-btn');

                let slideWidth = slides[0].getBoundingClientRect().width;
                let currentIndex = 0;
                let slidesPerView = 3;
                let autoplayInterval = null;
                let totalSlides = slides.length;

                // Responsive slidesPerView
                function updateSlidesPerView() {
                    if (window.innerWidth < 768) {
                        slidesPerView = 1;
                    } else {
                        slidesPerView = 3;
                    }
                    slideWidth = slides[0].getBoundingClientRect().width;
                    goToSlide(currentIndex);
                    updateDots();
                }

                // Create pagination dots
                function createDots() {
                    dotsContainer.innerHTML = '';
                    const totalDots = Math.ceil(totalSlides / slidesPerView);

                    for (let i = 0; i < totalDots; i++) {
                        const dot = document.createElement('button');
                        dot.classList.add('w-3', 'h-3', 'rounded-full', 'bg-gray-300', 'hover:bg-blue-400', 'transition-colors', 'focus:outline-none');
                        dot.addEventListener('click', () => {
                            goToSlide(i * slidesPerView);
                            updateDots();
                        });
                        dotsContainer.appendChild(dot);
                    }
                    updateDots();
                }

                // Update active dot
                function updateDots() {
                    const dots = dotsContainer.querySelectorAll('button');
                    const activeDotIndex = Math.floor(currentIndex / slidesPerView);

                    dots.forEach((dot, index) => {
                        if (index === activeDotIndex) {
                            dot.classList.remove('bg-gray-300');
                            dot.classList.add('bg-blue-500', 'w-6');
                        } else {
                            dot.classList.add('bg-gray-300');
                            dot.classList.remove('bg-blue-500', 'w-6');
                        }
                    });
                }

                // Go to specific slide
                function goToSlide(index) {
                    // Ensure we don't go beyond the last slide group
                    const maxIndex = totalSlides - slidesPerView;
                    if (index > maxIndex) index = maxIndex;
                    if (index < 0) index = 0;

                    currentIndex = index;
                    const offset = -slideWidth * currentIndex;
                    track.style.transform = `translateX(${offset}px)`;
                    updateDots();
                }

                // Next slide
                function nextSlide() {
                    goToSlide(currentIndex + slidesPerView);
                }

                // Previous slide
                function prevSlide() {
                    goToSlide(currentIndex - slidesPerView);
                }

                // Start autoplay
                function startAutoplay() {
                    stopAutoplay();
                    autoplayInterval = setInterval(() => {
                        if (currentIndex >= totalSlides - slidesPerView) {
                            // Reset to first slide with animation
                            goToSlide(0);
                        } else {
                            nextSlide();
                        }
                    }, 5000); // Change slide every 5 seconds
                }

                // Stop autoplay
                function stopAutoplay() {
                    if (autoplayInterval) {
                        clearInterval(autoplayInterval);
                    }
                }

                // Event listeners
                prevButton.addEventListener('click', () => {
                    prevSlide();
                    stopAutoplay();
                    startAutoplay();
                });

                nextButton.addEventListener('click', () => {
                    nextSlide();
                    stopAutoplay();
                    startAutoplay();
                });

                // Handle responsive behavior
                window.addEventListener('resize', updateSlidesPerView);

                // Mouse interaction pauses autoplay
                track.addEventListener('mouseenter', stopAutoplay);
                track.addEventListener('mouseleave', startAutoplay);

                // Touch events for mobile swipe
                let touchStartX = 0;
                let touchEndX = 0;

                track.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                    stopAutoplay();
                }, { passive: true });

                track.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                    startAutoplay();
                }, { passive: true });

                function handleSwipe() {
                    const swipeThreshold = 50;
                    if (touchEndX < touchStartX - swipeThreshold) {
                        nextSlide(); // Swipe left, go to next
                    } else if (touchEndX > touchStartX + swipeThreshold) {
                        prevSlide(); // Swipe right, go to previous
                    }
                }

                // Initialize
                updateSlidesPerView();
                createDots();
                startAutoplay();

                // Add entrance animation
                slides.forEach((slide, index) => {
                    slide.style.opacity = '0';
                    slide.style.transform = 'translateY(20px)';

                    setTimeout(() => {
                        slide.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                        slide.style.opacity = '1';
                        slide.style.transform = 'translateY(0)';
                    }, 100 + (index * 100));
                });
            });
        </script>

        <!-- Testimonial Form Section with Certificate-like Background -->
        <section class="py-24 relative overflow-hidden">
            <!-- Gradient Background Base -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-300/40 via-indigo-400/30 to-purple-300/40"></div>

            <!-- Glassmorphism Overlay -->
            <div class="absolute inset-0 bg-white/10 backdrop-blur-sm"></div>

            <!-- Subtle Grid Pattern -->
            <div
                class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAwIDAgTCAyMCAwIE0gMCAwIEwgMCAyMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJyZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMDUpIiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20">
            </div>

            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-12">
                    <span
                        class="inline-block px-4 py-1 rounded-full bg-indigo-100 text-indigo-700 text-sm font-medium mb-4">Comment</span>
                    <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Leave a Comment to me</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto text-lg">I'm Open to any comments!</p>
                </div>

                <div class="bg-white/80 backdrop-blur-md shadow-2xl rounded-3xl overflow-hidden border-0">
                    <div class="p-8 sm:p-10">
                        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data"
                            class="space-y-8">
                            @csrf

                            <div class="grid grid-cols-1 gap-y-8 gap-x-6 sm:grid-cols-2">
                                <!-- Name Field -->
                                <div class="group">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your Name
                                        *</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                                            class="pl-10 block w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3.5 transition duration-300 bg-gray-50 hover:bg-white focus:bg-white"
                                            required placeholder="John Doe">
                                    </div>
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Rating Field -->
                                <div>
                                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating
                                        *</label>
                                    <div class="mt-1 relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </div>
                                        <select name="rating" id="rating"
                                            class="pl-10 block w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3.5 transition duration-300 appearance-none pr-10 bg-gray-50 hover:bg-white focus:bg-white"
                                            required>
                                            <option value="">Select Rating</option>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}
                                                    Star{{ $i > 1 ? 's' : '' }}</option>
                                            @endfor
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    @error('rating')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Content Field -->
                            <div>
                                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Your Comment
                                    *</label>
                                <div class="relative">
                                    <div class="absolute top-3.5 left-3 text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <textarea name="content" id="content" rows="4"
                                        class="pl-10 block w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3.5 transition duration-300 bg-gray-50 hover:bg-white focus:bg-white"
                                        required
                                        placeholder="Share your certificates with us...">{{ old('content') }}</textarea>
                                </div>
                                @error('content')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button type="submit"
                            class="w-full flex justify-center items-center py-4 px-6 border border-transparent rounded-xl shadow-md text-lg font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Submit Comment
                        </button>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-24 bg-gradient-to-b from-white to-blue-50 relative overflow-hidden">
            <!-- Animasi Background -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="contact-particles">
                    <div class="absolute rounded-full bg-blue-500 bg-opacity-10 w-4 h-4 top-1/4 left-1/5"></div>
                    <div class="absolute rounded-full bg-blue-500 bg-opacity-10 w-6 h-6 top-1/3 left-1/2"></div>
                    <div class="absolute rounded-full bg-blue-500 bg-opacity-10 w-5 h-5 top-1/2 right-1/4"></div>
                    <div class="absolute rounded-full bg-blue-500 bg-opacity-10 w-3 h-3 bottom-1/3 right-1/5"></div>
                    <div class="absolute rounded-full bg-blue-500 bg-opacity-10 w-8 h-8 bottom-1/4 left-1/3"></div>
                    <div class="absolute rounded-full bg-blue-500 bg-opacity-10 w-6 h-6 top-1/5 right-1/3"></div>
                    <div class="absolute rounded-full bg-blue-500 bg-opacity-10 w-4 h-4 bottom-1/5 left-1/4"></div>
                </div>

                <div class="contact-waves">
                    <div class="absolute bottom-0 left-0 right-0 h-16 bg-wave-pattern opacity-5"></div>
                    <div class="absolute bottom-0 left-0 right-0 h-32 bg-blue-50 opacity-10"
                        style="clip-path: polygon(0% 100%, 100% 100%, 100% 40%, 70% 50%, 40% 40%, 20% 50%, 0% 40%);">
                    </div>
                </div>
            </div>

            <div class="container mx-auto px-4 max-w-6xl relative z-10">
                <div class="text-center mb-16">
                    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Contact Me</span>
                    <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-900">Get In Touch</h2>
                    <div class="w-24 h-1 bg-blue-500 mx-auto mb-6 rounded-full"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto text-lg">Feel free to contact me for any work or
                        suggestions.</p>
                </div>

                <div class="flex flex-col md:flex-row gap-10">
                    <div class="md:w-1/2">
                        <div
                            class="bg-white p-10 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                            <h3 class="text-2xl font-bold mb-8 text-gray-800">Contact Information</h3>

                            <div class="space-y-8">
                                <div class="flex items-center">
                                    <div class="bg-blue-500 text-white rounded-lg p-4 mr-5">
                                        <i class="fas fa-map-marker-alt text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 text-lg">Address</h4>
                                        <p class="text-gray-600 mt-1">{{ $profile->Address ?? 'Bekasi, Indonesia' }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="bg-blue-500 text-white rounded-lg p-4 mr-5">
                                        <i class="fas fa-envelope text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 text-lg">Email</h4>
                                        <p class="text-gray-600 mt-1">{{ $profile->email ?? 'email@example.com' }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="bg-blue-500 text-white rounded-lg p-4 mr-5">
                                        <i class="fas fa-phone text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 text-lg">Phone</h4>
                                        <p class="text-gray-600 mt-1">{{ $profile->phone ?? '+1 123 456 7890' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10">
                                <h4 class="font-semibold text-gray-800 mb-5 text-lg text-center">Connect With Me</h4>
                                <div class="flex space-x-4 justify-center">
                                    <a href="https://www.linkedin.com/in/ilham-saputra26/" target="_blank"
                                        class="bg-white text-blue-500 hover:bg-blue-500 hover:text-white border border-blue-500 transition duration-300 p-3 rounded-lg shadow-sm">
                                        <i class="fab fa-linkedin-in text-lg"></i>
                                    </a>

                                    <a href="https://github.com/ISHASII" target="_blank"
                                        class="bg-white text-blue-500 hover:bg-blue-500 hover:text-white border border-blue-500 transition duration-300 p-3 rounded-lg shadow-sm">
                                        <i class="fab fa-github text-lg"></i>
                                    </a>

                                    <a href="https://www.instagram.com/ishasi__/" target="_blank"
                                        class="bg-white text-blue-500 hover:bg-blue-500 hover:text-white border border-blue-500 transition duration-300 p-3 rounded-lg shadow-sm">
                                        <i class="fab fa-instagram text-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:w-1/2">
                        <div
                            class="bg-white p-10 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                            <h3 class="text-2xl font-bold mb-8 text-gray-800">Send Me a Message</h3>

                            <form action="https://formspree.io/f/movejbya" method="POST" class="space-y-6">
                                <div>
                                    <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                                    <input type="text" id="name" name="name"
                                        class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                        required placeholder="Enter your name">
                                </div>

                                <div>
                                    <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
                                    <input type="email" id="email" name="email"
                                        class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                        required placeholder="Enter your email">
                                </div>

                                <div>
                                    <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                                    <input type="text" id="subject" name="subject"
                                        class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                        required placeholder="Enter subject">
                                </div>

                                <div>
                                    <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                                    <textarea id="message" name="message" rows="5"
                                        class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                        required placeholder="Your message here..."></textarea>
                                </div>

                                <input type="hidden" name="_subject" value="New message from website contact form">
                                <input type="hidden" name="_next" value="https://yourdomain.com/thank-you">
                                <input type="text" name="_gotcha" style="display:none">

                                <button type="submit"
                                    class="bg-blue-500 text-white px-8 py-4 rounded-lg hover:bg-blue-600 transition duration-300 w-full font-medium text-lg shadow-md hover:shadow-lg transform hover:-translate-y-1">Send
                                    Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-10">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-6 md:mb-0">
                        <h3 class="text-2xl font-bold">{{ $profile->name ?? 'Portfolio' }}</h3>
                        <p class="text-gray-400 mt-2">{{ $profile->role ?? 'Web Developer' }}</p>
                    </div>

                    <div class="flex flex-wrap justify-center gap-4 mb-6 md:mb-0">
                        <a href="#home" class="text-gray-400 hover:text-white transition">Home</a>
                        <a href="#about" class="text-gray-400 hover:text-white transition">About</a>
                        <a href="#skills" class="text-gray-400 hover:text-white transition">Skills</a>
                        <a href="#projects" class="text-gray-400 hover:text-white transition">Projects</a>
                        <a href="#certificates" class="text-gray-400 hover:text-white transition">Certificates</a>
                        <a href="#education" class="text-gray-400 hover:text-white transition">Education</a>
                        <a href="#testimonials" class="text-gray-400 hover:text-white transition">Comment</a>
                        <a href="#contact" class="text-gray-400 hover:text-white transition">Contact</a>
                    </div>

                    <div class="flex space-x-4">
                        @if($profile->linkedin_url ?? false)
                            <a href="{{ $profile->linkedin_url }}" target="_blank"
                                class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif

                        @if($profile->github_url ?? false)
                            <a href="{{ $profile->github_url }}" target="_blank"
                                class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-github"></i>
                            </a>
                        @endif

                        @if($profile->twitter_url ?? false)
                            <a href="{{ $profile->twitter_url }}" target="_blank"
                                class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif

                        @if($profile->instagram_url ?? false)
                            <a href="{{ $profile->instagram_url }}" target="_blank"
                                class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                    <p class="text-gray-400">&copy; {{ date('Y') }} {{ $profile->name ?? 'Portfolio' }}.</p>
                </div>
            </div>
        </footer>

        <!-- Mobile Navigation Menu -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-90 z-20 hidden" id="mobileMenu">
            <div class="flex flex-col h-full">
                <div class="flex justify-end p-4">
                    <button id="closeMenu" class="text-white">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex flex-col items-center justify-center flex-grow space-y-8 text-xl">
                    <a href="#home" class="text-white hover:text-blue-300 transition">Home</a>
                    <a href="#about" class="text-white hover:text-blue-300 transition">About</a>
                    <a href="#skills" class="text-white hover:text-blue-300 transition">Skills</a>
                    <a href="#projects" class="text-white hover:text-blue-300 transition">Projects</a>
                    <a href="#certificates" class="text-white hover:text-blue-300 transition">Certificates</a>
                    <a href="#education" class="text-white hover:text-blue-300 transition">Education</a>
                    <a href="#testimonials" class="text-white hover:text-blue-300 transition">Comment</a>
                    <a href="#contact" class="text-white hover:text-blue-300 transition">Contact</a>
                </div>
            </div>
        </div>

        <!-- Back to Top Button -->
        <button id="backToTop"
            class="fixed bottom-8 right-8 bg-blue-500 text-white p-3 rounded-full shadow-lg opacity-0 transition-opacity duration-300">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
        </button>

        <!-- Scripts -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Mobile menu toggle
                const mobileMenuButton = document.querySelector('button.block.md\\:hidden');
                const closeMenuButton = document.getElementById('closeMenu');
                const mobileMenu = document.getElementById('mobileMenu');
                const mobileMenuLinks = mobileMenu.querySelectorAll('a');

                mobileMenuButton.addEventListener('click', function () {
                    mobileMenu.classList.remove('hidden');
                    document.body.classList.add('overflow-hidden');
                });

                closeMenuButton.addEventListener('click', function () {
                    mobileMenu.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                });

                mobileMenuLinks.forEach(link => {
                    link.addEventListener('click', function () {
                        mobileMenu.classList.add('hidden');
                        document.body.classList.remove('overflow-hidden');
                    });
                });

                // Back to top button
                const backToTopButton = document.getElementById('backToTop');

                window.addEventListener('scroll', function () {
                    if (window.pageYOffset > 300) {
                        backToTopButton.classList.remove('opacity-0');
                        backToTopButton.classList.add('opacity-100');
                    } else {
                        backToTopButton.classList.remove('opacity-100');
                        backToTopButton.classList.add('opacity-0');
                    }
                });

                backToTopButton.addEventListener('click', function () {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });

                // Smooth scrolling for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();

                        const targetId = this.getAttribute('href');
                        const targetElement = document.querySelector(targetId);

                        if (targetElement) {
                            window.scrollTo({
                                top: targetElement.offsetTop - 80, // Adjust for fixed header
                                behavior: 'smooth'
                            });
                        }
                    });
                });

                // Active nav link highlighting
                const sections = document.querySelectorAll('section[id]');
                const navLinks = document.querySelectorAll('header nav a');

                window.addEventListener('scroll', function () {
                    let current = '';

                    sections.forEach(section => {
                        const sectionTop = section.offsetTop - 100;
                        const sectionHeight = section.offsetHeight;

                        if (window.pageYOffset >= sectionTop && window.pageYOffset < sectionTop + sectionHeight) {
                            current = section.getAttribute('id');
                        }
                    });

                    navLinks.forEach(link => {
                        link.classList.remove('text-blue-500');
                        link.classList.add('text-gray-700');

                        if (link.getAttribute('href') === `#${current}`) {
                            link.classList.remove('text-gray-700');
                            link.classList.add('text-blue-500');
                        }
                    });
                });
            });
        </script>

        <style>
            .circle-1 {
                animation: float 8s ease-in-out infinite;
            }

            .circle-2 {
                animation: float 12s ease-in-out infinite;
            }

            .circle-3 {
                animation: float 10s ease-in-out infinite;
            }

            .circle-4 {
                animation: float 14s ease-in-out infinite;
            }

            .circle-5 {
                animation: float 9s ease-in-out infinite;
            }

            .shape-1 {
                clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
                animation: float-rotate 15s linear infinite;
            }

            .shape-2 {
                clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
                animation: float-rotate 15s linear infinite;
                animation-delay: -5s;
            }

            .shape-3 {
                clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
                animation: float-rotate 15s linear infinite;
                animation-delay: -10s;
            }

            .shape-4 {
                animation: float-rotate 15s linear infinite;
                animation-delay: -3s;
            }

            @keyframes float {
                0% {
                    transform: translateY(0) translateX(0);
                }

                50% {
                    transform: translateY(-20px) translateX(10px);
                }

                100% {
                    transform: translateY(0) translateX(0);
                }
            }

            @keyframes float-rotate {
                0% {
                    transform: translateY(0) rotate(0deg);
                }

                50% {
                    transform: translateY(-15px) rotate(180deg);
                }

                100% {
                    transform: translateY(0) rotate(360deg);
                }
            }
        </style>
</body>

</html>
