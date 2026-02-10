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
            --primary-green: #2d5a4a;
            --cream: #f5f3ee;
            --accent-yellow: #f5d547;
            --soft-white: #ffffff;
        }
        
        body {
            font-family: 'Newsreader', serif;
        }
        
        /* Navbar Styles */
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
        
        /* Mobile Menu */
        .mobile-menu-button {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            color: var(--primary-green);
        }
        
        .mobile-menu {
            display: none;
        }
        
        /* Footer Styles */
        .footer {
            background: var(--primary-green);
            color: white;
            padding: 4rem 2rem 2rem;
        }
        
        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .footer-brand {
            font-family: 'Crimson Text', serif;
            font-size: 4rem;
            font-weight: 700;
            font-style: italic;
            margin-bottom: 1rem;
            line-height: 1;
        }
        
        .footer-tagline {
            font-size: 1.1rem;
            font-style: italic;
            margin-bottom: 0.5rem;
            opacity: 0.9;
        }
        
        .footer-description {
            font-size: 0.95rem;
            opacity: 0.8;
            max-width: 600px;
            margin-bottom: 3rem;
            line-height: 1.7;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 3rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        
        .footer-column h4 {
            font-family: 'Crimson Text', serif;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .footer-column ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-column ul li {
            margin-bottom: 0.7rem;
        }
        
        .footer-column ul li a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .footer-column ul li a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .footer-bottom {
            padding-top: 2rem;
            text-align: center;
            font-size: 0.85rem;
            opacity: 0.7;
        }
        
        @media (max-width: 968px) {
            .navbar-menu {
                display: none;
            }
            
            .mobile-menu-button {
                display: block;
            }
            
            .mobile-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--soft-white);
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                padding: 1rem 2rem;
            }
            
            .mobile-menu.active {
                display: block;
            }
            
            .mobile-menu ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }
            
            .mobile-menu ul li {
                padding: 0.8rem 0;
                border-bottom: 1px solid #e0e0e0;
            }
            
            .mobile-menu ul li:last-child {
                border-bottom: none;
            }
            
            .mobile-menu ul li a {
                color: var(--primary-green);
                text-decoration: none;
                font-size: 1rem;
                display: block;
            }
            
            .mobile-menu .navbar-cta {
                display: block;
                text-align: center;
                margin-top: 1rem;
            }
            
            .footer-brand {
                font-size: 2.5rem;
            }
            
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }
        
        @media (max-width: 640px) {
            .footer-content {
                grid-template-columns: 1fr;
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
                <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a></li>
                <li><a href="{{ route('accommodation') }}" class="{{ request()->routeIs('accommodation') ? 'active' : '' }}">Lodging</a></li>
                <li><a href="{{ route('articles') }}" class="{{ request()->routeIs('articles') ? 'active' : '' }}">Article</a></li>
            </ul>
            
            <a href="{{ route('contact') }}" class="navbar-cta">Contact Us</a>
            
            <!-- Mobile Menu Button -->
            <button class="mobile-menu-button" id="mobile-menu-button">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobile-menu">
            <ul>
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a></li>
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
            <div>
                <h2 class="footer-brand">Cuilan Swargi</h2>
                <p class="footer-tagline">Nature That Heals, Moment That Stay</p>
                <p class="footer-description">
                    Escape the noise and rediscover the serenity of nature at Cuilan Swargi
                </p>
            </div>
            
            <div class="footer-content">
                <div class="footer-column">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('accommodation') }}">Lodging</a></li>
                        <li><a href="{{ route('articles') }}">Article</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>Contact</h4>
                    <ul>
                        <li><a href="https://maps.google.com/?q=Sumberbening+Garut+8A+Baturraden" target="_blank">Sumberbening Garut 8A</a></li>
                        <li><a href="https://maps.google.com/?q=Baturraden+Banyumas" target="_blank">Baturraden, Banyumas</a></li>
                        <li><a href="mailto:info@cuilanswargi.com">info@cuilanswargi.com</a></li>
                        <li><a href="tel:+6281234567890">+62 812 3456 7890</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Safety Guide</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>Follow Us</h4>
                    <ul>
                        <li><a href="https://instagram.com/cuilanswargi" target="_blank">Instagram</a></li>
                        <li><a href="https://facebook.com/cuilanswargi" target="_blank">Facebook</a></li>
                        <li><a href="https://twitter.com/cuilanswargi" target="_blank">Twitter</a></li>
                        <li><a href="https://youtube.com/@cuilanswargi" target="_blank">YouTube</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>©{{ date('Y') }} Cuilan Swargi. All rights reserved</p>
            </div>
        </div>
    </footer>
    
    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('active');
                });
            }
        });
    </script>
</body>
</html>