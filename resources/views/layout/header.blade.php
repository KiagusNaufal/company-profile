<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Aeratek Global Solution')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ secure_asset('image/logo.svg') }}" type="image/svg+xml">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Sertakan file JavaScript kustom Anda -->
    <script src="{{ secure_asset('js/scrollReveal.js') }}" defer></script>
    <script src="{{ secure_asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ secure_asset('css/index.css') }}">
    <script src="https://app-sandbox.duitku.com/lib/js/duitku.js"></script>
    @stack('styles')
</head>

<body class="bg-white">
    <!-- Navbar -->
    <div class="z-50 py-3 w-full flex items-center justify-center text-sm border-b border-gray-200 bg-white fixed top-0 left-0">
        <div class="w-[1440px] max-w-[90%] flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center h-[50px] min-[800px]:h-[60px]">
                <img src="{{ secure_asset('image/company.svg') }}" alt="Logo"
                    class="object-contain min-[800px]:w-[150px] w-[120px] h-auto">
            </div>

            <!-- Desktop Menu -->
            <div class="hidden min-[800px]:flex gap-6 items-center">
                <a href="{{ url('/') }}" id="nav-home"
                    class="group py-2 transition duration-200 hover:-translate-y-1 text-[#343C3C]">
                    <span class="text-sm"><dd>{{ __('message.Header.home') }}</dd></span>
                </a>
                <a href="{{ url('/service') }}" id="nav-service"
                    class="group py-2 transition duration-200 hover:-translate-y-1 text-[#343C3C]">
                    <span class="text-sm">{{ __('message.Header.services') }}</span>
                </a>
                <a href="{{ url('/about') }}" id="nav-about"
                    class="group py-2 transition duration-200 hover:-translate-y-1 text-[#343C3C]">
                    <span class="text-sm">{{ __('message.Header.about') }}</span>
                </a>
                <a href="{{ url('/works') }}" id="nav-works"
                    class="group py-2 transition duration-200 hover:-translate-y-1 text-[#343C3C]">
                    <span class="text-sm">{{ __('message.Header.works') }}</span>
                </a>
                <button type="button"
                    class="ml-4 group rounded-lg border border-[#343C3C] text-[#343C3C] px-4 py-2 text-sm transition hover:border-gray-900 hover:bg-gray-50"
                    id="tellUsButton" data-toggle="contact-modal">
                    {{ __('message.Header.tellus') }}
                </button>
                
            <!-- Gunakan URL lengkap dengan helper url() -->
<div class="flex border border-[#343C3C] rounded-lg overflow-hidden">
    <a href="{{ url('/locale/id') }}"
        class="px-3 py-1.5 text-sm transition-colors duration-200 flex items-center gap-1.5
               {{ app()->getLocale() === 'id' ? 'bg-[#343C3C] text-white' : 'text-[#343C3C] hover:bg-gray-50' }}">
        <span class="text-xs">🇮🇩</span>
        <span>ID</span>
    </a>
    <div class="h-5 w-px bg-[#343C3C]"></div>
    <a href="{{ url('/locale/en') }}"
        class="px-3 py-1.5 text-sm transition-colors duration-200 flex items-center gap-1.5
               {{ app()->getLocale() === 'en' ? 'bg-[#343C3C] text-white' : 'text-[#343C3C] hover:bg-gray-50' }}">
        <span class="text-xs">🇬🇧</span>
        <span>EN</span>
    </a>
</div>
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
<div id="mobile-menu" class="min-[800px]:hidden bg-white fixed top-[60px] left-0 w-full shadow-md z-40">
            <a href="{{ url('/') }}" id="nav-home-m" class="block py-3 text-sm text-[#343C3C] border-b border-gray-100">{{ __('message.Header.home') }}</a>
            <a href="{{ url('/service') }}" id="nav-service-m" class="block py-3 text-sm text-[#343C3C] border-b border-gray-100">{{ __('message.Header.services') }}</a>
            <a href="{{ url('/about') }}" id="nav-about-m" class="block py-3 text-sm text-[#343C3C] border-b border-gray-100">{{ __('message.Header.about') }}</a>
            <a href="{{ url('/works') }}" id="nav-works-m" class="block py-3 text-sm text-[#343C3C] border-b border-gray-100">{{ __('message.Header.works') }}</a>
            
            <!-- Mobile Language Switcher -->
            <div class="flex justify-center my-4 border-b border-gray-100 pb-3">
                <div class="flex border border-[#343C3C] rounded-lg overflow-hidden">
<a href="{{ route('locale.change', 'id') }}"
                        class="px-3 py-1.5 text-sm transition-colors duration-200 flex items-center gap-1.5
                               {{ app()->getLocale() === 'id' ? 'bg-[#343C3C] text-white' : 'text-[#343C3C] hover:bg-gray-50' }}">
                        <span class="text-xs">🇮🇩</span>
                        <span>ID</span>
                    </a>
                    <div class="h-5 w-px bg-[#343C3C]"></div>
  <a href="{{ route('locale.change', 'en') }}"
                        class="px-3 py-1.5 text-sm transition-colors duration-200 flex items-center gap-1.5
                               {{ app()->getLocale() === 'en' ? 'bg-[#343C3C] text-white' : 'text-[#343C3C] hover:bg-gray-50' }}">
                        <span class="text-xs">🇬🇧</span>
                        <span>EN</span>
                    </a>
                </div>
            </div>
            
            <button type="button"
                class="w-full py-3 text-sm text-white mt-2 mb-2 text-center rounded bg-[#343C3C] hover:bg-opacity-90"
                id="tellUsButtonMobile" data-toggle="contact-modal">
                {{ __('message.Header.tellus') }}
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
    const body = document.body;

    // Function to toggle mobile menu
    function toggleMobileMenu() {
        mobileMenu.classList.toggle('open');
        body.classList.toggle('menu-open');
    }

    // Toggle menu on button click
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleMobileMenu();
        });
    }

    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (mobileMenu.classList.contains('open') && 
            !mobileMenu.contains(e.target) && 
            e.target !== toggleBtn) {
            toggleMobileMenu();
        }
    });

    // Highlight active menu items
    function highlightActiveMenu() {
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
    }

    // Initialize
    highlightActiveMenu();

    // Close menu when clicking on links
    const mobileLinks = document.querySelectorAll('#mobile-menu a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (mobileMenu.classList.contains('open')) {
                toggleMobileMenu();
            }
        });
    });
});

    </script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.min.js"></script>
    @stack('scripts')
</body>
</html>