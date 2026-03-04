<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Cuilan Swargi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2E514B',
                        secondary: '#FBF7CA',
                    }
                }
            }
        }
    </script>
    <style>
        .nav-link svg {
            filter: drop-shadow(0 0 0px transparent);
        }
        .nav-link:hover svg {
            filter: drop-shadow(0 0 4px rgba(251, 247, 202, 0.5));
        }

        /* Sidebar slide transition */
        #sidebar {
            transition: transform 0.3s ease;
        }

        /* Overlay */
        #sidebar-overlay {
            transition: opacity 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- ===== MOBILE OVERLAY ===== -->
    <div id="sidebar-overlay"
         class="fixed inset-0 bg-black/50 z-20 hidden lg:hidden"
         onclick="closeSidebar()">
    </div>

    <div class="flex h-screen overflow-hidden">

        <!-- ===== SIDEBAR ===== -->
        <aside id="sidebar"
       class="fixed top-0 left-0 z-30 h-screen w-64 bg-primary text-white flex-shrink-0
              -translate-x-full lg:translate-x-0 lg:static lg:z-auto">

            <!-- Logo / Title -->
            <div class="flex items-center justify-between p-5 lg:p-6">
                <div>
                    <h2 class="text-xl lg:text-2xl font-bold">Admin Panel</h2>
                    <p class="text-secondary text-xs lg:text-sm">Cuilan Swargi</p>
                </div>
                <!-- Close button (mobile only) -->
                <button onclick="closeSidebar()"
                        class="lg:hidden text-white/80 hover:text-white p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Nav Links -->
            <nav class="mt-2 lg:mt-6">
                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link group block px-5 lg:px-6 py-3 transition-all duration-300 relative overflow-hidden {{ request()->routeIs('admin.dashboard') ? 'bg-primary/80 border-l-4 border-secondary' : '' }}">
                    <span class="absolute inset-0 bg-white/5 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="absolute inset-y-0 left-0 w-1 bg-secondary transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="relative flex items-center">
                        <svg class="w-5 h-5 mr-3 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="group-hover:translate-x-1 transition-transform duration-300">Dashboard</span>
                    </span>
                </a>

                <a href="{{ route('admin.gallery.index') }}"
                   class="nav-link group block px-5 lg:px-6 py-3 transition-all duration-300 relative overflow-hidden {{ request()->routeIs('admin.gallery.*') ? 'bg-primary/80 border-l-4 border-secondary' : '' }}">
                    <span class="absolute inset-0 bg-white/5 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="absolute inset-y-0 left-0 w-1 bg-secondary transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="relative flex items-center">
                        <svg class="w-5 h-5 mr-3 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="group-hover:translate-x-1 transition-transform duration-300">Galeri</span>
                    </span>
                </a>

                <a href="{{ route('admin.accommodation.index') }}"
                   class="nav-link group block px-5 lg:px-6 py-3 transition-all duration-300 relative overflow-hidden {{ request()->routeIs('admin.accommodation.*') ? 'bg-primary/80 border-l-4 border-secondary' : '' }}">
                    <span class="absolute inset-0 bg-white/5 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="absolute inset-y-0 left-0 w-1 bg-secondary transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="relative flex items-center">
                        <svg class="w-5 h-5 mr-3 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="group-hover:translate-x-1 transition-transform duration-300">Penginapan</span>
                    </span>
                </a>

                <a href="{{ route('admin.article.index') }}"
                   class="nav-link group block px-5 lg:px-6 py-3 transition-all duration-300 relative overflow-hidden {{ request()->routeIs('admin.article.*') ? 'bg-primary/80 border-l-4 border-secondary' : '' }}">
                    <span class="absolute inset-0 bg-white/5 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="absolute inset-y-0 left-0 w-1 bg-secondary transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="relative flex items-center">
                        <svg class="w-5 h-5 mr-3 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span class="group-hover:translate-x-1 transition-transform duration-300">Artikel</span>
                    </span>
                </a>

                <a href="{{ route('admin.booking.index') }}"
                   class="nav-link group block px-5 lg:px-6 py-3 transition-all duration-300 relative overflow-hidden {{ request()->routeIs('admin.booking.*') ? 'bg-primary/80 border-l-4 border-secondary' : '' }}">
                    <span class="absolute inset-0 bg-white/5 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="absolute inset-y-0 left-0 w-1 bg-secondary transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="relative flex items-center">
                        <svg class="w-5 h-5 mr-3 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="group-hover:translate-x-1 transition-transform duration-300">Booking</span>
                    </span>
                </a>

                <!-- Lihat Website -->
                <div class="mt-4 border-t border-white/20 pt-4">
                    <a href="{{ route('home') }}"
                    target="_blank"
                    class="nav-link group block px-5 py-3 transition-all duration-300 relative overflow-hidden">
                        <span class="absolute inset-0 bg-white/5 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="absolute inset-y-0 left-0 w-1 bg-secondary transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                        <span class="relative flex items-center">
                            <svg class="w-5 h-5 mr-3 transform group-hover:scale-110 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">
                                Lihat Website
                            </span>
                        </span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- ===== MAIN CONTENT ===== -->
        <div class="flex-1 flex flex-col min-w-0 lg:ml-0 overflow-y-auto">

            <!-- Header -->
            <header class="bg-white shadow sticky top-0 z-10">
                <div class="flex justify-between items-center px-4 sm:px-6 lg:px-8 py-3 sm:py-4">

                    <div class="flex items-center gap-3">
                        <!-- Hamburger (mobile only) -->
                        <button onclick="openSidebar()"
                                class="lg:hidden text-gray-600 hover:text-primary p-1 -ml-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        <h1 class="text-base sm:text-xl lg:text-2xl font-bold text-gray-800 truncate">
                            @yield('header')
                        </h1>
                    </div>

                    <div class="flex items-center gap-2 sm:gap-4">
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                    class="bg-red-500 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded hover:bg-red-600 transition text-xs sm:text-sm whitespace-nowrap">
                                Logout
                            </button>
                        </form>
                    </div>

                </div>
            </header>

            <!-- Content -->
            <main class="p-4 sm:p-6 lg:p-8 flex-1">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm sm:text-base">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm sm:text-base">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>

    </div>

    <script>
        const sidebar  = document.getElementById('sidebar');
        const overlay  = document.getElementById('sidebar-overlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Close sidebar on resize to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    </script>

</body>
</html>