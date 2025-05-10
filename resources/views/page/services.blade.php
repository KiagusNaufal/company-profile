@extends('layout.header')

@section('title', 'Home Page')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-b from-[#04b2f7]/10 via-transparent to-transparent pb-8 pt-20 sm:pb-12 sm:pt-32 lg:pb-16 xl:pb-24 xl:pt-40 scroll-reveal-section">
    <div class="relative z-10">
        <div class="absolute inset-x-0 top-1/2 -z-10 flex -translate-y-1/2 justify-center overflow-hidden [mask-image:radial-gradient(50%_45%_at_50%_55%,white,transparent)]">
            <svg class="h-[60rem] w-[100rem] flex-none stroke-[#04b2f7] opacity-20" aria-hidden="true">
                <defs>
                    <pattern id="e9033f3e-f665-41a6-84ef-756f6778e6fe" width="200" height="200" x="50%" y="50%"
                        patternUnits="userSpaceOnUse" patternTransform="translate(-100 0)">
                        <path d="M.5 200V.5H200" fill="none"></path>
                    </pattern>
                </defs>
                <svg x="50%" y="50%" class="overflow-visible fill-[#04b2f7]/10">
                    <path d="M-300 0h201v201h-201Z M300 200h201v201h-201Z" stroke-width="0"></path>
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#e9033f3e-f665-41a6-84ef-756f6778e6fe)"></rect>
            </svg>
        </div>
    </div>
    <div class="relative z-20 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl md:text-5xl lg:text-6xl">
                Innovative Digital Solutions:
                <span class="text-[#04b2f7]">Future Ready</span>
            </h1>
            <h2 class="mt-4 text-base leading-7 text-gray-600 sm:text-lg sm:leading-8 md:text-xl md:leading-8">
                We craft cutting-edge digital experiences that transform businesses and delight users.
            </h2>
            <div class="mt-8 flex items-center justify-center gap-x-6">
                <a class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#04b2f7] px-4 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-[#0399d9] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#04b2f7]"
                    href="/login">
                    Explore Solutions
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="pt-8 pb-16 bg-white scroll-reveal-section" x-data="{ openTab: 'discover' }">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-1 ">Our Proven Process</h2>
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-5 ">Delivering Excellence at Every Stage</h2>

        </div>

        <!-- Tabs Navigation -->
        <div class="flex flex-wrap justify-center gap-2 mb-6 sm:gap-4 sm:mb-8">
            <button @click="openTab = 'discover'"
                :class="{'bg-gradient-to-r from-[#04b2f7] to-[#0399d9] text-white shadow-lg': openTab === 'discover', 'bg-white hover:bg-gray-50 border border-gray-200': openTab !== 'discover'}"
                class="px-4 py-2 rounded-lg font-medium text-sm sm:px-6 sm:py-3 sm:text-base sm:rounded-xl sm:font-semibold transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#04b2f7] focus:ring-opacity-50">
                Research
            </button>
            <button @click="openTab = 'define'"
                :class="{'bg-gradient-to-r from-[#04b2f7] to-[#0399d9] text-white shadow-lg': openTab === 'define', 'bg-white hover:bg-gray-50 border border-gray-200': openTab !== 'define'}"
                class="px-4 py-2 rounded-lg font-medium text-sm sm:px-6 sm:py-3 sm:text-base sm:rounded-xl sm:font-semibold transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#04b2f7] focus:ring-opacity-50">
                Strategy
            </button>
            <button @click="openTab = 'design'"
                :class="{'bg-gradient-to-r from-[#04b2f7] to-[#0399d9] text-white shadow-lg': openTab === 'design', 'bg-white hover:bg-gray-50 border border-gray-200': openTab !== 'design'}"
                class="px-4 py-2 rounded-lg font-medium text-sm sm:px-6 sm:py-3 sm:text-base sm:rounded-xl sm:font-semibold transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#04b2f7] focus:ring-opacity-50">
                Creation
            </button>
            <button @click="openTab = 'develop'"
                :class="{'bg-gradient-to-r from-[#04b2f7] to-[#0399d9] text-white shadow-lg': openTab === 'develop', 'bg-white hover:bg-gray-50 border border-gray-200': openTab !== 'develop'}"
                class="px-4 py-2 rounded-lg font-medium text-sm sm:px-6 sm:py-3 sm:text-base sm:rounded-xl sm:font-semibold transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#04b2f7] focus:ring-opacity-50">
                Implementation
            </button>
            <button @click="openTab = 'deliver'"
                :class="{'bg-gradient-to-r from-[#04b2f7] to-[#0399d9] text-white shadow-lg': openTab === 'deliver', 'bg-white hover:bg-gray-50 border border-gray-200': openTab !== 'deliver'}"
                class="px-4 py-2 rounded-lg font-medium text-sm sm:px-6 sm:py-3 sm:text-base sm:rounded-xl sm:font-semibold transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#04b2f7] focus:ring-opacity-50">
                Optimization
            </button>
        </div>

        <!-- Tab Contents -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 mx-auto max-w-4xl sm:p-8 sm:rounded-xl">
            <!-- Research Content -->
            <div x-show="openTab === 'discover'" x-transition class="flex flex-col gap-6 items-center md:flex-row">
                <div class="w-full md:w-1/3">
                    <img src="{{ asset('image/define.svg') }}" alt="Research Phase" class="w-full h-auto rounded-lg object-cover">
                </div>
                <div class="w-full md:w-2/3">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 sm:text-2xl">In-Depth Research</h3>
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                        We begin every project with comprehensive market and user research to identify opportunities and challenges. Our team analyzes industry trends, competitor landscapes, and user behaviors to build a solid foundation for your solution.
                    </p>
                </div>
            </div>

            <!-- Strategy Content -->
            <div x-show="openTab === 'define'" x-transition class="flex flex-col gap-6 items-center md:flex-row">
                <div class="w-full md:w-1/3">
                    <img src="{{ asset('image/delivery.svg') }}" alt="Strategy Phase" class="w-full h-auto rounded-lg object-cover">
                </div>
                <div class="w-full md:w-2/3">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 sm:text-2xl">Strategic Planning</h3>
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                        Transforming insights into actionable strategies, we define clear objectives, KPIs, and roadmaps. Our strategic approach ensures alignment with your business goals while anticipating future needs and market shifts.
                    </p>
                </div>
            </div>

            <!-- Creation Content -->
            <div x-show="openTab === 'design'" x-transition class="flex flex-col gap-6 items-center md:flex-row">
                <div class="w-full md:w-1/3">
                    <img src="{{ asset('image/design.svg') }}" alt="Creation Phase" class="w-full h-auto rounded-lg object-cover">
                </div>
                <div class="w-full md:w-2/3">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 sm:text-2xl">Creative Development</h3>
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                        Our design and development teams collaborate to create innovative solutions that balance aesthetics, functionality, and technical excellence. We prototype, test, and refine until we achieve perfection.
                    </p>
                </div>
            </div>

            <!-- Implementation Content -->
            <div x-show="openTab === 'develop'" x-transition class="flex flex-col gap-6 items-center md:flex-row">
                <div class="w-full md:w-1/3">
                    <img src="{{ asset('image/develop.svg') }}" alt="Implementation Phase" class="w-full h-auto rounded-lg object-cover">
                </div>
                <div class="w-full md:w-2/3">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 sm:text-2xl">Precision Implementation</h3>
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                        We bring solutions to life with meticulous attention to detail. Our agile development process ensures quality at every stage, with continuous integration and deployment for seamless delivery.
                    </p>
                </div>
            </div>

            <!-- Optimization Content -->
            <div x-show="openTab === 'deliver'" x-transition class="flex flex-col gap-6 items-center md:flex-row">
                <div class="w-full md:w-1/3">
                    <img src="{{ asset('image/discover.svg') }}" alt="Optimization Phase" class="w-full h-auto rounded-lg object-cover">
                </div>
                <div class="w-full md:w-2/3">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 sm:text-2xl">Continuous Optimization</h3>
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                        Our relationship continues after launch. We monitor performance, gather user feedback, and implement data-driven improvements to ensure your solution evolves with your business needs.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-12 bg-[#04b2f7]/10 sm:py-16 scroll-reveal-section">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 sm:mb-12">
            <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl">OUR EXPERTISE</h2>
            <p class="mt-2 text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">
                Comprehensive digital solutions tailored to your unique business requirements
            </p>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:gap-8">
            <!-- Custom Software Development -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow sm:p-8 scroll-reveal-card">
                <div class="flex items-start">
                    <div class="flex-shrink-0 bg-[#04b2f7]/10 p-3 rounded-lg">
                        <svg class="h-6 w-6 text-[#04b2f7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2 sm:text-xl">Custom Software Development</h3>
                        <p class="text-gray-700 text-sm sm:text-base">
                            Bespoke software solutions designed to streamline your operations and enhance productivity. From enterprise systems to specialized tools, we build applications that give you a competitive edge.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Data Analytics & AI -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow sm:p-8 scroll-reveal-card">
                <div class="flex items-start">
                    <div class="flex-shrink-0 bg-[#04b2f7]/10 p-3 rounded-lg">
                        <svg class="h-6 w-6 text-[#04b2f7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2 sm:text-xl">Data Analytics & AI</h3>
                        <p class="text-gray-700 text-sm sm:text-base">
                            Transform raw data into actionable intelligence with our advanced analytics and machine learning solutions. We help you uncover patterns, predict trends, and make data-driven decisions.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Cloud Solutions -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow sm:p-8 scroll-reveal-card">
                <div class="flex items-start">
                    <div class="flex-shrink-0 bg-[#04b2f7]/10 p-3 rounded-lg">
                        <svg class="h-6 w-6 text-[#04b2f7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2 sm:text-xl">Cloud Solutions</h3>
                        <p class="text-gray-700 text-sm sm:text-base">
                            Scalable, secure cloud infrastructure and services to power your digital transformation. We specialize in migration, optimization, and management across all major cloud platforms.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Cybersecurity -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow sm:p-8 scroll-reveal-card">
                <div class="flex items-start">
                    <div class="flex-shrink-0 bg-[#04b2f7]/10 p-3 rounded-lg">
                        <svg class="h-6 w-6 text-[#04b2f7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2 sm:text-xl">Cybersecurity Services</h3>
                        <p class="text-gray-700 text-sm sm:text-base">
                            Comprehensive security solutions to protect your digital assets. From vulnerability assessments to implementation of advanced security frameworks, we safeguard your business.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="py-12 bg-white px-4 sm:px-6 sm:py-16 scroll-reveal-section">
    <div class="max-w-6xl mx-auto">
      <!-- Heading Section -->
      <div class="text-center mb-8 sm:mb-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-2 sm:text-3xl">TECHNOLOGIES</h2>
        <h3 class="text-lg font-medium text-gray-700 mb-3 sm:text-xl">Our Ever-Forward Approach</h3>
        <p class="text-gray-600 max-w-3xl mx-auto text-sm sm:text-base">
          We use the latest technologies and best practices to deliver high-quality apps.
        </p>
      </div>

      <!-- Pyramid Grid Layout -->
      <div class="flex flex-col items-center">
        <!-- Row 1 (7 items) -->
        <div class="flex flex-wrap justify-center mb-2 gap-2 sm:gap-3">
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="Laravel" />
            <span class="text-xs font-medium text-gray-700">Laravel</span>
          </div>
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="Docker" />
            <span class="text-xs font-medium text-gray-700">Docker</span>
          </div>
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="Flutter" />
            <span class="text-xs font-medium text-gray-700">Flutter</span>
          </div>
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="Golang" />
            <span class="text-xs font-medium text-gray-700">Golang</span>
          </div>
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/googlecloud/googlecloud-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="Google Cloud" />
            <span class="text-xs font-medium text-gray-700">G Cloud</span>
          </div>
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="Java" />
            <span class="text-xs font-medium text-gray-700">Java</span>
          </div>
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kubernetes/kubernetes-plain.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="Kubernetes" />
            <span class="text-xs font-medium text-gray-700">K8s</span>
          </div>
        </div>

        <!-- Row 2 (5 items) -->
        <div class="flex flex-wrap justify-center mb-2 gap-2 sm:gap-3">
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="MongoDB" />
            <span class="text-xs font-medium text-gray-700">MongoDB</span>
          </div>
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="MySQL" />
            <span class="text-xs font-medium text-gray-700">MySQL</span>
          </div>
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nextjs/nextjs-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="NextJS" />
            <span class="text-xs font-medium text-gray-700">NextJS</span>
          </div>
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="NodeJS" />
            <span class="text-xs font-medium text-gray-700">NodeJS</span>
          </div>
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nuxtjs/nuxtjs-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="NuxtJS" />
            <span class="text-xs font-medium text-gray-700">NuxtJS</span>
          </div>
        </div>

        <!-- Row 3 (3 items) -->
        <div class="flex flex-wrap justify-center mb-2 gap-2 sm:gap-3">
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="PHP" />
            <span class="text-xs font-medium text-gray-700">PHP</span>
          </div>
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="PostgreSQL" />
            <span class="text-xs font-medium text-gray-700">PostgreSQL</span>
          </div>
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" class="w-5 h-5 mb-1 group-hover:scale-125 transition-transform sm:w-6 sm:h-6" alt="React" />
            <span class="text-xs font-medium text-gray-700">React</span>
          </div>
        </div>

        <!-- Row 4 (1 item) -->
        <div class="flex justify-center">
          <div class="tech-item group relative bg-gray-50 rounded-lg p-2 flex flex-col items-center justify-center transition-all duration-300 hover:bg-[#04b2f7]/10 hover:shadow-xs hover:-translate-y-1 h-16 w-16 sm:h-20 sm:w-20 scroll-reveal-row">
            <div class="w-5 h-5 mb-1 flex items-center justify-center text-[#04b2f7] group-hover:text-[#0399d9] sm:w-6 sm:h-6">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
            </div>
            <span class="text-xs font-medium text-gray-700">+15 more</span>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 sm:py-16 md:py-20 lg:py-24 scroll-reveal-section">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl max-w-7xl mx-auto shadow-md">
            <div class="flex flex-col lg:flex-row items-center justify-between w-full py-6 sm:py-8 md:py-10 lg:py-12 gap-6 lg:gap-8 px-6 sm:px-8 lg:px-10">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-black dark:text-white text-center lg:text-left max-w-2xl">
                    <span class="block">
                        Ready to transform your business?
                    </span>
                    <span class="block text-[#04b2f7]">
                        Let's build something amazing together
                    </span>
                </h2>

                <div class="w-full sm:w-auto lg:flex-shrink-0">
                    <div class="inline-flex rounded-md shadow w-full sm:w-auto">
                        <button type="button" class="py-3 px-6 sm:px-8 md:px-10 bg-[#04b2f7] hover:bg-[#0399d9] text-white w-full transition ease-in duration-200 text-center text-base sm:text-lg font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-[#04b2f7] focus:ring-offset-2 rounded-lg">
                            Get Started Today
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Basic configuration
        if (document.getElementById('threejs-canvas')) {
            initThreeJS();
        }
    });

    // Staggered animation with shorter delay
    document.addEventListener('DOMContentLoaded', () => {
      const techItems = document.querySelectorAll('.tech-item');
      techItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(10px)';

        setTimeout(() => {
          item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
          item.style.opacity = '1';
          item.style.transform = 'translateY(0)';
        }, 50 * index);
      });
    });

