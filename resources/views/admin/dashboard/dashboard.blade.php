@extends('layout.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content1')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Stat Card 1 -->
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-primary">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Pengguna</p>
                <h3 class="text-2xl font-bold mt-1">1,245</h3>
                <div class="mt-2">
                    <span class="text-green-500 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> 12.5%
                    </span>
                    <span class="text-gray-500 text-xs ml-2">vs bulan lalu</span>
                </div>
            </div>
            <div class="p-3 rounded-full bg-primary bg-opacity-10 text-primary">
                <i class="fas fa-users text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Produk</p>
                <h3 class="text-2xl font-bold mt-1">328</h3>
                <div class="mt-2">
                    <span class="text-green-500 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> 5.2%
                    </span>
                    <span class="text-gray-500 text-xs ml-2">vs bulan lalu</span>
                </div>
            </div>
            <div class="p-3 rounded-full bg-green-500 bg-opacity-10 text-green-500">
                <i class="fas fa-boxes text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Stat Card 3 -->
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Pesanan</p>
                <h3 class="text-2xl font-bold mt-1">189</h3>
                <div class="mt-2">
                    <span class="text-red-500 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-down mr-1"></i> 2.3%
                    </span>
                    <span class="text-gray-500 text-xs ml-2">vs bulan lalu</span>
                </div>
            </div>
            <div class="p-3 rounded-full bg-yellow-500 bg-opacity-10 text-yellow-500">
                <i class="fas fa-shopping-cart text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Stat Card 4 -->
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Pendapatan</p>
                <h3 class="text-2xl font-bold mt-1">Rp12.8jt</h3>
                <div class="mt-2">
                    <span class="text-green-500 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> 18.7%
                    </span>
                    <span class="text-gray-500 text-xs ml-2">vs bulan lalu</span>
                </div>
            </div>
            <div class="p-3 rounded-full bg-purple-500 bg-opacity-10 text-purple-500">
                <i class="fas fa-wallet text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Chart 1 -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h4 class="font-semibold text-gray-800">Statistik Pengunjung</h4>
            <div class="flex space-x-2">
                <button class="px-3 py-1 text-xs bg-primary bg-opacity-10 text-primary rounded-lg">Bulanan</button>
                <button class="px-3 py-1 text-xs bg-gray-100 text-gray-500 rounded-lg">Tahunan</button>
            </div>
        </div>
        <div class="h-64">
            <!-- Placeholder for Chart -->
            <div class="flex items-center justify-center h-full bg-gray-50 rounded-lg">
                <div class="text-center text-gray-400">
                    <i class="fas fa-chart-line text-4xl mb-2"></i>
                    <p>Grafik akan ditampilkan di sini</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart 2 -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h4 class="font-semibold text-gray-800">Pendapatan</h4>
            <div class="flex space-x-2">
                <button class="px-3 py-1 text-xs bg-primary bg-opacity-10 text-primary rounded-lg">Bulanan</button>
                <button class="px-3 py-1 text-xs bg-gray-100 text-gray-500 rounded-lg">Tahunan</button>
            </div>
        </div>
        <div class="h-64">
            <!-- Placeholder for Chart -->
            <div class="flex items-center justify-center h-full bg-gray-50 rounded-lg">
                <div class="text-center text-gray-400">
                    <i class="fas fa-chart-bar text-4xl mb-2"></i>
                    <p>Grafik akan ditampilkan di sini</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity & Top Products -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Recent Activity -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6">
        <h4 class="font-semibold text-gray-800 mb-4">Aktivitas Terakhir</h4>
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="flex-shrink-0 mt-1">
                    <div class="h-8 w-8 rounded-full bg-primary bg-opacity-10 text-primary flex items-center justify-center">
                        <i class="fas fa-user-plus text-sm"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium">Pengguna baru "Andi" terdaftar</p>
                    <p class="text-xs text-gray-500 mt-1">10 menit yang lalu</p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="flex-shrink-0 mt-1">
                    <div class="h-8 w-8 rounded-full bg-green-500 bg-opacity-10 text-green-500 flex items-center justify-center">
                        <i class="fas fa-shopping-cart text-sm"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium">Pesanan baru #ORD-1289</p>
                    <p class="text-xs text-gray-500 mt-1">1 jam yang lalu</p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="flex-shrink-0 mt-1">
                    <div class="h-8 w-8 rounded-full bg-purple-500 bg-opacity-10 text-purple-500 flex items-center justify-center">
                        <i class="fas fa-box-open text-sm"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium">Produk "Kursi Ergonomis" diupdate</p>
                    <p class="text-xs text-gray-500 mt-1">3 jam yang lalu</p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="flex-shrink-0 mt-1">
                    <div class="h-8 w-8 rounded-full bg-yellow-500 bg-opacity-10 text-yellow-500 flex items-center justify-center">
                        <i class="fas fa-comment-alt text-sm"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium">Komentar baru dari "Budi"</p>
                    <p class="text-xs text-gray-500 mt-1">5 jam yang lalu</p>
                </div>
            </div>
            
            <a href="#" class="block text-center text-primary text-sm font-medium mt-4 hover:underline">
                Lihat Semua Aktivitas
            </a>
        </div>
    </div>

    <!-- Top Products -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h4 class="font-semibold text-gray-800 mb-4">Produk Terlaris</h4>
        <div class="space-y-4">
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10 rounded-md bg-primary bg-opacity-10 flex items-center justify-center">
                    <i class="fas fa-couch text-primary"></i>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium">Sofa Minimalis</p>
                    <div class="flex items-center justify-between mt-1">
                        <span class="text-xs text-gray-500">32 terjual</span>
                        <span class="text-xs font-medium text-primary">Rp1.250.000</span>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10 rounded-md bg-green-500 bg-opacity-10 flex items-center justify-center">
                    <i class="fas fa-chair text-green-500"></i>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium">Kursi Ergonomis</p>
                    <div class="flex items-center justify-between mt-1">
                        <span class="text-xs text-gray-500">28 terjual</span>
                        <span class="text-xs font-medium text-primary">Rp750.000</span>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10 rounded-md bg-purple-500 bg-opacity-10 flex items-center justify-center">
                    <i class="fas fa-bed text-purple-500"></i>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium">Tempat Tidur King</p>
                    <div class="flex items-center justify-between mt-1">
                        <span class="text-xs text-gray-500">18 terjual</span>
                        <span class="text-xs font-medium text-primary">Rp3.500.000</span>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10 rounded-md bg-yellow-500 bg-opacity-10 flex items-center justify-center">
                    <i class="fas fa-lamp text-yellow-500"></i>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium">Lampu LED</p>
                    <div class="flex items-center justify-between mt-1">
                        <span class="text-xs text-gray-500">15 terjual</span>
                        <span class="text-xs font-medium text-primary">Rp350.000</span>
                    </div>
                </div>
            </div>
            
            <a href="#" class="block text-center text-primary text-sm font-medium mt-4 hover:underline">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Anda bisa menambahkan script untuk chart di sini
    // Contoh menggunakan Chart.js:
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Dashboard ready for chart initialization');
        
        // Contoh inisialisasi chart:
        // const ctx = document.getElementById('myChart').getContext('2d');
        // const myChart = new Chart(ctx, { ... });
    });
</script>
@endsection