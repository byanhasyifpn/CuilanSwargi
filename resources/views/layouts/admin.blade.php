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
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-primary text-white">
            <div class="p-6">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
                <p class="text-secondary text-sm">Cuilan Swargi</p>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-link group block px-6 py-3 transition-all duration-300 relative overflow-hidden {{ request()->routeIs('admin.dashboard') ? 'bg-primary/80 border-l-4 border-secondary' : '' }}">
                    <span class="absolute inset-0 bg-secondary/10 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="relative flex items-center">
                        <svg class="w-5 h-5 mr-3 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="group-hover:translate-x-1 transition-transform duration-300">Dashboard</span>
                    </span>
                </a>
                
                <a href="{{ route('admin.gallery.index') }}" 
                   class="nav-link group block px-6 py-3 transition-all duration-300 relative overflow-hidden {{ request()->routeIs('admin.gallery.*') ? 'bg-primary/80 border-l-4 border-secondary' : '' }}">
                    <span class="absolute inset-0 bg-secondary/10 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="relative flex items-center">
                        <svg class="w-5 h-5 mr-3 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="group-hover:translate-x-1 transition-transform duration-300">Galeri</span>
                    </span>
                </a>
                
                <a href="{{ route('admin.accommodation.index') }}" 
                   class="nav-link group block px-6 py-3 transition-all duration-300 relative overflow-hidden {{ request()->routeIs('admin.accommodation.*') ? 'bg-primary/80 border-l-4 border-secondary' : '' }}">
                    <span class="absolute inset-0 bg-secondary/10 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="relative flex items-center">
                        <svg class="w-5 h-5 mr-3 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="group-hover:translate-x-1 transition-transform duration-300">Penginapan</span>
                    </span>
                </a>
                
                <a href="{{ route('admin.article.index') }}" 
                   class="nav-link group block px-6 py-3 transition-all duration-300 relative overflow-hidden {{ request()->routeIs('admin.article.*') ? 'bg-primary/80 border-l-4 border-secondary' : '' }}">
                    <span class="absolute inset-0 bg-secondary/10 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                    <span class="relative flex items-center">
                        <svg class="w-5 h-5 mr-3 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span class="group-hover:translate-x-1 transition-transform duration-300">Artikel</span>
                    </span>
                </a>
            </nav>
            
            <style>
                .nav-link:hover {
                    box-shadow: inset 4px 0 0 0 #FBF7CA;
                }
                
                .nav-link svg {
                    filter: drop-shadow(0 0 0px transparent);
                }
                
                .nav-link:hover svg {
                    filter: drop-shadow(0 0 4px rgba(251, 247, 202, 0.5));
                }
            </style>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <header class="bg-white shadow">
                <div class="flex justify-between items-center px-8 py-4">
                    <h1 class="text-2xl font-bold text-gray-800">@yield('header')</h1>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" target="_blank" class="text-primary hover:text-primary/80">
                            Lihat Website
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="p-8">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>