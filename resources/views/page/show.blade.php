@extends('layout.header')

@section('content')
<!-- Detail Produk Section -->
<section class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Gallery Produk -->
            <div class="space-y-4">
                <!-- Gambar Utama dengan Zoom -->
                <div class="relative rounded-xl overflow-hidden bg-gray-100 shadow-lg" id="zoom-container">
                    <img src="{{ secure_asset('storage/' . $project->image) }}" alt="{{ $project->name }}" 
                         class="w-full h-auto object-cover aspect-square cursor-zoom-in"
                         id="mainImage"
                         data-zoom-image="{{ secure_asset('storage/' . $project->image) }}">
                </div>
                
                <!-- Expanded Gallery with Navigation -->
                <div class="relative">
                    <div class="flex overflow-x-auto space-x-4 py-4 scrollbar-hide" id="thumbnailSlider">
                        <!-- Main Image Thumbnail -->
                        <div class="flex-none cursor-pointer border-2 border-blue-400 rounded-lg transition-all thumbnail active">
                            <img src="{{ secure_asset('storage/' . $project->image) }}" 
                                 class="w-24 h-24 object-cover rounded-md"
                                 onclick="changeMainImage(this, '{{ secure_asset('storage/' . $project->image) }}')">
                        </div>
                        
                        <!-- Image Slides from image_slide array -->
                        @if(!empty($project->image_slide))
                            @foreach($project->image_slide as $image)
                                <div class="flex-none cursor-pointer border-2 border-transparent hover:border-blue-400 rounded-lg transition-all thumbnail">
                                    <img src="{{ secure_asset('storage/' . $image) }}" 
                                         class="w-24 h-24 object-cover rounded-md"
                                         onclick="changeMainImage(this, '{{ secure_asset('storage/' . $image) }}')">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    
                    <!-- Navigation arrows -->
                    <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg -ml-4 z-10 slider-prev hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg -mr-4 z-10 slider-next hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
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
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $project->name }}</h1>
                    <span class="inline-block mt-2 px-3 py-1 text-xs font-semibold rounded-full {{ $project->badge_color }}">
                        {{ $project->kategori->name }}
                    </span>
                </div>

                <!-- Harga -->

                <!-- Deskripsi -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('show.description') }}</h3>
                    <div class="prose max-w-none text-gray-600">
                        {!! nl2br(e($project->description)) !!}
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ $project->link_sub }}"
                        class="flex-1 px-6 py-3 bg-[#04b2f7] hover:bg-[#0388c4] text-white font-medium rounded-lg shadow-md transition-colors flex items-center justify-center">
                         <span class="mr-2">{{ __('show.buy') }}</span>
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
                    </a>
                    
                    <button class="flex-1 px-6 py-3 border border-gray-300 bg-white hover:bg-gray-50 text-gray-700 font-medium rounded-lg shadow-md transition-colors flex items-center justify-center" id="tellUsButton" data-toggle="contact-modal">
                        <span class="mr-2">{{ __('show.contact') }}</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">{{ __('show.related') }}</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($relatedProjects as $related)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <a href="{{ route('project.detail', ['id' => $related->id, 'slug' => Str::slug($related->name)]) }}">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ secure_asset('storage/' . $related->image) }}" alt="{{ $related->name }}" 
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $related->name }}</h3>
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
    document.addEventListener('DOMContentLoaded', function() {
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');
        const slider = document.getElementById('thumbnailSlider');
        const prevBtn = document.querySelector('.slider-prev');
        const nextBtn = document.querySelector('.slider-next');
        const zoomContainer = document.getElementById('zoom-container');
        
        // Initialize variables for slider
        let scrollAmount = 0;
        const scrollStep = 200;
        let isDragging = false;
        let startX, scrollLeft;
        
        // Change main image function
        window.changeMainImage = function(element, fullSizeUrl) {
            // Update main image
            mainImage.src = element.src;
            mainImage.setAttribute('data-zoom-image', fullSizeUrl);
            
            // Update active thumbnail
            thumbnails.forEach(thumb => {
                thumb.classList.remove('border-blue-400', 'active');
                thumb.classList.add('border-transparent');
            });
            element.parentElement.classList.add('border-blue-400', 'active');
            element.parentElement.classList.remove('border-transparent');
            
            // Reset zoom container
            zoomContainer.classList.remove('cursor-zoom-out');
            zoomContainer.classList.add('cursor-zoom-in');
            mainImage.style.transform = 'scale(1)';
        };
        
        // Slider navigation
        nextBtn.addEventListener('click', function() {
            const maxScroll = slider.scrollWidth - slider.clientWidth;
            scrollAmount = Math.min(scrollAmount + scrollStep, maxScroll);
            slider.scrollTo({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
        
        prevBtn.addEventListener('click', function() {
            scrollAmount = Math.max(scrollAmount - scrollStep, 0);
            slider.scrollTo({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
        
        // Make slider draggable
        slider.addEventListener('mousedown', (e) => {
            isDragging = true;
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
            slider.style.cursor = 'grabbing';
        });
        
        slider.addEventListener('mouseleave', () => {
            isDragging = false;
            slider.style.cursor = 'grab';
        });
        
        slider.addEventListener('mouseup', () => {
            isDragging = false;
            slider.style.cursor = 'grab';
        });
        
        slider.addEventListener('mousemove', (e) => {
            if(!isDragging) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 2;
            slider.scrollLeft = scrollLeft - walk;
        });
        
        // Simple zoom functionality
        zoomContainer.addEventListener('click', function() {
            if (this.classList.contains('cursor-zoom-in')) {
                // Zoom in
                this.classList.remove('cursor-zoom-in');
                this.classList.add('cursor-zoom-out');
                mainImage.style.transform = 'scale(2)';
                mainImage.style.transformOrigin = 'center center';
            } else {
                // Zoom out
                this.classList.remove('cursor-zoom-out');
                this.classList.add('cursor-zoom-in');
                mainImage.style.transform = 'scale(1)';
            }
        });
        
        // Touch support for slider
        let touchStartX = 0;
        let touchScrollLeft = 0;
        
        slider.addEventListener('touchstart', (e) => {
            touchStartX = e.touches[0].pageX;
            touchScrollLeft = slider.scrollLeft;
        }, {passive: true});
        
        slider.addEventListener('touchmove', (e) => {
            const x = e.touches[0].pageX;
            const walk = (x - touchStartX) * 2;
            slider.scrollLeft = touchScrollLeft - walk;
        }, {passive: false});
    });
</script>

<style>
    /* Custom scrollbar hiding */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    /* Smooth transitions for images */
    #mainImage {
        transition: transform 0.3s ease;
    }
    
    /* Thumbnail active state */
    .thumbnail.active {
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
    }
    
    /* Zoom cursor */
    .cursor-zoom-in {
        cursor: zoom-in;
    }
    .cursor-zoom-out {
        cursor: zoom-out;
    }
</style>
@endsection