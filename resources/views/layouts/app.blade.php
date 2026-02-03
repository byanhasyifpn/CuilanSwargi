<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Cuilan Swargi</title>
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
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-primary shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-white">
                    Cuilan Swargi
                </a>
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('home') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('home') ? 'text-secondary' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('gallery') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('gallery') ? 'text-secondary' : '' }}">
                        Galeri
                    </a>
                    <a href="{{ route('accommodation') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('accommodation') ? 'text-secondary' : '' }}">
                        Penginapan
                    </a>
                    <a href="{{ route('articles') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('articles') || request()->routeIs('article.detail') ? 'text-secondary' : '' }}">
                        Artikel
                    </a>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <a href="{{ route('home') }}" class="block py-2 text-white hover:text-secondary">Beranda</a>
                <a href="{{ route('gallery') }}" class="block py-2 text-white hover:text-secondary">Galeri</a>
                <a href="{{ route('accommodation') }}" class="block py-2 text-white hover:text-secondary">Penginapan</a>
                <a href="{{ route('articles') }}" class="block py-2 text-white hover:text-secondary">Artikel</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-primary text-white mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-2">Cuilan Swargi</h3>
                <p class="text-secondary">Wisata Alam Terbaik di Banyumas</p>
                <p class="mt-4 text-sm">&copy; {{ date('Y') }} Cuilan Swargi. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>