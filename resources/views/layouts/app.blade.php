<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Cuilan Swargi</title>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
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
        @import url('https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400&family=Newsreader:ital,opsz,wght@0,6..72,300;0,6..72,400;0,6..72,500;1,6..72,300;1,6..72,400&display=swap');
        
        :root {
            --primary-green: #2E514B;
            --cream: #f5f3ee;
            --accent-yellow: #f5d547;
            --soft-white: #ffffff;
        }
        
        body {
            font-family: 'Newsreader', serif;
        }
        
        /* Navbar - Desktop */
        .navbar {
            background-color: #2E514B;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Crimson Text', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-green);
            text-decoration: none;
        }
        
        .navbar-logo img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .navbar-menu {
            display: flex;
            gap: 2.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .navbar-menu a {
            color: white;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 400;
            position: relative;
            transition: all 0.3s ease;
            letter-spacing: 0.3px;
            padding-bottom: 5px;
        }
        
        .navbar-menu a:hover {
            color: #FBF7CA;
        }
        
        .navbar-menu a.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #FBF7CA;
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from {
                width: 0;
                left: 50%;
            }
            to {
                width: 100%;
                left: 0;
            }
        }
        
        .navbar-cta {
            background-color: #FBF7CA;
            color: var(--primary-green);
            padding: 0.6rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .navbar-cta:hover {
            background-color: #D5D1A4;
            transform: translateY(-2px);
        }
        
        /* Mobile Menu Button */
        .mobile-menu-button {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            color: white;
        }
        
        /* Mobile Menu Dropdown */
        .mobile-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #2E514B;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            padding: 1rem 0;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        .mobile-menu.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        
        .mobile-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .mobile-menu ul li {
            padding: 0;
        }
        
        .mobile-menu ul li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            display: block;
            padding: 1rem 2rem;
            transition: background 0.3s ease;
        }
        
        .mobile-menu ul li a:hover,
        .mobile-menu ul li a.active {
            background-color: rgba(251, 247, 202, 0.1);
            color: #FBF7CA;
        }
        
        .mobile-menu .navbar-cta {
            display: block;
            text-align: center;
            margin: 1rem 2rem 0.5rem;
        }

        
        /* Footer Styles - More Compact */
.footer {
    background: #2E514B;
    color: white;
    padding: 3rem 2rem 1.5rem; /* lebih pendek */
}

.footer-container {
    max-width: 1400px;
    margin: 0 auto;
}

.footer-top {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 3rem; /* lebih kecil */
    margin-bottom: 2rem; /* lebih kecil */
}

.footer-left {
    max-width: 420px; /* sedikit lebih ramping */
}

.footer-logo {
    width: 60px; /* lebih kecil */
    height: 60px;
    margin-bottom: 1rem;
    border-radius: 50%;
}

.footer-title {
    font-family: 'Crimson Text', serif;
    font-size: 1.6rem; /* lebih kecil */
    font-weight: 400;
    line-height: 1.3;
    margin-bottom: 0.8rem;
}

.footer-desc {
    font-size: 0.9rem;
    opacity: 0.85;
    line-height: 1.5;
}

.footer-links {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem; /* lebih rapat */
}

.footer-column h4 {
    font-size: 0.95rem;
    margin-bottom: 0.9rem;
}

.footer-column ul li {
    margin-bottom: 0.6rem; /* lebih rapat */
}

.footer-column ul li a {
    font-size: 0.85rem;
}

.footer-bottom-custom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1.2rem; /* lebih kecil */
    border-top: 1px solid rgba(255, 255, 255, 0.15);
    font-size: 0.85rem;
}
        
        /* ========================================
   RESPONSIVE BREAKPOINTS (FINAL CLEAN)
======================================== */

/* ========================================
   TABLET (1024px and below)
======================================== */
@media (max-width: 1024px) {

    /* Navbar */
    .navbar {
        padding: 0.875rem 1.5rem;
    }

    .navbar-logo img {
        width: 55px;
        height: 55px;
    }

    .navbar-menu {
        gap: 2rem;
    }

    .navbar-menu a {
        font-size: 0.9rem;
    }

    .navbar-cta {
        padding: 0.5rem 1.25rem;
        font-size: 0.85rem;
    }

    /* Footer */
    .footer {
        padding: 2.5rem 1.5rem 1.25rem;
    }

    .footer-top {
        grid-template-columns: 1fr;
        gap: 2rem;
        margin-bottom: 1.5rem;
    }

    .footer-links {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }
}


