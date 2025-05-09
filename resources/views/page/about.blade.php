@extends('layout.header')

@section('title', 'About Us')

@section('content')
<!-- Hero-style About Us Section -->
<section class="relative py-16 sm:py-24 md:py-32 bg-gradient-to-r from-blue-50 to-gray-50 overflow-hidden scroll-reveal-section">
    <!-- Background elements -->
    <div class="absolute inset-0 opacity-10">
        <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="texture" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1" fill="#04b2f7" opacity="0.3" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#texture)" />
        </svg>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-gray-900">
                <span class="block">ABOUT US</span>
                <span class="block text-[#04b2f7] mt-2 sm:mt-4">Aeratek Global Solution</span>
            </h1>

            <!-- Underline decoration -->
            <div class="mt-4 sm:mt-6 mb-6 sm:mb-8 w-16 sm:w-24 h-1 bg-[#04b2f7] mx-auto"></div>

            <div class="max-w-3xl mx-auto">
                <p class="text-lg sm:text-xl text-gray-600 leading-relaxed">
                    We are a technology company focused on providing innovative digital solutions for various business
                    needs. Founded with a mission to accelerate digital transformation, we offer services that include
                    software development, IT consulting, and the implementation of cutting-edge technologies tailored to
                    our clients' needs.
                </p>
            </div>

            <!-- CTA Buttons -->
            <div class="mt-8 sm:mt-12 flex flex-col sm:flex-row justify-center gap-3 sm:gap-4">
                <a href="#"
                    class="px-6 sm:px-8 py-2 sm:py-3 bg-[#04b2f7] hover:bg-[#0399d9] text-white text-sm sm:text-base font-medium rounded-lg shadow-md transition-colors">
                    Learn More About Us
                </a>
                <a href="#"
                    class="px-6 sm:px-8 py-2 sm:py-3 bg-white hover:bg-gray-100 text-gray-800 text-sm sm:text-base font-medium rounded-lg border border-gray-300 shadow-sm transition-colors">
                    Meet Our Team
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Core Values Section -->
<section class="relative py-12 sm:py-16 md:py-20 bg-white scroll-reveal-section">
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold text-black">
                Aeratek <span class="text-[#04b2f7]">Core</span> Values
            </h2>
            <p class="mt-2 sm:mt-4 text-base sm:text-lg text-gray-700 max-w-2xl mx-auto">
                Building the future with precision and innovation
            </p>
        </div>

        <!-- Icon Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 md:gap-12">
            <!-- Item 1 -->
            <div class="flex flex-col items-center text-center p-4 sm:p-6 rounded-xl bg-white hover:shadow-lg transition-all">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-[#003366] rounded-2xl flex items-center justify-center mb-4 sm:mb-6">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-black mb-2 sm:mb-3">Advanced Engineering</h3>
                <p class="text-sm sm:text-base text-gray-700">
                    Cutting-edge solutions built with modern architectures and best practices.
                </p>
            </div>

            <!-- Item 2 -->
            <div class="flex flex-col items-center text-center p-4 sm:p-6 rounded-xl bg-white hover:shadow-lg transition-all">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-[#04b2f7] rounded-2xl flex items-center justify-center mb-4 sm:mb-6">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-black mb-2 sm:mb-3">Responsive Design</h3>
                <p class="text-sm sm:text-base text-gray-700">
                    Flawless experiences across all devices and screen sizes.
                </p>
            </div>

            <!-- Item 3 -->
            <div class="flex flex-col items-center text-center p-4 sm:p-6 rounded-xl bg-white hover:shadow-lg transition-all">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-black rounded-2xl flex items-center justify-center mb-4 sm:mb-6">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-black mb-2 sm:mb-3">Secure Solutions</h3>
                <p class="text-sm sm:text-base text-gray-700">
                    Enterprise-grade security built into every layer.
                </p>
            </div>
        </div>

        <!-- CTA -->
        <div class="mt-12 sm:mt-16 md:mt-20 text-center">
            <a href="#"
                class="inline-flex items-center px-6 sm:px-8 py-2 sm:py-3 bg-[#04b2f7] hover:bg-[#003366] text-white text-sm sm:text-base font-medium rounded-lg shadow-md transition-colors duration-300">
                Explore Our Work
                <svg class="ml-2 w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="relative py-12 sm:py-16 md:py-20 bg-white overflow-hidden scroll-reveal-section">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header with image -->
        <div class="text-center mb-12 sm:mb-16">
            <div class="relative inline-block mb-6 sm:mb-8">
                <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80"
                    alt="Technology innovation" class="w-full max-w-4xl mx-auto rounded-xl sm:rounded-2xl shadow-lg sm:shadow-xl">
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent rounded-xl sm:rounded-2xl"></div>
                <h2 class="absolute bottom-4 sm:bottom-8 left-0 right-0 text-2xl sm:text-3xl md:text-4xl font-bold text-white">
                    Our <span class="text-[#04b2f7]">Core</span> Values
                </h2>
            </div>
        </div>

        <!-- Vision & Mission Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12">
            <!-- Vision Section -->
            <div class="bg-white p-6 sm:p-8 rounded-xl sm:rounded-2xl shadow-lg border-l-4 border-[#003366] relative overflow-hidden scroll-reveal-section">
                <div class="flex items-center mb-4 sm:mb-6">
                    <div class="bg-[#003366] p-2 sm:p-3 rounded-lg mr-3 sm:mr-4">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900">Our Vision</h3>
                </div>
                <p class="text-base sm:text-lg text-gray-700 leading-relaxed">
                    To establish Aeratek as a global symbol of <span class="font-semibold text-[#003366]">integrity, innovation, sustainability, excellence, collaboration, and customer satisfaction</span> in the technology sector.
                </p>
            </div>

            <!-- Mission Section -->
            <div class="bg-white p-6 sm:p-8 rounded-xl sm:rounded-2xl shadow-lg border-l-4 border-[#04b2f7] relative overflow-hidden scroll-reveal-section">
                <div class="flex items-center mb-4 sm:mb-6">
                    <div class="bg-[#04b2f7] p-2 sm:p-3 rounded-lg mr-3 sm:mr-4">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900">Our Mission</h3>
                </div>

                <div class="space-y-4 sm:space-y-6">
                    <!-- Mission 1 -->
                    <div class="flex group">
                        <div class="flex-shrink-0 mr-3 sm:mr-4">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#04b2f7]/10 rounded-lg flex items-center justify-center group-hover:bg-[#04b2f7] transition-colors">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#04b2f7] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-base sm:text-lg font-semibold text-gray-900">Innovative Solutions</h4>
                            <p class="text-sm sm:text-base text-gray-700">Deliver cutting-edge technology solutions that drive business growth and digital transformation.</p>
                        </div>
                    </div>

                    <!-- Mission 2 -->
                    <div class="flex group">
                        <div class="flex-shrink-0 mr-3 sm:mr-4">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#04b2f7]/10 rounded-lg flex items-center justify-center group-hover:bg-[#04b2f7] transition-colors">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#04b2f7] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-base sm:text-lg font-semibold text-gray-900">Quality Service</h4>
                            <p class="text-sm sm:text-base text-gray-700">Provide high-quality services with relentless focus on customer satisfaction.</p>
                        </div>
                    </div>

                    <!-- Mission 3 -->
                    <div class="flex group">
                        <div class="flex-shrink-0 mr-3 sm:mr-4">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#04b2f7]/10 rounded-lg flex items-center justify-center group-hover:bg-[#04b2f7] transition-colors">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#04b2f7] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-base sm:text-lg font-semibold text-gray-900">Strategic Partnerships</h4>
                            <p class="text-sm sm:text-base text-gray-700">Build long-term relationships based on trust, professionalism, and mutual success.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="py-12 sm:py-16 md:py-20 bg-white scroll-reveal-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">Our Journey</h2>
            <p class="mt-2 sm:mt-4 text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                The milestones in our evolution as a technology innovator
            </p>
        </div>

        <!-- Timeline -->
        <div class="relative">
            <!-- Timeline line -->
            <div class="hidden sm:block absolute left-1/2 h-full w-0.5 bg-[#04b2f7] transform -translate-x-1/2"></div>

            <!-- Timeline Items -->
            <div class="space-y-8 sm:space-y-16">
                <!-- Item 1 -->
                <div class="relative flex flex-col sm:flex-row items-center justify-between timeline-item">
                    <div class="w-full sm:w-5/12 sm:pr-5 sm:text-right mb-4 sm:mb-0">
                        <div class="bg-gray-50 p-4 sm:p-6 rounded-lg shadow-sm border border-gray-200 relative">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg sm:text-xl font-bold text-[#04b2f7]">Somearch</h3>
                                <span class="text-xs sm:text-sm bg-[#04b2f7] text-white px-2 sm:px-3 py-1 rounded-full">2015</span>
                            </div>
                            <p class="mt-2 text-sm sm:text-base text-gray-700">
                                Our journey begins, led by four visionary founders with a passion for technology innovation.
                            </p>
                        </div>
                    </div>

                    <div class="hidden sm:block absolute left-1/2 w-4 h-4 sm:w-6 sm:h-6 bg-[#04b2f7] rounded-full border-4 border-white transform -translate-x-1/2">
                    </div>

                    <div class="w-full sm:w-5/12 sm:pl-5 sm:text-left mt-4 sm:mt-0">
                        <div class="bg-gray-50 p-4 sm:p-6 rounded-lg shadow-sm border border-gray-200 relative">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg sm:text-xl font-bold text-[#04b2f7]">Somearch 2.0</h3>
                                <span class="text-xs sm:text-sm bg-[#04b2f7] text-white px-2 sm:px-3 py-1 rounded-full">2018</span>
                            </div>
                            <p class="mt-2 text-sm sm:text-base text-gray-700">
                                Undergoes transformation, now led by two dedicated founders focused on enterprise solutions.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="relative flex flex-col sm:flex-row items-center justify-between timeline-item">
                    <div class="w-full sm:w-5/12 sm:pr-5 sm:text-right mb-4 sm:mb-0">
                        <div class="bg-gray-50 p-4 sm:p-6 rounded-lg shadow-sm border border-gray-200 relative">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg sm:text-xl font-bold text-[#04b2f7]">Aeratek</h3>
                                <span class="text-xs sm:text-sm bg-[#04b2f7] text-white px-2 sm:px-3 py-1 rounded-full">2020</span>
                            </div>
                            <p class="mt-2 text-sm sm:text-base text-gray-700">
                                Rebrands as Aeratek, reflecting our evolution into a global technology solutions provider.
                            </p>
                        </div>
                    </div>

                    <div class="hidden sm:block absolute left-1/2 w-4 h-4 sm:w-6 sm:h-6 bg-[#04b2f7] rounded-full border-4 border-white transform -translate-x-1/2">
                    </div>

                    <div class="w-full sm:w-5/12 sm:pl-5 sm:text-left mt-4 sm:mt-0">
                        <div class="bg-gray-50 p-4 sm:p-6 rounded-lg shadow-sm border border-gray-200 relative">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg sm:text-xl font-bold text-[#04b2f7]">Aeratek Today</h3>
                                <span class="text-xs sm:text-sm bg-[#04b2f7] text-white px-2 sm:px-3 py-1 rounded-full">2023</span>
                            </div>
                            <p class="mt-2 text-sm sm:text-base text-gray-700">
                                Continues to build on its foundation, delivering innovative solutions to clients worldwide.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-12 sm:py-16 md:py-20 bg-gray-50 scroll-reveal-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2 sm:mb-4">Meet Our Leadership</h2>
            <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
                The visionary minds driving Aeratek's innovation and growth
            </p>
            <div class="mt-4 sm:mt-6 w-16 sm:w-24 h-1 bg-[#04b2f7] mx-auto"></div>
        </div>

        <!-- Leadership Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
            <!-- Team Member 1 -->
            <div class="bg-white rounded-lg sm:rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="relative h-48 sm:h-56 md:h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                        alt="CEO" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <div class="absolute bottom-3 sm:bottom-4 left-3 sm:left-4">
                        <h3 class="text-lg sm:text-xl font-bold text-white">Johnathan Smith</h3>
                        <p class="text-sm sm:text-base text-[#04b2f7] font-medium">CEO & Founder</p>
                    </div>
                </div>
                <div class="p-4 sm:p-6">
                    <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">
                        Visionary leader with 15+ years in tech innovation and business strategy.
                    </p>
                    <div class="flex space-x-3 sm:space-x-4">
                        <a href="#" class="text-gray-400 hover:text-[#04b2f7] transition-colors">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-[#04b2f7] transition-colors">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="bg-white rounded-lg sm:rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="relative h-48 sm:h-56 md:h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                        alt="CTO" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <div class="absolute bottom-3 sm:bottom-4 left-3 sm:left-4">
                        <h3 class="text-lg sm:text-xl font-bold text-white">Sarah Johnson</h3>
                        <p class="text-sm sm:text-base text-[#04b2f7] font-medium">CTO</p>
                    </div>
                </div>
                <div class="p-4 sm:p-6">
                    <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">
                        Technology architect with expertise in scalable systems and AI solutions.
                    </p>
                    <div class="flex space-x-3 sm:space-x-4">
                        <a href="#" class="text-gray-400 hover:text-[#04b2f7] transition-colors">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-[#04b2f7] transition-colors">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="bg-white rounded-lg sm:rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="relative h-48 sm:h-56 md:h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1566492031773-4f4e44671857?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                        alt="COO" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <div class="absolute bottom-3 sm:bottom-4 left-3 sm:left-4">
                        <h3 class="text-lg sm:text-xl font-bold text-white">Michael Chen</h3>
                        <p class="text-sm sm:text-base text-[#04b2f7] font-medium">COO</p>
                    </div>
                </div>
                <div class="p-4 sm:p-6">
                    <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">
                        Operations expert focused on delivering exceptional client experiences.
                    </p>
                    <div class="flex space-x-3 sm:space-x-4">
                        <a href="#" class="text-gray-400 hover:text-[#04b2f7] transition-colors">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-[#04b2f7] transition-colors">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Team Member 4 -->
            <div class="bg-white rounded-lg sm:rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="relative h-48 sm:h-56 md:h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=688&q=80"
                        alt="VP Product" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <div class="absolute bottom-3 sm:bottom-4 left-3 sm:left-4">
                        <h3 class="text-lg sm:text-xl font-bold text-white">Emily Rodriguez</h3>
                        <p class="text-sm sm:text-base text-[#04b2f7] font-medium">VP of Product</p>
                    </div>
                </div>
                <div class="p-4 sm:p-6">
                    <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">
                        Product strategist passionate about user-centered design and innovation.
                    </p>
                    <div class="flex space-x-3 sm:space-x-4">
                        <a href="#" class="text-gray-400 hover:text-[#04b2f7] transition-colors">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-[#04b2f7] transition-colors">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Extended Team Section -->
        <div class="mt-12 md:mt-20">
            <h3 class="text-xl md:text-2xl font-bold text-center text-gray-800 mb-6 md:mb-8">Our Extended Team</h3>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 md:gap-6">
                <!-- Team Member 5 -->
                <div class="text-center">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 mx-auto mb-3 md:mb-4 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                            alt="Developer" class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-sm sm:text-base font-bold text-gray-800">Alex Turner</h4>
                    <p class="text-xs sm:text-sm text-[#04b2f7]">Lead Developer</p>
                </div>

                <!-- Team Member 6 -->
                <div class="text-center">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 mx-auto mb-3 md:mb-4 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Designer" class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-sm sm:text-base font-bold text-gray-800">Sophia Martinez</h4>
                    <p class="text-xs sm:text-sm text-[#04b2f7]">UX Designer</p>
                </div>

                <!-- Team Member 7 -->
                <div class="text-center">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 mx-auto mb-3 md:mb-4 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1467&q=80"
                            alt="Marketing" class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-sm sm:text-base font-bold text-gray-800">David Kim</h4>
                    <p class="text-xs sm:text-sm text-[#04b2f7]">Marketing Director</p>
                </div>

                <!-- Team Member 8 -->
                <div class="text-center">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 mx-auto mb-3 md:mb-4 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=688&q=80"
                            alt="HR" class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-sm sm:text-base font-bold text-gray-800">Lisa Wong</h4>
                    <p class="text-xs sm:text-sm text-[#04b2f7]">HR Manager</p>
                </div>

                <!-- Team Member 9 -->
                <div class="text-center">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 mx-auto mb-3 md:mb-4 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="https://images.unsplash.com/photo-1552058544-f2b08422138a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=699&q=80"
                            alt="QA" class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-sm sm:text-base font-bold text-gray-800">Robert Johnson</h4>
                    <p class="text-xs sm:text-sm text-[#04b2f7]">QA Lead</p>
                </div>

                <!-- Team Member 10 -->
                <div class="text-center">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 mx-auto mb-3 md:mb-4 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=686&q=80"
                            alt="Support" class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-sm sm:text-base font-bold text-gray-800">Maria Garcia</h4>
                    <p class="text-xs sm:text-sm text-[#04b2f7]">Support Manager</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="mt-12 md:mt-16 text-center">
            <a href="#" class="inline-flex items-center px-6 py-2 md:px-8 md:py-3 bg-[#04b2f7] hover:bg-[#003366] text-white text-sm md:text-base font-medium rounded-lg shadow-md transition-colors duration-300">
                Join Our Team
                <svg class="ml-2 w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </a>
        </div>
    </div>
</section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate timeline items on scroll
            const timelineItems = document.querySelectorAll('.timeline-item');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1
            });

            timelineItems.forEach(item => {
                observer.observe(item);
            });
        });
    </script>

@endsection
