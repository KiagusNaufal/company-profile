@extends('layout.header') <!-- nama file layout Anda -->

@section('title', 'Home Page')

@section('content')
    {{-- <!-- Hero Section -->
    <section class="bg-white py-24 h-[784px] border-b-2 border-gray-200 scroll-reveal-section">
        <div class="container mx-auto mt-20 px-4 flex flex-col-reverse lg:flex-row items-center gap-12 scroll-reveal-hero">
            <!-- Text Content -->
            <div class="w-full lg:w-1/2 text-center lg:text-left">
                <h1
                    class="sr-hero text-4xl md:text-5xl font-extrabold bg-gradient-to-r from-blue-600 to-green-500 bg-clip-text text-transparent mb-6">
                    Digital Transformation,
                    <br class="hidden md:block" />
                    Ready to Meet Your Every Need
                </h1>
                <p class="sr-hero mt-10 text-gray-600 text-xl max-w-2xl mb-8">
                    We deliver cutting-edge digital solutions—from custom web & mobile apps to immersive experiences—so that
                    your
                    business never misses a beat in today’s fast‑paced world.
                </p>
            </div>
        </div>
    </section> --}}

    <!-- Works Hero Section -->
    <section class="relative py-32 h-[512px] md:min-h-[712px] bg-gradient-to-r from-blue-50 to-gray-50 overflow-hidden scroll-reveal-section">
        <!-- Soft Dot Texture -->
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="dot-pattern" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="1" fill="#04b2f7" opacity="0.2" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#dot-pattern)" />
            </svg>
        </div>

        <!-- Blurred Color Accents -->
        <div class="absolute inset-0 mix-blend-multiply filter blur-3xl opacity-20">
            <div class="absolute top-1/3 left-10 w-60 h-60 bg-[#04b2f7] rounded-full"></div>
            <div class="absolute bottom-1/4 right-16 w-72 h-72 bg-indigo-400 rounded-full"></div>
        </div>

        <div class="relative mt-10 max-w-4xl mx-auto px-6 text-center">
            <!-- Title -->
            <h1 class="scroll-reveal-item text-5xl sm:text-6xl font-bold text-gray-900">
                Our <span class="text-[#04b2f7]">Portfolio</span>
            </h1>
            <!-- Subtitle -->
            <p class="scroll-reveal-item mt-4 text-xl text-gray-600 max-w-2xl mx-auto">
                A selection of digital solutions we’ve crafted—web, mobile, and game applications that drive results.
            </p>
            <!-- CTA -->
            <div class="scroll-reveal-item mt-8">
                <a href="#projects"
                    class="inline-block px-8 py-4 bg-[#04b2f7] text-white font-medium rounded-full shadow-lg hover:bg-[#0399d9] transition">
                    View All Projects
                </a>
            </div>
        </div>
        <!-- Scrolling indicator -->
        <div class="absolute bottom-8 left-0 right-0 flex justify-center">
            <div class="animate-bounce w-8 h-8 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </div>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="container mx-auto px-4 py-12 scroll-reveal-section">
        <h2 class="text-3xl m-3 font-bold text-gray-800 mb-8">All Works</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($projects as $project)
                <div
                    class="flex flex-col bg-white rounded-xl shadow-lg md:mt-14 md:mx-3 hover:shadow-xl transition-shadow duration-300 group scroll-reveal-card">

                    <div class="h-96 w-full overflow-hidden rounded-t-xl border-2"
                        style="background-image: url('https://source.unsplash.com/400x300')">

                    </div>

                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex items-center justify-between sm:mx-5 mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $project['title'] }}</h3>
                            <span class="text-sm {{ $project['badge_color'] }} px-3 py-1 rounded-full">
                                {{ $project['category'] }}
                            </span>
                        </div>
                        <p class="text-gray-600 mb-4 line-clamp-3 flex-1">
                            {{ $project['description'] }}
                        </p>
                        <div class="mt-4">
                            <a href="#"
                                class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                <span class="mr-2 align-text-bottom">StartView</span>
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </section>


    <!-- CTA Section -->
    <x-cta-section></x-cta-section>
@endsection