/* ========================================
   MOBILE (768px and below)
======================================== */
@media (max-width: 768px) {

    /* Navbar */
    .navbar {
        padding: 0.75rem 1rem;
    }

    .navbar-logo img {
        width: 50px;
        height: 50px;
    }

    .navbar-menu,
    .navbar-cta.desktop {
        display: none;
    }

    .mobile-menu-button {
        display: block;
    }

    /* Footer (COMPACT VERSION) */
    .footer {
        padding: 2rem 1rem 1rem;
    }

    .footer-logo {
        width: 50px;
        height: 50px;
        margin-bottom: 0.75rem;
    }

    .footer-title {
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
    }

    .footer-desc {
        font-size: 0.85rem;
        line-height: 1.4;
    }

    .footer-top {
        gap: 1.5rem;
        margin-bottom: 1.25rem;
    }

    .footer-links {
        grid-template-columns: 1fr;
        gap: 1.25rem;
    }

    .footer-column h4 {
        font-size: 0.9rem;
        margin-bottom: 0.6rem;
    }

    .footer-column ul li {
        margin-bottom: 0.5rem;
    }

    .footer-column ul li a {
        font-size: 0.8rem;
    }

    .footer-bottom-custom {
        flex-direction: column;
        gap: 0.25rem;
        text-align: center;
        font-size: 0.75rem;
        padding-top: 0.8rem;
    }
}


/* ========================================
   SMALL MOBILE (480px and below)
======================================== */
@media (max-width: 480px) {

    .navbar {
        padding: 0.625rem 0.875rem;
    }

    .navbar-logo img {
        width: 45px;
        height: 45px;
    }

    .mobile-menu-button svg {
        width: 24px;
        height: 24px;
    }

    .footer {
        padding: 1.75rem 0.875rem 0.75rem;
    }

    .footer-title {
        font-size: 1.15rem;
    }

    .footer-desc {
        font-size: 0.8rem;
    }

    .footer-bottom-custom {
        font-size: 0.7rem;
    }
}
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ route('home') }}" class="navbar-logo">
                <img src="{{ asset('images/logocuilanswargi.png') }}" alt="Cuilan Swargi Logo">
            </a>
            
            <ul class="navbar-menu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Galery</a></li>
                <li><a href="{{ route('accommodation') }}" class="{{ request()->routeIs('accommodation') ? 'active' : '' }}">Lodging</a></li>
                <li><a href="{{ route('articles') }}" class="{{ request()->routeIs('articles') ? 'active' : '' }}">Article</a></li>
            </ul>
            
            <a href="https://wa.me/628112994568" class="navbar-cta desktop">Contact Us</a>
            
            <!-- Mobile Menu Button -->
            <button class="mobile-menu-button" id="mobile-menu-button" aria-label="Toggle menu">
                <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobile-menu">
            <ul>
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Galery</a></li>
                <li><a href="{{ route('accommodation') }}" class="{{ request()->routeIs('accommodation') ? 'active' : '' }}">Lodging</a></li>
                <li><a href="{{ route('articles') }}" class="{{ request()->routeIs('articles') ? 'active' : '' }}">Article</a></li>
            </ul>
            <a href="{{ route('contact') }}" class="navbar-cta">Contact Us</a>
        </div>
    </nav>
    
    <!-- Content -->
    @yield('content')
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">

            <!-- Top Section -->
            <div class="footer-top">
                
                <!-- Left Side -->
                <div class="footer-left">
                    <img src="{{ asset('images/logocuilanswargi.png') }}" 
                         alt="Cuilan Swargi Logo"
                         class="footer-logo">

                    <h2 class="footer-title">
                        Nature That Heals, Moment That Stay
                    </h2>

                    <p class="footer-desc">
                        Escape the noise and enjoy the serenity of nature at Cuilan Swargi
                    </p>
                </div>

                <!-- Right Side -->
                <div class="footer-links">

                    <div class="footer-column">
                        <h4>Navigation</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('gallery') }}">Galery</a></li>
                            <li><a href="{{ route('accommodation') }}">Lodging</a></li>
                            <li><a href="{{ route('articles') }}">Article</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>Follow us</h4>
                        <ul>
                            <li><a href="https://www.instagram.com/cuilanswargi" target="_blank">Instagram</a></li>
                            <li><a href="https://www.youtube.com/@CuilanSwargi" target="_blank">Youtube</a></li>
                            <li><a href="https://www.tiktok.com/@cuilanswargi" target="_blank">Tiktok</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>Contact us</h4>
                        <ul>
                            <li><a href="https://www.instagram.com/cuilanswargi" target="_blank">Instagram</a></li>
                            <li><a href="mailto:info@cuilanswargi.com">Email</a></li>
                            <li><a href="https://wa.me/6281234567890" target="_blank">Whatsapp</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Bottom Section -->
            <div class="footer-bottom-custom">
                <p>©2026 Cuilan Swargi.</p>
                <p>All rights reserved</p>
            </div>

        </div>
    </footer>

    
    <script>
        // Mobile menu toggle with smooth animation
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('active');
                });
                
                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    const isClickInsideMenu = mobileMenu.contains(event.target);
                    const isClickOnButton = mobileMenuButton.contains(event.target);
                    
                    if (!isClickInsideMenu && !isClickOnButton && mobileMenu.classList.contains('active')) {
                        mobileMenu.classList.remove('active');
                    }
                });
                
                // Close mobile menu when clicking on a link
                const mobileMenuLinks = mobileMenu.querySelectorAll('a');
                mobileMenuLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.remove('active');
                    });
                });
            }
        });
    </script>
</body>
</html>