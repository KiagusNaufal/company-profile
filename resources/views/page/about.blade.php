@extends('layout.header')

@section('title', 'About Us')

@section('content')

<style>
    .timeline-item {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease;
    }

    .timeline-item.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Section divider styles */
    .section-divider {
        height: 80px;
        background: linear-gradient(to bottom, 
            rgba(255,255,255,1) 0%, 
            rgba(255,255,255,0) 50%, 
            rgba(255,255,255,1) 100%);
        position: relative;
        margin: 60px 0;
    }
    
    .section-divider::after {
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 3px;
        background: #04b2f7;
        border-radius: 3px;
    }
    
    .section-divider.dark {
        background: linear-gradient(to bottom, 
            rgba(240,245,255,1) 0%, 
            rgba(240,245,255,0) 50%, 
            rgba(240,245,255,1) 100%);
    }
    </style>
    <!-- Hero-style About Us Section -->
    <section class="relative py-32 bg-gradient-to-r from-blue-50 to-gray-50 overflow-hidden">
        <!-- Texture SVG Background -->
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

        <!-- Decorative elements -->
        <div class="absolute inset-0 opacity-10">
            <div
                class="absolute top-0 left-0 w-64 h-64 bg-[#04b2f7] rounded-full mix-blend-multiply filter blur-3xl opacity-20">
            </div>
            <div
                class="absolute bottom-0 right-0 w-64 h-64 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block">ABOUT US</span>
                    <span class="block text-[#04b2f7] mt-4">Aeratek Global Solution</span>
                </h1>

                <!-- Underline decoration -->
                <div class="mt-6 mb-8 w-24 h-1 bg-[#04b2f7] mx-auto"></div>

                <div class="max-w-3xl mx-auto">
                    <p class="text-xl text-gray-600 leading-relaxed">
                        We are a technology company focused on providing innovative digital solutions for various business
                        needs. Founded with a mission to accelerate digital transformation, we offer services that include
                        software development, IT consulting, and the implementation of cutting-edge technologies tailored to
                        our clients' needs.
                    </p>
                </div>

                <!-- CTA Buttons -->
                <div class="mt-12 flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#"
                        class="px-8 py-3 bg-[#04b2f7] hover:bg-[#0399d9] text-white font-medium rounded-lg shadow-md transition-colors">
                        Learn More About Us
                    </a>
                    <a href="#"
                        class="px-8 py-3 bg-white hover:bg-gray-100 text-gray-800 font-medium rounded-lg border border-gray-300 shadow-sm transition-colors">
                        Meet Our Team
                    </a>
                </div>
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

    <div class="section-divider"></div>

    <section class="relative py-20 bg-white">
        <!-- Background subtle elements -->
        <div class="absolute inset-0 overflow-hidden opacity-10 pointer-events-none">
            <div class="absolute top-20 left-1/4 w-48 h-48 bg-[#04b2f7] rounded-full mix-blend-multiply filter blur-3xl"></div>
            <div class="absolute bottom-20 right-1/4 w-48 h-48 bg-[#003366] rounded-full mix-blend-multiply filter blur-3xl"></div>
        </div>
    
        <div class="relative max-w-6xl mx-auto px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-black sm:text-5xl">
                    Aeratek <span class="text-[#04b2f7]">Core</span> Values
                </h2>
                <p class="mt-4 text-lg text-gray-700 max-w-2xl mx-auto">
                    Building the future with precision and innovation
                </p>
            </div>
    
            <!-- Icon Grid -->
            <div class="grid md:grid-cols-3 gap-12">
                <!-- Item 1 -->
                <div class="flex flex-col items-center text-center p-6 rounded-xl bg-white hover:shadow-lg transition-all">
                    <div class="w-20 h-20 bg-[#003366] rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-black mb-3">Advanced Engineering</h3>
                    <p class="text-gray-700">
                        Cutting-edge solutions built with modern architectures and best practices.
                    </p>
                </div>
    
                <!-- Item 2 -->
                <div class="flex flex-col items-center text-center p-6 rounded-xl bg-white hover:shadow-lg transition-all">
                    <div class="w-20 h-20 bg-[#04b2f7] rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-black mb-3">Responsive Design</h3>
                    <p class="text-gray-700">
                        Flawless experiences across all devices and screen sizes.
                    </p>
                </div>
    
                <!-- Item 3 -->
                <div class="flex flex-col items-center text-center p-6 rounded-xl bg-white hover:shadow-lg transition-all">
                    <div class="w-20 h-20 bg-black rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-black mb-3">Secure Solutions</h3>
                    <p class="text-gray-700">
                        Enterprise-grade security built into every layer.
                    </p>
                </div>
            </div>
    
            <!-- CTA -->
            <div class="mt-20 text-center">
                <a href="#" class="inline-flex items-center px-8 py-4 bg-[#04b2f7] hover:bg-[#003366] text-white font-medium rounded-xl shadow-md transition-colors duration-300">
                    Explore Our Work
                    <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section class="relative py-20 bg-white overflow-hidden">
        <!-- Background elements -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-10 w-64 h-64 bg-[#04b2f7] rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
            <div class="absolute bottom-20 right-10 w-64 h-64 bg-[#003366] rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        </div>
    
        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
            <!-- Header with image -->
            <div class="text-center mb-16">
                <div class="relative inline-block mb-8">
                    <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80" 
                         alt="Technology innovation" 
                         class="w-full max-w-4xl mx-auto rounded-2xl shadow-xl">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent rounded-2xl"></div>
                    <h2 class="absolute bottom-8 left-0 right-0 text-4xl font-bold text-white sm:text-5xl">
                        Our <span class="text-[#04b2f7]">Core</span> Values
                    </h2>
                </div>
            </div>
    
            <!-- Vision & Mission Grid -->
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Vision Section -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-[#003366] relative overflow-hidden">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-[#04b2f7] rounded-full opacity-10"></div>
                    <div class="relative z-10">
                        <div class="flex items-center mb-6">
                            <div class="bg-[#003366] p-3 rounded-lg mr-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Our Vision</h3>
                        </div>
                        <p class="text-lg text-gray-700 leading-relaxed">
                            To establish Aeratek as a global symbol of <span class="font-semibold text-[#003366]">integrity, innovation, sustainability, excellence, collaboration, and customer satisfaction</span> in the technology sector.
                        </p>
                        <div class="mt-8">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                                 alt="Vision illustration" 
                                 class="rounded-lg shadow-md w-full h-48 object-cover">
                        </div>
                    </div>
                </div>
    
                <!-- Mission Section -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-[#04b2f7]">
                    <div class="flex items-center mb-6">
                        <div class="bg-[#04b2f7] p-3 rounded-lg mr-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Our Mission</h3>
                    </div>
    
                    <div class="space-y-6">
                        <!-- Mission 1 -->
                        <div class="flex group">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-[#04b2f7]/10 rounded-lg flex items-center justify-center group-hover:bg-[#04b2f7] transition-colors">
                                    <svg class="w-6 h-6 text-[#04b2f7] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900">Innovative Solutions</h4>
                                <p class="text-gray-700">Deliver cutting-edge technology solutions that drive business growth and digital transformation.</p>
                            </div>
                        </div>
    
                        <!-- Mission 2 -->
                        <div class="flex group">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-[#04b2f7]/10 rounded-lg flex items-center justify-center group-hover:bg-[#04b2f7] transition-colors">
                                    <svg class="w-6 h-6 text-[#04b2f7] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900">Quality Service</h4>
                                <p class="text-gray-700">Provide high-quality services with relentless focus on customer satisfaction.</p>
                            </div>
                        </div>
    
                        <!-- Mission 3 -->
                        <div class="flex group">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-[#04b2f7]/10 rounded-lg flex items-center justify-center group-hover:bg-[#04b2f7] transition-colors">
                                    <svg class="w-6 h-6 text-[#04b2f7] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900">Strategic Partnerships</h4>
                                <p class="text-gray-700">Build long-term relationships based on trust, professionalism, and mutual success.</p>
                            </div>
                        </div>
    
                        <div class="mt-8">
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                                 alt="Team collaboration" 
                                 class="rounded-lg shadow-md w-full h-48 object-cover">
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- CTA -->
            <div class="mt-20 text-center">
                <a href="#" class="inline-flex items-center px-8 py-3 bg-[#04b2f7] hover:bg-[#003366] text-white font-medium rounded-lg shadow-md transition-colors duration-300">
                    Join Our Journey
                    <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <div class="relative h-24 w-full overflow-hidden">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="w-24 h-1 bg-[#04b2f7] rounded-full"></div>
            <div class="w-24 h-1 bg-[#003366] rounded-full mx-4"></div>
            <div class="w-24 h-1 bg-[#04b2f7] rounded-full"></div>
        </div>
    </div>
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900">Our Journeys</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">
                    The diverse chronicles (and successes) in realizing creative and innovative technology.
                </p>
            </div>

            <!-- Timeline -->
            <div class="relative">
                <!-- Timeline line -->
                <div class="absolute left-1/2 h-full w-0.5 bg-[#04b2f7] transform -translate-x-1/2"></div>

                <!-- Timeline Items -->
                <div class="space-y-16">
                    <!-- Item 1 -->
                    <div class="relative flex items-center justify-between timeline-item">
                        <div class="w-5/12 pr-8 text-right">
                            <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200">
                                <h3 class="text-xl font-bold text-[#04b2f7]">somearch</h3>
                                <p class="mt-2 text-gray-700">
                                    Somearch's journey begins, led by four visionary founders.
                                </p>
                            </div>
                        </div>

                        <div
                            class="absolute left-1/2 w-6 h-6 bg-[#04b2f7] rounded-full border-4 border-white transform -translate-x-1/2">
                        </div>

                        <div class="w-5/12"></div>
                    </div>

                    <!-- Item 2 -->
                    <div class="relative flex items-center justify-between timeline-item">
                        <div class="w-5/12"></div>

                        <div
                            class="absolute left-1/2 w-6 h-6 bg-[#04b2f7] rounded-full border-4 border-white transform -translate-x-1/2">
                        </div>

                        <div class="w-5/12 pl-8">
                            <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200">
                                <h3 class="text-xl font-bold text-[#04b2f7]">somearch</h3>
                                <p class="mt-2 text-gray-700">
                                    Somearch undergoes a significant transformation, now led by two dedicated founders.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="relative flex items-center justify-between timeline-item">
                        <div class="w-5/12 pr-8 text-right">
                            <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200">
                                <h3 class="text-xl font-bold text-[#04b2f7]">aeratek</h3>
                                <p class="mt-2 text-gray-700">
                                    Somearch rebrands as aeratek, reflecting the company's evolution and growth.
                                </p>
                            </div>
                        </div>

                        <div
                            class="absolute left-1/2 w-6 h-6 bg-[#04b2f7] rounded-full border-4 border-white transform -translate-x-1/2">
                        </div>

                        <div class="w-5/12"></div>
                    </div>

                    <!-- Item 4 -->
                    <div class="relative flex items-center justify-between timeline-item">
                        <div class="w-5/12"></div>

                        <div
                            class="absolute left-1/2 w-6 h-6 bg-[#04b2f7] rounded-full border-4 border-white transform -translate-x-1/2">
                        </div>

                        <div class="w-5/12 pl-8">
                            <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200">
                                <h3 class="text-xl font-bold text-[#04b2f7]">aeratek</h3>
                                <p class="mt-2 text-gray-700">
                                    aeratek continues to build on its established foundation, maintaining steady growth and
                                    innovation.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Optional: Team Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Our Leadership Team</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Team member cards would go here -->
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
