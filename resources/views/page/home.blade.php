@extends('layout.header')

<style type="text/tailwindcss">
    /* Project Carousel Styles */
    #carousel {
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch; /* Untuk smooth scrolling di iOS */
    }
    
    #carousel > div {
        scroll-snap-align: start;
    }
    
    /* Testimonial Carousel Styles */
    #testimonialCarousel {
        position: relative;
        overflow: hidden;
    }

    #slides {
        display: flex;
        transition: transform 0.5s ease;
        will-change: transform;
    }

    .testimonial-slide {
        flex: 0 0 100%;
        min-width: 0;
        padding: 0 10px;
        box-sizing: border-box;
    }

    @media (min-width: 640px) {
        .testimonial-slide {
            flex: 0 0 50%;
        }
    }

    @media (min-width: 1024px) {
        .testimonial-slide {
            flex: 0 0 33.333%;
        }
    }

    .grabbing {
        cursor: grabbing;
        user-select: none;
    }

    /* Dot navigation styles */
    .dot {
        transition: all 0.3s ease;
    }

    .dot-mobile {
        transition: background-color 0.3s ease;
    }
    
    /* Hide scrollbar but allow scrolling */
    .scrollbar-none {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
    
    .scrollbar-none::-webkit-scrollbar {
        display: none;  /* Chrome, Safari, Opera */
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
            <div id="carousel" class="overflow-x-auto snap-x snap-mandatory flex space-x-4 md:space-x-6 scrollbar-none scroll-smooth pb-4">
                @foreach ($products as $project)
                    <div class="flex-none w-[85vw] sm:w-96 md:w-[420px] bg-white rounded-2xl shadow-lg snap-start select-none">
                        <div class="flex flex-col h-full gap-4 sm:gap-6 border rounded-2xl bg-white overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <!-- Thumbnail -->
                            <div class="relative w-full h-55 sm:h-55 md:h-55 overflow-hidden rounded-t-2xl border-b border-gray-200">
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
            
            <!-- Navigation arrows -->
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
</section>
<!-- Testimonial Section -->
<!-- Testimonial Section -->
<section class="py-12 sm:py-16 bg-white relative overflow-hidden">
    <!-- Header -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-8 sm:mb-12">
        <p class="text-[#04b2f7] font-bold text-sm mb-2 tracking-wider">CLIENT TESTIMONIALS</p>
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-gray-900 leading-tight">
            What Our Clients Say About Us
        </h2>
    </div>

    <!-- Carousel Wrapper -->
    <div id="testimonialCarousel" class="relative max-w-6xl mx-auto px-4 sm:px-6">
        <!-- Slides Container -->
        <div class="overflow-hidden px-2 py-4 sm:py-6">
            <div id="slides" class="flex transition-transform duration-500 ease-out">
                <!-- Testimonial 1 (Existing) -->
                <div class="testimonial-slide flex-none w-full sm:w-1/2 lg:w-1/3 px-2 sm:px-3">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                        <div class="flex flex-col items-center pt-6 px-6">
                            <div class="relative">
                                <img src="{{ secure_asset('image/face1.jpeg') }}" alt="Muhammad Ivandry"
                                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                                <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>
                            <div class="text-center mt-4">
                                <p class="font-bold text-gray-800 text-lg sm:text-xl">Muhammad Ivandry</p>
                                <p class="text-sm sm:text-base text-gray-600">Pasker ID | Pranata Komputer</p>
                                <div class="flex justify-center mt-2 text-yellow-400">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                            <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                                "Tim yang kompeten dan profesional. Komunikasi lancar, solusi kreatif, dan hasil kerja berkualitas membuat saya sangat puas dengan layanan mereka."
                            </p>
                            <div class="text-center text-xs text-gray-500">
                                Project: Company Profile Website
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 (Existing) -->
                <div class="testimonial-slide flex-none w-full sm:w-1/2 lg:w-1/3 px-2 sm:px-3">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                        <div class="flex flex-col items-center pt-6 px-6">
                            <div class="relative">
                                <img src="{{ secure_asset('image/face2.jpeg') }}" alt="Nindiastuti"
                                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                                <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>
                            <div class="text-center mt-4">
                                <p class="font-bold text-gray-800 text-lg sm:text-xl">Nindiastuti</p>
                                <p class="text-sm sm:text-base text-gray-600">PT Grafindo Media Pratama | Department Head</p>
                                <div class="flex justify-center mt-2 text-yellow-400">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                            <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                                "Sejauh ini Aeratek cukup adaptif di saat ada perubahan yang kami minta sehubungan dengan kondisi terkini. Responsif dalam mengelola isu yang disampaikan."
                            </p>
                            <div class="text-center text-xs text-gray-500">
                                Project: E-Learning Platform
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-slide flex-none w-full sm:w-1/2 lg:w-1/3 px-2 sm:px-3">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                        <div class="flex flex-col items-center pt-6 px-6">
                            <div class="relative">
                                <img src="{{ secure_asset('image/face6.jpeg') }}" alt="Shaka"
                                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                                <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>
                            <div class="text-center mt-4">
                                <p class="font-bold text-gray-800 text-lg sm:text-xl">Shaka</p>
                                <p class="text-sm sm:text-base text-gray-600">Staf Admin IT Darmasiswa</p>
                                <div class="flex justify-center mt-2 text-yellow-400">
                                    ★ ★ ★ ★ ☆
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                            <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                                "Respon admin Aeratek baik dan dapat memahami permintaan dari Admin BKHM. Memiliki backup web staging dan pelayanan di luar jam kerja."
                            </p>
                            <div class="text-center text-xs text-gray-500">
                                Project: Government Portal
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="testimonial-slide flex-none w-full sm:w-1/2 lg:w-1/3 px-2 sm:px-3">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                        <div class="flex flex-col items-center pt-6 px-6">
                            <div class="relative">
                                <img src="{{ secure_asset('image/face3.jpeg') }}" alt="Jessica Wida"
                                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                                <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>
                            <div class="text-center mt-4">
                                <p class="font-bold text-gray-800 text-lg sm:text-xl">Jessica Wida</p>
                                <p class="text-sm sm:text-base text-gray-600">PT Maju Jaya Abadi | CTO</p>
                                <div class="flex justify-center mt-2 text-yellow-400">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                            <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                                "Pengembangan aplikasi yang dilakukan sangat memuaskan. Tim Aeratek mampu memahami kebutuhan bisnis kami dan menerjemahkannya ke dalam solusi teknologi yang tepat."
                            </p>
                            <div class="text-center text-xs text-gray-500">
                                Project: Inventory Management System
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 5 -->
                <div class="testimonial-slide flex-none w-full sm:w-1/2 lg:w-1/3 px-2 sm:px-3">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                        <div class="flex flex-col items-center pt-6 px-6">
                            <div class="relative">
                                <img src="{{ secure_asset('image/face4.jpeg') }}" alt="Sarah Fitriani"
                                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                                <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>
                            <div class="text-center mt-4">
                                <p class="font-bold text-gray-800 text-lg sm:text-xl">Sarah Fitriani</p>
                                <p class="text-sm sm:text-base text-gray-600">Bintang Media | Marketing Director</p>
                                <div class="flex justify-center mt-2 text-yellow-400">
                                    ★ ★ ★ ★ ☆
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                            <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                                "Kami sangat puas dengan hasil redesign website kami. Traffic meningkat 40% dalam 3 bulan pertama setelah launch. Tim Aeratek sangat memahami kebutuhan branding kami."
                            </p>
                            <div class="text-center text-xs text-gray-500">
                                Project: Website Redesign
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 6 -->
                <div class="testimonial-slide flex-none w-full sm:w-1/2 lg:w-1/3 px-2 sm:px-3">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                        <div class="flex flex-col items-center pt-6 px-6">
                            <div class="relative">
                                <img src="{{ secure_asset('image/face5.jpeg') }}" alt="Siti Putri"
                                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                                <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>
                            <div class="text-center mt-4">
                                <p class="font-bold text-gray-800 text-lg sm:text-xl">Siti Putri</p>
                                <p class="text-sm sm:text-base text-gray-600">Startup Founder | EduTech</p>
                                <div class="flex justify-center mt-2 text-yellow-400">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                            <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                                "Sebagai startup, kami sangat menghargai pendekatan Agile dari Aeratek. Mereka mampu beradaptasi dengan perubahan requirement dan memberikan solusi tepat waktu dengan budget terbatas."
                            </p>
                            <div class="text-center text-xs text-gray-500">
                                Project: MVP Development
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 7 -->
                <div class="testimonial-slide flex-none w-full sm:w-1/2 lg:w-1/3 px-2 sm:px-3">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                        <div class="flex flex-col items-center pt-6 px-6">
                            <div class="relative">
                                <img src="{{ secure_asset('image/face7.jpeg') }}" alt="Dewi Lestari"
                                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                                <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>
                            <div class="text-center mt-4">
                                <p class="font-bold text-gray-800 text-lg sm:text-xl">Dewi Lestari</p>
                                <p class="text-sm sm:text-base text-gray-600">PT Sejahtera Abadi | HR Director</p>
                                <div class="flex justify-center mt-2 text-yellow-400">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                            <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                                "Sistem HRIS yang dikembangkan Aeratek sangat membantu proses rekrutmen dan manajemen karyawan kami. Antarmuka yang user-friendly dan fitur yang lengkap."
                            </p>
                            <div class="text-center text-xs text-gray-500">
                                Project: HR Management System
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 8 -->
                <div class="testimonial-slide flex-none w-full sm:w-1/2 lg:w-1/3 px-2 sm:px-3">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                        <div class="flex flex-col items-center pt-6 px-6">
                            <div class="relative">
                                <img src="{{ secure_asset('image/face8.jpeg') }}" alt="Budi Santoso"
                                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                                <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>
                            <div class="text-center mt-4">
                                <p class="font-bold text-gray-800 text-lg sm:text-xl">Budi Santoso</p>
                                <p class="text-sm sm:text-base text-gray-600">Restoran Sederhana | Owner</p>
                                <div class="flex justify-center mt-2 text-yellow-400">
                                    ★ ★ ★ ★ ☆
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                            <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                                "Aplikasi POS yang dibuat Aeratek sangat membantu operasional restoran kami. Proses order menjadi lebih cepat dan laporan keuangan lebih akurat."
                            </p>
                            <div class="text-center text-xs text-gray-500">
                                Project: Point of Sale System
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 9 -->
                <div class="testimonial-slide flex-none w-full sm:w-1/2 lg:w-1/3 px-2 sm:px-3">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                        <div class="flex flex-col items-center pt-6 px-6">
                            <div class="relative">
                                <img src="{{ secure_asset('image/face9.jpeg') }}" alt="Anita Rahayu"
                                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                                <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>
                            <div class="text-center mt-4">
                                <p class="font-bold text-gray-800 text-lg sm:text-xl">Anita Rahayu</p>
                                <p class="text-sm sm:text-base text-gray-600">Klinik Sehat | Administrator</p>
                                <div class="flex justify-center mt-2 text-yellow-400">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                            <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                                "Sistem manajemen pasien yang dikembangkan Aeratek sangat membantu pekerjaan kami. Sekarang proses pendaftaran pasien lebih cepat dan data lebih terorganisir."
                            </p>
                            <div class="text-center text-xs text-gray-500">
                                Project: Clinic Management System
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 10 -->
                <div class="testimonial-slide flex-none w-full sm:w-1/2 lg:w-1/3 px-2 sm:px-3">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 hover:border-[#04b2f7] transform hover:scale-[1.01] transition-all duration-300 h-full flex flex-col">
                        <div class="flex flex-col items-center pt-6 px-6">
                            <div class="relative">
                                <img src="{{ secure_asset('image/face10.jpeg') }}" alt="Hendra Kurniawan"
                                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#04b2f7]/10 p-2 border-4 border-[#04b2f7]/20 object-cover" />
                                <svg class="absolute -bottom-2 -right-2 w-8 h-8 text-[#04b2f7]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>
                            <div class="text-center mt-4">
                                <p class="font-bold text-gray-800 text-lg sm:text-xl">Hendra Kurniawan</p>
                                <p class="text-sm sm:text-base text-gray-600">Toko Buku Online | Founder</p>
                                <div class="flex justify-center mt-2 text-yellow-400">
                                    ★ ★ ★ ★ ☆
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                            <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed text-center">
                                "E-commerce yang dikembangkan Aeratek membantu penjualan kami meningkat signifikan. Fitur rekomendasi produk mereka sangat meningkatkan conversion rate."
                            </p>
                            <div class="text-center text-xs text-gray-500">
                                Project: E-Commerce Platform
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <button id="prevBtn_testimonial" class="hidden sm:flex absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-50 z-20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#04b2f7]" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <button id="nextBtn_testimonial" class="hidden sm:flex absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 bg-[#04b2f7] p-2 rounded-full shadow-lg text-white hover:bg-[#0388c4] z-20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <!-- Dots Navigation -->
        <div class="flex justify-center gap-2 mt-8">
            <!-- Desktop dots -->
            <span class="dot hidden sm:inline-block w-6 h-1.5 bg-[#04b2f7] rounded-full cursor-pointer" data-index="0"></span>
            <span class="dot hidden sm:inline-block w-3 h-1.5 bg-gray-200 rounded-full cursor-pointer" data-index="1"></span>
            <span class="dot hidden sm:inline-block w-3 h-1.5 bg-gray-200 rounded-full cursor-pointer" data-index="2"></span>
            <span class="dot hidden sm:inline-block w-3 h-1.5 bg-gray-200 rounded-full cursor-pointer" data-index="3"></span>
            <span class="dot hidden sm:inline-block w-3 h-1.5 bg-gray-200 rounded-full cursor-pointer" data-index="4"></span>
            <span class="dot hidden sm:inline-block w-3 h-1.5 bg-gray-200 rounded-full cursor-pointer" data-index="5"></span>
            <span class="dot hidden sm:inline-block w-3 h-1.5 bg-gray-200 rounded-full cursor-pointer" data-index="6"></span>

            
            <!-- Mobile dots -->
            <span class="dot-mobile sm:hidden inline-block w-3 h-3 bg-[#04b2f7] rounded-full cursor-pointer mx-1" data-index="0"></span>
            <span class="dot-mobile sm:hidden inline-block w-3 h-3 bg-gray-200 rounded-full cursor-pointer mx-1" data-index="1"></span>
            <span class="dot-mobile sm:hidden inline-block w-3 h-3 bg-gray-200 rounded-full cursor-pointer mx-1" data-index="2"></span>
            <span class="dot-mobile sm:hidden inline-block w-3 h-3 bg-gray-200 rounded-full cursor-pointer mx-1" data-index="3"></span>
            <span class="dot-mobile sm:hidden inline-block w-3 h-3 bg-gray-200 rounded-full cursor-pointer mx-1" data-index="4"></span>
            <span class="dot-mobile sm:hidden inline-block w-3 h-3 bg-gray-200 rounded-full cursor-pointer mx-1" data-index="5"></span>
            <span class="dot-mobile sm:hidden inline-block w-3 h-3 bg-gray-200 rounded-full cursor-pointer mx-1" data-index="6"></span>
        </div>
    </div>
</section>

    <x-cta-section></x-cta-section>

    <script>
        // Testimonial Carousel
document.addEventListener('DOMContentLoaded', function() {
    // Carousel elements
    const slidesContainer = document.getElementById('slides');
    const slides = document.querySelectorAll('.testimonial-slide');
    const prevBtn = document.getElementById('prevBtn_testimonial');
    const nextBtn = document.getElementById('nextBtn_testimonial');
    const dots = document.querySelectorAll('.dot');
    const mobileDots = document.querySelectorAll('.dot-mobile');
    const totalSlides = slides.length;
    const lastSlideIndex = 6; // Index slide terakhir (slide ke-7 karena dimulai dari 0)
    
    let currentIndex = 0;
    let isDragging = false;
    let startPos = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationId;
    let isAtEnd = false; // Flag untuk menandai apakah sudah di slide terakhir
    
    // Determine how many slides to show based on screen size
    function getSlidesPerView() {
        if (window.innerWidth >= 1024) return 3; // Desktop - 3 slides
        if (window.innerWidth >= 640) return 2;  // Tablet - 2 slides
        return 1;                               // Mobile - 1 slide
    }
    
    // Update carousel position
    function updateCarousel() {
        const slidesPerView = getSlidesPerView();
        const slideWidth = 100 / slidesPerView;
        const maxIndex = Math.max(totalSlides - slidesPerView, 0);
        
        // Jika sudah di akhir dan klik next lagi, kembali ke awal
        if (isAtEnd && currentIndex >= lastSlideIndex) {
            currentIndex = 0;
            isAtEnd = false;
        } 
        // Jika mencapai slide terakhir, set flag isAtEnd
        else if (currentIndex >= lastSlideIndex) {
            isAtEnd = true;
        }
        
        // Pastikan currentIndex tidak melebihi batas
        currentIndex = Math.min(currentIndex, maxIndex);
        
        slidesContainer.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
        updateDots();
    }
    
    // Update dot indicators
    function updateDots() {
        const activeDotIndex = Math.min(Math.floor(currentIndex / getSlidesPerView()), lastSlideIndex);
        
        dots.forEach((dot, index) => {
            const isActive = index === activeDotIndex;
            dot.classList.toggle('bg-[#04b2f7]', isActive);
            dot.classList.toggle('bg-gray-200', !isActive);
            dot.classList.toggle('w-6', isActive);
            dot.classList.toggle('w-3', !isActive);
        });
        
        mobileDots.forEach((dot, index) => {
            dot.classList.toggle('bg-[#04b2f7]', index === activeDotIndex);
            dot.classList.toggle('bg-gray-200', index !== activeDotIndex);
        });
    }
    
    // Next slide
    function nextSlide() {
        const slidesPerView = getSlidesPerView();
        const maxIndex = Math.max(totalSlides - slidesPerView, 0);
        
        if (currentIndex < maxIndex) {
            currentIndex += 1;
        } else {
            // Jika sudah di slide terakhir, set flag untuk kembali ke awal
            isAtEnd = true;
        }
        updateCarousel();
    }
    
    // Previous slide
    function prevSlide() {
        if (currentIndex > 0) {
            currentIndex -= 1;
            isAtEnd = false; // Reset flag jika mundur dari slide terakhir
            updateCarousel();
        }
    }
    
    // Go to specific slide
    function goToSlide(index) {
        const slidesPerView = getSlidesPerView();
        currentIndex = Math.min(index * slidesPerView, lastSlideIndex);
        isAtEnd = currentIndex >= lastSlideIndex;
        updateCarousel();
    }
    
    // Initialize
    updateCarousel();

    // Event listeners
    if (prevBtn) {
        prevBtn.addEventListener('click', prevSlide);
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', nextSlide);
    }
    
    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            goToSlide(parseInt(dot.dataset.index));
        });
    });
    
    mobileDots.forEach(dot => {
        dot.addEventListener('click', () => {
            goToSlide(parseInt(dot.dataset.index));
        });
    });
    
    // Handle window resize
    window.addEventListener('resize', updateCarousel);
});
            // Projects Carousel
