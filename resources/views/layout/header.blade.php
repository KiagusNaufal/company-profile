<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Company Profile')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  
<style type="text/tailwindcss">
    @layer utilities {
        .slide-down {
            max-height: 999px;
            padding-top: 0.5rem; /* Tambahkan padding top saat menu terbuka */
        }

        .slide-up {
            max-height: 0;
            overflow: hidden;
            padding-top: 0; /* Pastikan padding top 0 saat menu tertutup */
        }

        .transition-slide {
            transition: max-height 0.3s ease-in-out, padding-top 0.3s ease-in-out;
        }
    }

    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

@stack('styles')
</head>
<body class="bg-white">

  <!-- Navbar -->
  <div class="z-50 py-4 w-full flex items-center justify-center text-sm border-b border-gray-200 bg-white fixed top-0 left-0">
    <div class="w-[1440px] max-w-[90%] flex justify-between items-center">
      <!-- Logo -->
      <div class="flex items-center">
        <img src="" alt="Logo" class="w-[100px] min-[800px]:w-[158px] h-[41px] object-left" />
      </div>

      <!-- Desktop Menu -->
      <div class="hidden min-[800px]:flex gap-8 items-center">
        <a href="{{ url('/') }}" id="nav-home" class="group py-4 transition duration-200 hover:-translate-y-1 text-[#343C3C]">
          <span class="text-sm">Home</span>
        </a>
        <a href="{{ url('/service') }}" id="nav-service" class="group py-4 transition duration-200 hover:-translate-y-1 text-[#343C3C]">
          <span class="text-sm">Service</span>
        </a>
        <a href="{{ url('/about') }}" id="nav-about" class="group py-4 transition duration-200 hover:-translate-y-1 text-[#343C3C]">
          <span class="text-sm">About Us</span>
        </a>
        <a href="{{ url('/works') }}" id="nav-works" class="group py-4 transition duration-200 hover:-translate-y-1 text-[#343C3C]">
          <span class="text-sm">Works</span>
        </a>
        <a href="{{ url('/contact') }}" class="ml-6 group rounded-lg border border-[#343C3C] text-[#343C3C] px-6 py-4 transition hover:border-gray-900 hover:bg-gray-50">
          Tell Us
        </a>
      </div>

      <!-- Mobile Menu Button -->
      <div class="min-[800px]:hidden">
        <button id="menu-toggle" class="text-gray-600 hover:text-gray-800 focus:outline-none">
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
  <div id="mobile-menu" class="slide-up transition-slide px-4 min-[800px]:hidden bg-white fixed top-16 left-0 right-0 shadow-md">
    <div class="container mx-auto">
      <a href="{{ url('/') }}" id="nav-home-m" class="block py-3 text-sm text-[#343C3C] border-b border-gray-100">Home</a>
      <a href="{{ url('/service') }}" id="nav-service-m" class="block py-3 text-sm text-[#343C3C] border-b border-gray-100">Service</a>
      <a href="{{ url('/about') }}" id="nav-about-m" class="block py-3 text-sm text-[#343C3C] border-b border-gray-100">About Us</a>
      <a href="{{ url('/works') }}" id="nav-works-m" class="block py-3 text-sm text-[#343C3C] border-b border-gray-100">Works</a>
      <a href="{{ url('/contact') }}" class="block py-3 text-sm text-[#343C3C] mt-2 mb-2 text-center rounded hover:bg-gray-50 bg-gray-100">Tell Us</a>
    </div>
  </div>

  <!-- Page Content -->
  <div class="mt-20"> <!-- Tambahkan margin top untuk konten utama -->
    @yield('content')
  </div>

  <!-- Scripts -->
  <script>
    // Toggle Mobile Menu Slide
    const toggleBtn = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    toggleBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('slide-up');
      mobileMenu.classList.toggle('slide-down');
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

  @stack('scripts')
</body>
</html>