document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi Three.js cards
    const init3DCard = (containerId, color) => {
        const container = document.getElementById(containerId);
        if (!container) return;

        const width = container.clientWidth;
        const height = container.clientHeight;

        // Scene setup
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, width / height, 0.1, 1000);
        camera.position.z = 5;

        const renderer = new THREE.WebGLRenderer({
            antialias: true,
            alpha: true
        });
        renderer.setSize(width, height);
        container.appendChild(renderer.domElement);

        // Object
        const geometry = new THREE.IcosahedronGeometry(1.5, 1);
        const material = new THREE.MeshStandardMaterial({
            color: color,
            metalness: 0.7,
            roughness: 0.4
        });
        const mesh = new THREE.Mesh(geometry, material);
        scene.add(mesh);

        // Lighting
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
        directionalLight.position.set(1, 1, 1);
        scene.add(directionalLight);

        // Animation
        const animate = () => {
            requestAnimationFrame(animate);
            mesh.rotation.x += 0.005;
            mesh.rotation.y += 0.01;
            renderer.render(scene, camera);
        };

        animate();
    };

    // Inisialisasi semua cards
    init3DCard('card-1', 0x04b2f7);
    init3DCard('card-2', 0x6c5ce7);
    init3DCard('card-3', 0x00b894);
});
</script>

@endsection
