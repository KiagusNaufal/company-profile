<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Company Profile')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Sertakan file JavaScript kustom Anda -->
    <script src="//9766-180-244-132-215.ngrok-free.app/js/scrollReveal.js" defer></script>
    <script src="//9766-180-244-132-215.ngrok-free.app/js/index.js" defer></script>
    <link rel="stylesheet" href="//9766-180-244-132-215.ngrok-free.app/css/index.css">
    <script src="{{ asset('js/scrollReveal.js') }}" defer></script>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @stack('styles')
</head>

<body class="bg-white">

    <!-- Navbar -->
    <!-- Navbar -->
    <!-- Navbar -->
    <div
        class="z-50 py-3 w-full flex items-center justify-center text-sm border-b border-gray-200 bg-white fixed top-0 left-0">
        <div class="w-[1440px] max-w-[90%] flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center h-[50px] min-[800px]:h-[60px]">
                <img src="{{ asset('image/company.svg') }}" alt="Logo"
                    class="object-contain min-[800px]:w-[150px] w-[120px] h-auto">
            </div>

            <!-- Desktop Menu -->
            <div class="hidden min-[800px]:flex gap-6 items-center">
                <a href="{{ url('/') }}" id="nav-home"
                    class="group py-2 transition duration-200 hover:-translate-y-1 text-[#343C3C]">
                    <span class="text-sm">Home</span>
                </a>
                <a href="{{ url('/service') }}" id="nav-service"
                    class="group py-2 transition duration-200 hover:-translate-y-1 text-[#343C3C]">
                    <span class="text-sm">Service</span>
                </a>
                <a href="{{ url('/about') }}" id="nav-about"
                    class="group py-2 transition duration-200 hover:-translate-y-1 text-[#343C3C]">
                    <span class="text-sm">About Us</span>
                </a>
                <a href="{{ url('/works') }}" id="nav-works"
                    class="group py-2 transition duration-200 hover:-translate-y-1 text-[#343C3C]">
                    <span class="text-sm">Works</span>
                </a>
                <button type="button"
                    class="ml-4 group rounded-lg border border-[#343C3C] text-[#343C3C] px-4 py-2 text-sm transition hover:border-gray-900 hover:bg-gray-50"
                    id="tellUsButton"
                    data-toggle="contact-modal">
                    Tell Us
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <div class="min-[800px]:hidden">
                <button id="menu-toggle" class="text-gray-600 hover:text-gray-800 focus:outline-none p-2">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="min-[800px]:hidden">
        <div class="container mx-auto">
            <a href="{{ url('/') }}" id="nav-home-m" class="block py-3 text-sm text-[#343C3C]">Home</a>
            <a href="{{ url('/service') }}" id="nav-service-m" class="block py-3 text-sm text-[#343C3C]">Service</a>
            <a href="{{ url('/about') }}" id="nav-about-m" class="block py-3 text-sm text-[#343C3C]">About Us</a>
            <a href="{{ url('/works') }}" id="nav-works-m" class="block py-3 text-sm text-[#343C3C]">Works</a>
            <button type="button"
                class="block w-full py-3 text-sm text-[#343C3C] mt-2 mb-2 text-center rounded hover:bg-gray-50 bg-gray-100"
                id="tellUsButton" data-toggle="contact-modal">
                Tell Us
            </button>
        </div>
    </div>


    <!-- Page Content -->
    <div class="mt-20"> <!-- Tambahkan margin top untuk konten utama -->
        @yield('content')
    </div>

    @include('layout.footer')
    @include('partials.contact-modal')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            // Initialize menu as closed
            mobileMenu.classList.remove('open');

            // Single event listener for toggle
            toggleBtn.addEventListener('click', function(e) {
                e.stopPropagation(); // Prevent triggering document click
                mobileMenu.classList.toggle('open');
            });

            // Close menu when clicking outside
            document.addEventListener('click', function() {
                mobileMenu.classList.remove('open');
            });

            // Prevent menu clicks from closing the menu
            mobileMenu.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
        // Highlight active menu
        let currentPath = window.location.pathname;
        if (currentPath !== '/' && currentPath.endsWith('/')) {
            currentPath = currentPath.slice(0, -1);
        }

        const navItems = {
            '/': 'nav-home',
            '/service': 'nav-service',
            '/about': 'nav-about',
            '/works': 'nav-works'
        };

        const activeId = navItems[currentPath];
        if (activeId) {
            const activeDesktop = document.getElementById(activeId);
            const activeMobile = document.getElementById(activeId + '-m');

            [activeDesktop, activeMobile].forEach(el => {
                if (el) {
                    el.classList.add('text-[#003366]', 'border-b-2', 'border-[#003366]', 'font-semibold');
                    if (el.classList.contains('border-gray-100')) {
                        el.classList.remove('border-gray-100');
                    }
                }
            });
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.min.js"></script>
    @stack('scripts')
</body>

</html>
