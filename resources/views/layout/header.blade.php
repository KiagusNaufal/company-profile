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
<!-- Navbar -->
<div class="z-50 py-3 w-full flex items-center justify-center text-sm border-b border-gray-200 bg-white fixed top-0 left-0">
    <div class="w-[1440px] max-w-[90%] flex justify-between items-center">
      <!-- Logo (Ukuran diperbesar sedikit) -->
      <div class="flex items-center h-[50px] min-[800px]:h-[60px]">
        <img src="{{ asset('image/company.svg') }}" alt="Logo"
             class="object-contain min-[800px]:w-[150px] w-[120px] h-auto">
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

  <div class="z-10 py-4 w-full items-center justify-center bg-gradient-to-t from-[#0e40de] via-[#0e50de] to-[#0e60de]">
    <div class="w-[1440px] max-w-[90%] justify-between items-center m-auto">
        <div class="items-center justify-center">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-3 pt-[64px]">
                <div class="text-white">
                    <p class="font-[600] mb-3">Lorem Ipsum</p>
                    <p class="font[400] mb-6 max-w-[75%]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus pariatur alias placeat molestias</p>
                    <div class="flex gap-2">
                        <a href="https://www.facebook.com">
                            <img src="{{ asset('icons/facebook.svg') }}" alt="fb icon" fetchpriority="high" width="0" height="0"
                            decoding="async" data-nimg="1" class="relative mb-4 w-[21px] h-[21px]" style="color:transparent"
                            >
                        </a>
                        <a href="https://www.instagram.com">
                            <img src="{{ asset('icons/instagram.svg') }}" alt="fb icon" fetchpriority="high" width="0" height="0"
                            decoding="async" data-nimg="1" class="relative mb-4 w-[21px] h-[21px]" style="color:transparent"
                            >
                        </a>
                        <a href="https://www.linkedin.com">
                            <img src="{{ asset('icons/linkedin.svg') }}" alt="fb icon" fetchpriority="high" width="0" height="0"
                            decoding="async" data-nimg="1" class="relative mb-4 w-[21px] h-[21px]" style="color:transparent"
                            >
                        </a>
                    </div>
                </div>
                <div class="text-white">
                    <p class="font-[600] text-[#7f90b7] text-[20px] mb-6">Company</p>
                    <p class="cursor-pointer font-thin mb-4 hover:underline">About Us</p>
                    <p class="cursor-pointer font-thin mb-4 hover:underline">Services</p>
                    <p class="cursor-pointer font-thin mb-4 hover:underline">Portofolio</p>
                    <p class="cursor-pointer font-thin mb-4 hover:underline">Career</p>
                </div>
                <div class="text-white">
                    <p class="font-[600] text-[#7f90b7] text-[20px] mb-6">Contact Us</p>
                    <p class="font-[600] text-[#7f90b7]">Office</p>
                    <a href="https://maps.app.goo.gl/">
                        <p class="font-thin mb-6 hover:underline ">Jl. Arciko Gg Harapan II No 60 Rt 01 Rw 13 Kel Sayang Cianjur,  <br>  Kota Cianjur, Jawa Barat</p>
                    </a>
                    <p class="font-[600] text-[#7f90b7]">Workshop</p>
                    <a href="https://maps.app.goo.gl/">
                        <p class="font-thin  mb-6 hover:underline">Jl. Arciko Gg Harapan II No 60 Rt 01 Rw 13 Kel Sayang Cianjur,  <br>  Kota Cianjur, Jawa Barat</p>
                    </a>
                    <a href="font-thin pb-2 cursor-pointer">
                        <p class="mb-1 hover-underline ">aeratek@gmail.com</p>
                    </a>
                    <a href="https://whatsapp.com">
                        <p class="font-thin mb-6 hover-underline ">+62 878 8231 8231</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center m-auto bg-gradient-to-t from-[#0e10de]  to-[#0e60de]">
            <div class="z-10 w-[1440px] bg-[#0e40de] flex pt-[24px] justify-center">
                <div class="w-full justify-center text-center">
                    <hr class="mx-auto">
                    <p class="text-white text-center mt-3">© 2025 PT Aeratek Global Solution. All Rights Reserved.</p>
                    <span class="text-[#0e60de]">v0.0.0.0</span>
                </div>
            </div>
        </div>
    </div>
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
          el.classList.add('text-[#0e60de]', 'border-b-2', 'border-[#0e60de]', 'font-semibold');
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
