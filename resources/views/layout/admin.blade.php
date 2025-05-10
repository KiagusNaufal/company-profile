<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Aplikasi Saya</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
<script src="//unpkg.com/alpinejs" defer></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#04b2f7',
                        'primary-dark': '#0399d9',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('styles')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar-link {
            transition: all 0.2s ease;
        }
        .sidebar-link:hover {
            background-color: rgba(4, 178, 247, 0.1);
            transform: translateX(4px);
        }
        .sidebar-link.active {
            background-color: rgba(4, 178, 247, 0.2);
            border-left: 4px solid #04b2f7;
        }
        .dropdown-enter {
            max-height: 0;
            opacity: 0;
        }
        .dropdown-enter-active {
            max-height: 200px;
            opacity: 1;
            transition: all 0.3s ease;
        }
        .dropdown-exit {
            max-height: 200px;
            opacity: 1;
        }
        .dropdown-exit-active {
            max-height: 0;
            opacity: 0;
            transition: all 0.3s ease;
        }
    </style>

</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Desktop Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-white border-r border-gray-200">
                <div class="flex items-center justify-center h-20 px-6 bg-white border-b border-gray-200">
                    <img src="{{ asset('image/company.svg') }}" alt="Logo" class="h-10">
                    <span class="ml-3 text-xl font-bold text-primary">Aplikasi</span>
                </div>
                <div class="flex flex-col flex-grow px-4 py-6 overflow-y-auto">
                    <nav class="space-y-2">
                        <!-- Menu Item -->
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg sidebar-link  @if(Route::is('dashboard')) active @endif">
                            <i class="fas fa-tachometer-alt mr-3 text-primary"></i>
                            <span class="text-gray-700">Dashboard</span>
                        </a>
                        
                        <a href="}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg sidebar-link ">
                            <i class="fas fa-users mr-3 text-primary"></i>
                            <span class="text-gray-700">Pengguna</span>
                        </a>
                        
                        <a href="{{ route('produk') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg sidebar-link @if(Route::is('produk')) active @endif">
                            <i class="fas fa-boxes mr-3 text-primary"></i>
                            <span class="text-gray-700">Produk</span>
                        </a>
                        
                        <!-- Dropdown Menu -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 text-sm font-medium rounded-lg sidebar-link">
                                <div class="flex items-center">
                                    <i class="fas fa-cog mr-3 text-primary"></i>
                                    <span class="text-gray-700">Pengaturan</span>
                                </div>
                                <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="{ 'transform rotate-180': open }"></i>
                            </button>
                            <div x-show="open" x-transition:enter="dropdown-enter" x-transition:enter-start="dropdown-enter" x-transition:enter-end="dropdown-enter-active"
                                x-transition:leave="dropdown-exit" x-transition:leave-start="dropdown-exit" x-transition:leave-end="dropdown-exit-active"
                                class="mt-1 ml-10 space-y-1">
                                <a href="" class="block px-4 py-2 text-sm rounded-lg hover:bg-primary hover:bg-opacity-10 text-gray-600">Profil</a>
                                <a href="" class="block px-4 py-2 text-sm rounded-lg hover:bg-primary hover:bg-opacity-10 text-gray-600">Keamanan</a>
                            </div>
                        </div>
                    </nav>
                    
                    <!-- Bottom Section -->
                    <div class="mt-auto">
                        <div class="px-4 py-3 text-sm text-gray-500 border-t border-gray-200">
                            <div class="font-medium text-gray-700">{{ Auth::user()->name }}</div>
                            <div>{{ Auth::user()->email }}</div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center w-full px-4 py-3 mt-2 text-sm font-medium rounded-lg sidebar-link text-gray-700">
                                <i class="fas fa-sign-out-alt mr-3 text-primary"></i>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Sidebar -->
        <div x-data="{ mobileMenuOpen: false }" class="md:hidden">
            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = true" class="fixed z-50 p-3 m-2 text-white bg-primary rounded-full shadow-lg">
                <i class="fas fa-bars"></i>
            </button>
            
            <!-- Mobile Sidebar Overlay -->
            <div x-show="mobileMenuOpen" class="fixed inset-0 z-40 bg-black bg-opacity-50" @click="mobileMenuOpen = false"></div>
            
            <!-- Mobile Sidebar Content -->
            <div x-show="mobileMenuOpen" class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform transition-transform duration-300 ease-in-out">
                <div class="flex items-center justify-between h-20 px-6 bg-white border-b border-gray-200">
                    <div class="flex items-center">
                        <img src="{{ asset('image/company.svg') }}" alt="Logo" class="h-8">
                        <span class="ml-3 text-lg font-bold text-primary">Aplikasi</span>
                    </div>
                    <button @click="mobileMenuOpen = false" class="p-1 rounded-md hover:bg-gray-100">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>
                <div class="px-2 py-4 overflow-y-auto h-[calc(100%-5rem)]">
                    <nav class="space-y-1">
                        <a href="" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg sidebar-link @if(Route::is('dashboard')) active @endif">
                            <i class="fas fa-tachometer-alt mr-3 text-primary"></i>
                            <span class="text-gray-700">Dashboard</span>
                        </a>
                        <a href="" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg sidebar-link @if(Route::is('users.*')) active @endif">
                            <i class="fas fa-users mr-3 text-primary"></i>
                            <span class="text-gray-700">Pengguna</span>
                        </a>
                        <a href="" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg sidebar-link @if(Route::is('products.*')) active @endif">
                            <i class="fas fa-boxes mr-3 text-primary"></i>
                            <span class="text-gray-700">Produk</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-gray-800">@yield('header')</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="relative p-2 text-gray-500 rounded-full hover:bg-gray-100">
                            <i class="fas fa-bell"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                                <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                                <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->avatar_url ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}" alt="Profile">
                                <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                            </button>
                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200">
                                <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary hover:bg-opacity-10">Profil</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-primary hover:bg-opacity-10">Keluar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
                <div class="container mx-auto px-4 py-6">
                    <!-- Flash Messages -->
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg shadow-sm">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span>{{ session('error') }}</span>
                            </div>
                        </div>
                    @endif
                    
                    @yield('content1')
                </div>
            </main>
        </div>
    </div>

    <!-- Alpine JS -->
@stack('scripts')
</body>
</html>