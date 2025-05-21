@extends('layout.header')

<style type="text/tailwindcss">
    @media (max-width: 640px) {
        .hero-buttons {
            flex-direction: column;
            width: 100%;
        }

        .hero-buttons button {
            width: 100%;
        }
    }
</style>
@section('content')
    {{-- Hero Content --}}
    <section class="border-b border-gray-200 bg-gradient-to-r from-blue-50 to-white">
        <div
            class="container mx-auto flex flex-col-reverse lg:flex-row items-center px-4 sm:px-6 lg:px-8 xl:px-12 scroll-reveal-hero">
            <!-- Text Content -->
            <div class="w-full lg:w-1/2 py-8 sm:py-12 lg:py-16 xl:py-20 px-4 sm:px-6 lg:px-8 xl:px-12">
                <div class="max-w-2xl mx-auto lg:mx-0 space-y-4 sm:space-y-6">
                    <h1 class="text-2xl sm:text-4xl lg:text-5xl font-bold leading-tight text-gray-900">
                        {{ __('message.home.hero.title_line1') }}<br>
                        <span class="text-[#04b2f7]">{{ __('message.home.hero.title_line2') }}</span>
                    </h1>

                    <p class="text-sm sm:text-lg text-gray-600 leading-relaxed">
                        {{ __('message.home.hero.subtitle') }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-2 hero-buttons w-full">
                        <button type="button" id="tellUsButton" data-toggle="contact-modal"
                            class="bg-[#04b2f7] hover:bg-[#0388c4] text-white font-medium px-4 sm:px-6 py-2.5 sm:py-3 rounded-lg transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg text-sm sm:text-base w-full sm:w-auto">
                            {{ __('message.home.hero.button_primary') }}
                        </button>
                        <button type="button" id="tellUsButton" data-toggle="contact-modal"
                            class="border-2 border-[#04b2f7] text-[#04b2f7] hover:bg-[#04b2f7] hover:text-white font-medium px-4 sm:px-6 py-2.5 sm:py-3 rounded-lg transition-all duration-300 flex items-center justify-center gap-2 text-sm sm:text-base w-full sm:w-auto">
                            {{ __('message.home.hero.button_secondary') }} <span class="transition-transform duration-300 group-hover:translate-x-1">→</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end p-4 sm:p-6 lg:p-8">
                <div class="relative w-full max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl">
                    <img src="{{ secure_asset('image/company.svg') }}" alt="Hero Image"
                        class="w-full h-auto rounded-xl object-contain drop-shadow-xl" loading="eager" width="600"
                        height="600">
                </div>
            </div>
        </div>
    </section>

    <x-marquee></x-marquee>

    <x-services></x-services>

    <!-- Projects Section -->
<section class="py-12 sm:py-16 bg-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <!-- Title -->
        <div class="text-center md:text-left">
            <h2 class="text-sm font-semibold text-[#04b2f7] uppercase mb-2">{{ __('message.home.projects.pre_title') }}</h2>
            <p class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">
                {{ __('message.home.projects.title') }} <br class="hidden sm:block">
                {{ __('message.home.projects.title2') }}
            </p>
        </div>

        <!-- Carousel Wrapper -->
<div class="relative group">
    <div id="carousel" class="overflow-x-auto snap-x snap-mandatory flex space-x-4 md:space-x-6 scrollbar-none scroll-smooth [&::-webkit-scrollbar]:hidden pb-4 cursor-grab active:cursor-grabbing">
        @foreach ($products as $project)
            <div class="flex-none w-[85vw] sm:w-96 md:w-[420px] bg-white rounded-2xl shadow-lg snap-start select-none">
                <div class="flex flex-col h-full gap-4 sm:gap-6 border rounded-2xl bg-white overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <!-- Thumbnail -->
                    <div class="relative aspect-video w-full overflow-hidden rounded-t-2xl border-b border-gray-200">
                        <img src="{{ secure_asset('storage/' . cetak($project->image)) }}" alt="{{ cetak($project->title) }} Thumbnail"
                            class="w-full h-full object-cover object-center transition-transform duration-500 hover:scale-105"
                            loading="lazy"
                            onerror="this.style.display='none'; this.parentElement.classList.add('bg-gray-100')">

                        <!-- Fallback if image fails to load -->
                        <div class="absolute inset-0 bg-gray-100 flex items-center justify-center hidden">
                            <svg class="w-8 h-8 sm:w-12 sm:h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <div class="p-4 sm:p-6 flex-1 flex flex-col">
                        <!-- Project Title -->
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2 sm:mb-3 line-clamp-2">
                            {{ cetak($project->name) }}
                        </h3>

                        <!-- Description -->
                        <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 line-clamp-3 flex-1">
                            {{ cetak($project->description) }}
                        </p>

                        <!-- Read More -->
                       <a href="{{ route('project.detail', ['id' => cetak($project->id), 'slug' => Str::slug(cetak($project->name))]) }}" 
                   class="flex-1 inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    {{ __('works.card.view_details') }}
                    <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                    </svg>
                </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <!-- Navigation arrows (optional) -->
    <button id="prevBtn" class="hidden md:flex absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow-md z-10 transition-all duration-300 opacity-0 group-hover:opacity-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button id="nextBtn" class="hidden md:flex absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow-md z-10 transition-all duration-300 opacity-0 group-hover:opacity-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</div>
        </div>
    </div>
</section>
  <section class="py-12 sm:py-16 bg-white relative overflow-hidden">
    <!-- Header -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-8 sm:mb-12">
        <p class="text-[#04b2f7] font-bold text-sm mb-2 tracking-wider">WHAT THEY SAY</p>
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-gray-900 leading-tight">
            Our Partners' Kind Words
        </h2>
    </div>

    <!-- Carousel Wrapper -->
<div id="testimonialCarousel" class="relative max-w-4xl mx-auto px-4 sm:px-6">
    <!-- Slides Container -->
    <div class="overflow-hidden px-2 py-4 sm:py-6">
        <div id="slides" class="flex transition-transform duration-500 ease-out items-stretch">
            <!-- Slide 1 -->
            <div class="flex-none w-full sm:w-2/3 lg:w-1/2 px-2 sm:px-3">
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                    <!-- Profile Photo - Larger and at top -->
                    <div class="flex flex-col items-center pt-6 px-6">
                        <div class="relative">
                            <img src="{{ secure_asset('image/user.svg') }}" alt="Muhammad Ivandry"
                                class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                            <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                        </div>
                        <div class="text-center mt-4">
                            <p class="font-bold text-gray-800 text-lg sm:text-xl">Muhammad Ivandry</p>
                            <p class="text-sm sm:text-base text-gray-600">Pasker ID | Pranata Komputer</p>
                        </div>
                    </div>
                    
                    <!-- Testimonial Content -->
                    <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                        <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                            "Tim yang kompeten dan profesional. Komunikasi lancar, solusi kreatif, dan hasil
                            kerja berkualitas membuat saya sangat puas dengan layanan mereka."
                        </p>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="flex-none w-full sm:w-2/3 lg:w-1/2 px-2 sm:px-3">
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                    <!-- Profile Photo -->
                    <div class="flex flex-col items-center pt-6 px-6">
                        <div class="relative">
                            <img src="{{ secure_asset('image/user.svg') }}" alt="Nindiastuti"
                                class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                            <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                        </div>
                        <div class="text-center mt-4">
                            <p class="font-bold text-gray-800 text-lg sm:text-xl">Nindiastuti</p>
                            <p class="text-sm sm:text-base text-gray-600">PT Grafindo Media Pratama | Department Head</p>
                        </div>
                    </div>
                    
                    <!-- Testimonial Content -->
                    <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                        <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                            "Sejauh ini Aeratek cukup adaptif di saat ada perubahan yang kami minta sehubungan
                            dengan kondisi terkini. Responsif dalam mengelola isu yang disampaikan."
                        </p>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="flex-none w-full sm:w-2/3 lg:w-1/2 px-2 sm:px-3">
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                    <!-- Profile Photo -->
                    <div class="flex flex-col items-center pt-6 px-6">
                        <div class="relative">
                            <img src="{{ secure_asset('image/user.svg') }}" alt="Shaka"
                                class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                            <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                        </div>
                        <div class="text-center mt-4">
                            <p class="font-bold text-gray-800 text-lg sm:text-xl">Shaka</p>
                            <p class="text-sm sm:text-base text-gray-600">Staf Admin IT Darmasiswa</p>
                        </div>
                    </div>
                    
                    <!-- Testimonial Content -->
                    <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                        <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                            "Respon admin Aeratek baik dan dapat memahami permintaan dari Admin BKHM. Memiliki
                            backup web staging dan pelayanan di luar jam kerja."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <button id="prevBtn_testimonial"
        class="hidden sm:flex absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-50 z-20 transition-all duration-300 hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#04b2f7]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <button id="nextBtn_testimonial"
        class="hidden sm:flex absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 bg-[#04b2f7] p-2 rounded-full shadow-lg text-white hover:bg-[#0388c4] z-20 transition-all duration-300 hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    <!-- Dots -->
    <div class="flex justify-center gap-2 mt-8">
        <span class="dot w-6 h-1.5 bg-[#04b2f7] rounded-full cursor-pointer transition-all duration-300" data-index="0"></span>
        <span class="dot w-3 h-1.5 bg-gray-200 rounded-full cursor-pointer transition-all duration-300" data-index="1"></span>
        <span class="dot w-3 h-1.5 bg-gray-200 rounded-full cursor-pointer transition-all duration-300" data-index="2"></span>
    </div>
</div>
</section>

    <x-cta-section></x-cta-section>

    <script>
        // Testimonial Carousel
        document.addEventListener('DOMContentLoaded', function() {
        const slides = document.getElementById('slides');
        const totalSlides = slides.children.length;
        let currentIndex = 0;
        let autoSlideInterval;
        let isHovering = false;

        // Calculate slide width based on viewport
        function calculateSlideWidth() {
            if (window.innerWidth < 640) return 100; // Full width on mobile
            if (window.innerWidth < 1024) return 100 / 1.5; // 1.5 slides visible on tablet
            return 50; // 2 slides visible on desktop
        }

        function updateCarousel() {
            const slideWidth = calculateSlideWidth();
            slides.style.transform = `translateX(-${currentIndex * slideWidth}%)`;

            // Update dots
            document.querySelectorAll('.dot').forEach((dot, i) => {
                const isActive = i === currentIndex;
                dot.classList.toggle('bg-[#04b2f7]', isActive);
                dot.classList.toggle('bg-gray-200', !isActive);
                dot.classList.toggle('w-6', isActive);
                dot.classList.toggle('w-3', !isActive);
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateCarousel();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateCarousel();
        }

        // Auto-slide functionality
        function startAutoSlide() {
            if (!isHovering) {
                autoSlideInterval = setInterval(nextSlide, 5000);
            }
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        // Event listeners
        document.getElementById('nextBtn_testimonial').addEventListener('click', () => {
            stopAutoSlide();
            nextSlide();
            startAutoSlide();
        });

        document.getElementById('prevBtn_testimonial').addEventListener('click', () => {
            stopAutoSlide();
            prevSlide();
            startAutoSlide();
        });

        document.querySelectorAll('.dot').forEach(dot => {
            dot.addEventListener('click', () => {
                stopAutoSlide();
                currentIndex = parseInt(dot.dataset.index);
                updateCarousel();
                startAutoSlide();
            });
        });

        // Pause on hover
        const carousel = document.getElementById('testimonialCarousel');
        carousel.addEventListener('mouseenter', () => {
            isHovering = true;
            stopAutoSlide();
        });
        carousel.addEventListener('mouseleave', () => {
            isHovering = false;
            startAutoSlide();
        });

        // Handle responsive changes
        window.addEventListener('resize', () => {
            updateCarousel();
        });

        // Initialize
        updateCarousel();
        startAutoSlide();
    });
            // Projects Carousel
document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('carousel');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let isDown = false;
    let startX;
    let scrollLeft;
    let velocity = 0;
    let animationFrame;
    let autoSlideInterval;
    let isHovering = false;
    const autoSlideDelay = 2000; // 5 seconds
    const friction = 0.95;

    // Initialize auto-slide
    function startAutoSlide() {
        stopAutoSlide(); // Clear any existing interval
        autoSlideInterval = setInterval(() => {
            if (!isDown && !isHovering) {
                nextSlide();
            }
        }, autoSlideDelay);
    }

    function stopAutoSlide() {
        if (autoSlideInterval) {
            clearInterval(autoSlideInterval);
        }
    }

    function nextSlide() {
        const cardWidth = carousel.querySelector('.flex-none').offsetWidth;
        const gap = parseInt(getComputedStyle(carousel).gap) || 16;
        const itemWidth = cardWidth + gap;
        const maxScroll = carousel.scrollWidth - carousel.clientWidth;
        const currentScroll = carousel.scrollLeft;
        
        if (currentScroll >= maxScroll - 10) {
            // If at the end, scroll back to start
            carousel.scrollTo({
                left: 0,
                behavior: 'smooth'
            });
        } else {
            // Scroll to next item
            const nextPosition = Math.min(currentScroll + itemWidth, maxScroll);
            carousel.scrollTo({
                left: nextPosition,
                behavior: 'smooth'
            });
        }
    }

    function prevSlide() {
        const cardWidth = carousel.querySelector('.flex-none').offsetWidth;
        const gap = parseInt(getComputedStyle(carousel).gap) || 16;
        const itemWidth = cardWidth + gap;
        const currentScroll = carousel.scrollLeft;
        
        if (currentScroll <= 10) {
            // If at the start, scroll to end
            const maxScroll = carousel.scrollWidth - carousel.clientWidth;
            carousel.scrollTo({
                left: maxScroll,
                behavior: 'smooth'
            });
        } else {
            // Scroll to previous item
            const prevPosition = Math.max(currentScroll - itemWidth, 0);
            carousel.scrollTo({
                left: prevPosition,
                behavior: 'smooth'
            });
        }
    }

    // Mouse/touch events
    carousel.addEventListener('mousedown', (e) => {
        isDown = true;
        startX = e.pageX - carousel.offsetLeft;
        scrollLeft = carousel.scrollLeft;
        carousel.classList.add('active');
        cancelAnimationFrame(animationFrame);
        stopAutoSlide();
    });

    carousel.addEventListener('mouseleave', () => {
        if (!isDown) return;
        isDown = false;
        carousel.classList.remove('active');
        startMomentumTracking();
    });

    carousel.addEventListener('mouseup', () => {
        if (!isDown) return;
        isDown = false;
        carousel.classList.remove('active');
        startMomentumTracking();
        startAutoSlide();
    });

    carousel.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - carousel.offsetLeft;
        const walk = (x - startX) * 2.5;
        const prevScrollLeft = carousel.scrollLeft;
        carousel.scrollLeft = scrollLeft - walk;
        velocity = carousel.scrollLeft - prevScrollLeft;
    });

    // Touch events
    carousel.addEventListener('touchstart', (e) => {
        isDown = true;
        startX = e.touches[0].pageX - carousel.offsetLeft;
        scrollLeft = carousel.scrollLeft;
        cancelAnimationFrame(animationFrame);
        stopAutoSlide();
    }, { passive: false });

    carousel.addEventListener('touchend', () => {
        if (!isDown) return;
        isDown = false;
        startMomentumTracking();
        startAutoSlide();
    });

    carousel.addEventListener('touchmove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.touches[0].pageX - carousel.offsetLeft;
        const walk = (x - startX) * 2.5;
        const prevScrollLeft = carousel.scrollLeft;
        carousel.scrollLeft = scrollLeft - walk;
        velocity = carousel.scrollLeft - prevScrollLeft;
    }, { passive: false });

    // Momentum animation
    function startMomentumTracking() {
        cancelAnimationFrame(animationFrame);
        momentum();
    }

    function momentum() {
        velocity *= friction;
        if (Math.abs(velocity) > 0.5) {
            carousel.scrollLeft += velocity;
            animationFrame = requestAnimationFrame(momentum);
        }
    }

    // Snap to nearest card on scroll end
    let scrollTimeout;
    carousel.addEventListener('scroll', () => {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            if (!isDown) {
                const cardWidth = carousel.querySelector('.flex-none').offsetWidth;
                const gap = parseInt(getComputedStyle(carousel).gap) || 16;
                const itemWidth = cardWidth + gap;
                const scrollPosition = carousel.scrollLeft;
                const activeIndex = Math.round(scrollPosition / itemWidth);
                carousel.scrollTo({
                    left: activeIndex * itemWidth,
                    behavior: 'smooth'
                });
            }
        }, 100);
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        const cardWidth = carousel.querySelector('.flex-none').offsetWidth;
        const gap = parseInt(getComputedStyle(carousel).gap) || 16;
        const itemWidth = cardWidth + gap;
        const scrollPosition = carousel.scrollLeft;
        const activeIndex = Math.round(scrollPosition / itemWidth);
        carousel.scrollTo({
            left: activeIndex * itemWidth,
            behavior: 'auto'
        });
    });

    // Navigation buttons
    if (prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => {
            stopAutoSlide();
            prevSlide();
            startAutoSlide();
        });

        nextBtn.addEventListener('click', () => {
            stopAutoSlide();
            nextSlide();
            startAutoSlide();
        });
    }

    // Pause auto-slide on hover
    carousel.addEventListener('mouseenter', () => {
        isHovering = true;
        stopAutoSlide();
    });

    carousel.addEventListener('mouseleave', () => {
        isHovering = false;
        startAutoSlide();
    });

    // Start auto-slide on load
    startAutoSlide();
});
    </script>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
