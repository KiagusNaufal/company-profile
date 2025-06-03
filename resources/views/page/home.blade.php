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
<section class="py-12 sm:py-16 bg-blue-50 scroll-reveal-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative scroll-reveal-item">
        <!-- Title -->
        <div class="text-center md:text-left">
            <h2 class="text-sm font-semibold text-[#04b2f7] uppercase mb-2">{{ __('message.home.projects.pre_title') }}</h2>
            <p class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">
                {{ __('message.home.projects.title') }} <br class="hidden sm:block">
                {{ __('message.home.projects.title2') }}
            </p>
        </div>

        <!-- Carousel Wrapper -->
<div class="relative group scroll-reveal-item">
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
  <section class="py-12 sm:py-16 bg-white relative overflow-hidden scroll-reveal-section">
        <!-- Header -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-8 sm:mb-12">
            <p class="text-[#04b2f7] font-bold text-sm mb-2 tracking-wider">WHAT THEY SAY</p>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-gray-900 leading-tight">
                Our Partners' Kind Words
            </h2>
        </div>

        <!-- Carousel Wrapper - Fixed for Mobile -->
        <div id="testimonialCarousel" class="relative max-w-4xl mx-auto px-4 sm:px-6 scroll-reveal-item">
            <!-- Slides Container -->
            <div class="overflow-hidden px-2 py-4 sm:py-6 scroll-reveal-item">
                <div id="slides" class="flex transition-transform duration-500 ease-out items-stretch">
                    <!-- Slide 1 -->
                    <div class="flex-none testimonial-slide w-full sm:w-2/3 lg:w-1/2 px-2 sm:px-3 scroll-reveal-item">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                            <!-- Profile Photo -->
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
                    <div class="flex-none testimonial-slide w-full sm:w-2/3 lg:w-1/2 px-2 sm:px-3 scroll-reveal-item">
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
                    <div class="flex-none testimonial-slide w-full sm:w-2/3 lg:w-1/2 px-2 sm:px-3 scroll-reveal-item">
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

            <!-- Navigation Buttons - Hidden on Mobile -->
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

            <!-- Dots - Different for Mobile -->
            <div class="flex justify-center gap-2 mt-8">
                <span class="dot hidden sm:inline-block w-6 h-1.5 bg-[#04b2f7] rounded-full cursor-pointer transition-all duration-300" data-index="0"></span>
                <span class="dot hidden sm:inline-block w-3 h-1.5 bg-gray-200 rounded-full cursor-pointer transition-all duration-300" data-index="1"></span>
                <span class="dot hidden sm:inline-block w-3 h-1.5 bg-gray-200 rounded-full cursor-pointer transition-all duration-300" data-index="2"></span>
                
                <!-- Mobile dots -->
                <span class="dot-mobile sm:hidden inline-block w-3 h-3 bg-[#04b2f7] rounded-full cursor-pointer mx-1" data-index="0"></span>
                <span class="dot-mobile sm:hidden inline-block w-3 h-3 bg-gray-200 rounded-full cursor-pointer mx-1" data-index="1"></span>
                <span class="dot-mobile sm:hidden inline-block w-3 h-3 bg-gray-200 rounded-full cursor-pointer mx-1" data-index="2"></span>
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
document.addEventListener('DOMContentLoaded', function() {
            const slides = document.getElementById('slides');
            const totalSlides = slides.children.length;
            let currentIndex = 0;
            let autoSlideInterval;
            let isHovering = false;
            let isDragging = false;
            let startPos = 0;
            let currentTranslate = 0;
            let prevTranslate = 0;
            let animationID;

            // Mobile touch events
            slides.addEventListener('touchstart', touchStart, { passive: false });
            slides.addEventListener('touchend', touchEnd);
            slides.addEventListener('touchmove', touchMove, { passive: false });

            // Mouse events for desktop
            slides.addEventListener('mousedown', mouseDown);
            slides.addEventListener('mouseup', mouseUp);
            slides.addEventListener('mouseleave', mouseLeave);
            slides.addEventListener('mousemove', mouseMove);

            // Calculate slide width based on viewport
            function calculateSlideWidth() {
                if (window.innerWidth < 640) return 85; // 85% width for mobile with some space
                if (window.innerWidth < 1024) return 100 / 1.5; // 1.5 slides visible on tablet
                return 50; // 2 slides visible on desktop
            }

            function updateCarousel() {
                const slideWidth = calculateSlideWidth();
                slides.style.transform = `translateX(-${currentIndex * slideWidth}%)`;

                // Update dots
                document.querySelectorAll('.dot, .dot-mobile').forEach((dot, i) => {
                    const isActive = i === currentIndex;
                    if (dot.classList.contains('dot')) {
                        dot.classList.toggle('bg-[#04b2f7]', isActive);
                        dot.classList.toggle('bg-gray-200', !isActive);
                        dot.classList.toggle('w-6', isActive);
                        dot.classList.toggle('w-3', !isActive);
                    } else {
                        // Mobile dots
                        dot.classList.toggle('bg-[#04b2f7]', isActive);
                        dot.classList.toggle('bg-gray-200', !isActive);
                    }
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

            // Touch event handlers
            function touchStart(e) {
                if (window.innerWidth >= 640) return;
                startPos = e.touches[0].clientX;
                isDragging = true;
                animationID = requestAnimationFrame(animation);
                slides.classList.add('grabbing');
                stopAutoSlide();
            }

            function touchEnd() {
                if (window.innerWidth >= 640) return;
                isDragging = false;
                cancelAnimationFrame(animationID);
                slides.classList.remove('grabbing');
                
                const movedBy = currentTranslate - prevTranslate;
                if (movedBy < -100 && currentIndex < totalSlides - 1) {
                    nextSlide();
                } else if (movedBy > 100 && currentIndex > 0) {
                    prevSlide();
                }
                
                startAutoSlide();
            }

            function touchMove(e) {
                if (!isDragging || window.innerWidth >= 640) return;
                e.preventDefault();
                const currentPosition = e.touches[0].clientX;
                currentTranslate = prevTranslate + currentPosition - startPos;
            }

            // Mouse event handlers
            function mouseDown(e) {
                if (window.innerWidth < 640) return;
                startPos = e.clientX;
                isDragging = true;
                animationID = requestAnimationFrame(animation);
                slides.classList.add('grabbing');
                stopAutoSlide();
            }

            function mouseUp() {
                if (window.innerWidth < 640) return;
                isDragging = false;
                cancelAnimationFrame(animationID);
                slides.classList.remove('grabbing');
                
                const movedBy = currentTranslate - prevTranslate;
                if (movedBy < -100 && currentIndex < totalSlides - 1) {
                    nextSlide();
                } else if (movedBy > 100 && currentIndex > 0) {
                    prevSlide();
                }
                
                startAutoSlide();
            }

            function mouseLeave() {
                if (window.innerWidth < 640) return;
                isDragging = false;
                cancelAnimationFrame(animationID);
            }

            function mouseMove(e) {
                if (!isDragging || window.innerWidth < 640) return;
                e.preventDefault();
                const currentPosition = e.clientX;
                currentTranslate = prevTranslate + currentPosition - startPos;
            }

            function animation() {
                if (!isDragging) return;
                slides.style.transform = `translateX(${currentTranslate}px)`;
                animationID = requestAnimationFrame(animation);
            }

            // Auto-slide functionality
            function startAutoSlide() {
                if (!isHovering && window.innerWidth >= 640) {
                    autoSlideInterval = setInterval(nextSlide, 5000);
                }
            }

            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }

            // Event listeners for buttons
            document.getElementById('nextBtn_testimonial')?.addEventListener('click', () => {
                stopAutoSlide();
                nextSlide();
                startAutoSlide();
            });

            document.getElementById('prevBtn_testimonial')?.addEventListener('click', () => {
                stopAutoSlide();
                prevSlide();
                startAutoSlide();
            });

            // Dot navigation
            document.querySelectorAll('.dot, .dot-mobile').forEach(dot => {
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
    </script>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
