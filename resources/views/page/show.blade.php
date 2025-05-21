@extends('layout.header')

@section('content')
<!-- Detail Produk Section -->
<section class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Gallery Produk -->
            <div class="space-y-4">
                <!-- Gambar Utama -->
                <div class="rounded-xl overflow-hidden bg-gray-100 shadow-lg">
                    <img src="{{ secure_asset('storage/' . cetak($project->image)) }}" alt="{{ cetak($project->name) }}" 
                         class="w-full h-auto object-cover aspect-square"
                         id="mainImage">
                </div>
                
                <!-- Thumbnail Gallery -->
                <div class="grid grid-cols-4 gap-3">
                    @foreach(($project->images ?? []) as $image)
                    <div class="cursor-pointer border-2 border-transparent hover:border-blue-400 rounded-lg transition-all thumbnail">
                        <img src="{{ secure_asset('storage/' . cetak($image)) }}" 
                             class="w-full h-20 object-cover rounded-md"
                             onclick="document.getElementById('mainImage').src = this.src">
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Info Produk -->
            <div class="lg:sticky lg:top-4">
                <!-- Breadcrumb -->
                <nav class="flex mb-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/" class="text-sm text-gray-700 hover:text-blue-600">Home</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 mx-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <a href="{{ route('works') }}" class="text-sm text-gray-700 hover:text-blue-600 ml-1">Projects</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 mx-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="text-sm text-gray-500 ml-1 font-medium">{{ $project->name }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Judul dan Kategori -->
                <div class="mb-4">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ cetak($project->name) }}</h1>
                    <span class="inline-block mt-2 px-3 py-1 text-xs font-semibold rounded-full {{ cetak($project->badge_color) }}">
                        {{ cetak($project->kategori->name) }}
                    </span>
                </div>

                <!-- Harga -->
                <div class="mb-6">
                    <span class="text-3xl font-bold text-gray-900">Rp {{ number_format(cetak($project->price, 0, ',', '.')) }}</span>
                </div>

                <!-- Deskripsi -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('show.description') }}</h3>
                    <div class="prose max-w-none text-gray-600">
                        {!! nl2br(e($project->description)) !!}
                    </div>
                </div>

                <!-- Pain Points Section -->
                @if($project->pain_description || $project->pain_points)
                <div class="mb-6 bg-red-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-red-800 mb-2">{{ __('show.pain') }}</h3>
                    @if($project->pain_description)
                    <div class="prose max-w-none text-red-700 mb-3">
                        {!! nl2br(e($project->pain_description)) !!}
                    </div>
                    @endif
                    @if($project->pain_points)
                    <ul class="list-disc pl-5 space-y-1 text-red-700">
                        @foreach($project->pain_points as $point)
                        <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endif

                <!-- Gain Points Section -->
                @if($project->gain_description || $project->gain_points)
                <div class="mb-6 bg-green-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-green-800 mb-2">{{ __('show.gain') }}</h3>
                    @if($project->gain_description)
                    <div class="prose max-w-none text-green-700 mb-3">
                        {!! nl2br(e($project->gain_description)) !!}
                    </div>
                    @endif
                    @if($project->gain_points)
                    <ul class="list-disc pl-5 space-y-1 text-green-700">
                        @foreach($project->gain_points as $point)
                        <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endif

                <!-- Solution Section -->
                @if($project->solution_description || $project->solution_points)
                <div class="mb-6 bg-blue-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-blue-800 mb-2">{{ __('show.solution') }}</h3>
                    @if($project->solution_description)
                    <div class="prose max-w-none text-blue-700 mb-3">
                        {!! nl2br(e($project->solution_description)) !!}
                    </div>
                    @endif
                    @if($project->solution_points)
                    <ul class="list-disc pl-5 space-y-1 text-blue-700">
                        @foreach($project->solution_points as $point)
                        <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endif

                <!-- Tombol Aksi -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <button data-id="{{ cetak($project->id) }}"
                            data-name="{{ cetak($project->name) }}"
                            data-price="{{ cetak($project->price) }}"
                            class="buy-now-btn flex-1 px-6 py-3 bg-[#04b2f7] hover:bg-[#0388c4] text-white font-medium rounded-lg shadow-md transition-colors flex items-center justify-center">
                        <span class="mr-2">{{ __('show.buy') }}</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </button>
                    
                    <button class="flex-1 px-6 py-3 border border-gray-300 bg-white hover:bg-gray-50 text-gray-700 font-medium rounded-lg shadow-md transition-colors flex items-center justify-center">
                        <span class="mr-2">{{ __('show.contact') }}</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- <!-- Detail Tambahan -->
        <div class="mt-16 pt-8 border-t border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Detail Produk</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Spesifikasi -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Spesifikasi Teknis</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <ul class="space-y-3">
                            @foreach($project->specifications as $spec)
                            <li class="flex justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-600 font-medium">{{ $spec['name'] }}</span>
                                <span class="text-gray-900">{{ $spec['value'] }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <!-- Dokumentasi -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Dokumentasi</h3>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($project->documentations as $doc)
                        <a href="{{ secure_asset('storage/' . $doc) }}" target="_blank" class="border rounded-lg p-3 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 truncate">Document {{ $loop->iteration }}</p>
                                    <p class="text-xs text-gray-500">PDF</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>

<!-- Related Projects -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">{{ __('show.related') }}</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($relatedProjects as $related)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <a href="{{ route('project.detail', ['id' => cetak($related->id), 'slug' => Str::slug(cetak($related->name))]) }}">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ secure_asset('storage/' . cetak($related->image)) }}" alt="{{ cetak($related->name) }}" 
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ cetak($related->name) }}</h3>
                        <p class="text-[#04b2f7] font-medium">Rp {{ number_format(cetak($related->price, 0, ',', '.')) }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<x-cta-section></x-cta-section>

<!-- Payment Modal -->
@include('partials.form-pembayaran')

<script>
    // Implementasi zoom gambar
    document.addEventListener('DOMContentLoaded', function() {
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');
        
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                mainImage.src = this.src;
                thumbnails.forEach(t => t.classList.remove('border-blue-400'));
                this.classList.add('border-blue-400');
            });
        });
        
        // Implementasi modal pembelian
    });
</script>
@endsection