document.addEventListener('DOMContentLoaded', function() {
    // ==================== PROJECT CAROUSEL ====================
    const carousel = document.getElementById('carousel');
    const projectSlides = document.querySelectorAll('#carousel > div');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentProjectIndex = 0;
    let isDragging = false;
    let startPos = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationId;

    function getSlideWidth() {
        const slide = projectSlides[0];
        const style = window.getComputedStyle(slide);
        return slide.offsetWidth + 
               parseFloat(style.marginRight) + 
               parseFloat(style.marginLeft);
    }

    function updateProjectCarousel() {
        const slideWidth = getSlideWidth();
        carousel.scrollTo({
            left: currentProjectIndex * slideWidth,
            behavior: 'smooth'
        });
    }

    function nextProjectSlide() {
        const containerWidth = carousel.parentElement.offsetWidth;
        const maxScroll = carousel.scrollWidth - containerWidth;
        const currentScroll = carousel.scrollLeft;
        
        if (currentScroll >= maxScroll - 10) {
            // Jika sudah di akhir, kembali ke awal
            currentProjectIndex = 0;
        } else {
            currentProjectIndex = Math.min(currentProjectIndex + 1, projectSlides.length - 1);
        }
        updateProjectCarousel();
    }

    function prevProjectSlide() {
        if (carousel.scrollLeft <= 10) {
            // Jika di awal, pergi ke akhir
            currentProjectIndex = projectSlides.length - 1;
        } else {
            currentProjectIndex = Math.max(currentProjectIndex - 1, 0);
        }
        updateProjectCarousel();
    }

    // Event listeners untuk tombol
    prevBtn?.addEventListener('click', prevProjectSlide);
    nextBtn?.addEventListener('click', nextProjectSlide);

    // Handle scroll events untuk update index
    carousel?.addEventListener('scroll', function() {
        const slideWidth = getSlideWidth();
        currentProjectIndex = Math.round(carousel.scrollLeft / slideWidth);
    });

    // ==================== TESTIMONIAL CAROUSEL ====================
    const slidesContainer = document.getElementById('slides');
    const slides = document.querySelectorAll('.testimonial-slide');
    const prevBtnTestimonial = document.getElementById('prevBtn_testimonial');
    const nextBtnTestimonial = document.getElementById('nextBtn_testimonial');
    const dots = document.querySelectorAll('.dot');
    const mobileDots = document.querySelectorAll('.dot-mobile');
    const totalSlides = slides.length;
    const lastSlideIndex = 6; // Index slide terakhir
    
    let currentIndex = 0;
    let isTestimonialDragging = false;
    let isAtEnd = false;

    function getSlidesPerView() {
        if (window.innerWidth >= 1024) return 3;
        if (window.innerWidth >= 640) return 2;
        return 1;
    }
    
    function updateCarousel() {
        const slidesPerView = getSlidesPerView();
        const slideWidth = 100 / slidesPerView;
        const maxIndex = Math.max(totalSlides - slidesPerView, 0);
        
        if (isAtEnd && currentIndex >= lastSlideIndex) {
            currentIndex = 0;
            isAtEnd = false;
        } else if (currentIndex >= lastSlideIndex) {
            isAtEnd = true;
        }
        
        currentIndex = Math.min(currentIndex, maxIndex);
        
        slidesContainer.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
        updateDots();
    }
    
    function updateDots() {
        const activeDotIndex = Math.min(Math.floor(currentIndex / getSlidesPerView()), lastSlideIndex);
        
        dots.forEach((dot, index) => {
            const isActive = index === activeDotIndex;
            dot.classList.toggle('bg-[#04b2f7]', isActive);
            dot.classList.toggle('bg-gray-200', !isActive);
            dot.classList.toggle('w-6', isActive);
            dot.classList.toggle('w-3', !isActive);
        });
        
        mobileDots.forEach((dot, index) => {
            dot.classList.toggle('bg-[#04b2f7]', index === activeDotIndex);
            dot.classList.toggle('bg-gray-200', index !== activeDotIndex);
        });
    }
    
    function nextSlide() {
        const slidesPerView = getSlidesPerView();
        const maxIndex = Math.max(totalSlides - slidesPerView, 0);
        
        if (currentIndex < maxIndex) {
            currentIndex += 1;
        } else {
            isAtEnd = true;
        }
        updateCarousel();
    }
    
    function prevSlide() {
        if (currentIndex > 0) {
            currentIndex -= 1;
            isAtEnd = false;
            updateCarousel();
        }
    }
    
    function goToSlide(index) {
        const slidesPerView = getSlidesPerView();
        currentIndex = Math.min(index * slidesPerView, lastSlideIndex);
        isAtEnd = currentIndex >= lastSlideIndex;
        updateCarousel();
    }
    
    // Initialize
    updateCarousel();

    // Event listeners
    prevBtnTestimonial?.addEventListener('click', prevSlide);
    nextBtnTestimonial?.addEventListener('click', nextSlide);
    
    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            goToSlide(parseInt(dot.dataset.index));
        });
    });
    
    mobileDots.forEach(dot => {
        dot.addEventListener('click', () => {
            goToSlide(parseInt(dot.dataset.index));
        });
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        updateCarousel();
        updateProjectCarousel();
    });
});
    </script>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
