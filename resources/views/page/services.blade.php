@extends('layout.header') <!-- nama file layout Anda -->

@section('title', 'Home Page')

@section('content')
<section
    class="relative overflow-hidden bg-gradient-to-b from-blue-50 via-transparent to-transparent pb-12 pt-20 sm:pb-16 sm:pt-32 lg:pb-24 xl:pb-32 xl:pt-40">
    <div class="relative z-10">
        <div
            class="absolute inset-x-0 top-1/2 -z-10 flex -translate-y-1/2 justify-center overflow-hidden [mask-image:radial-gradient(50%_45%_at_50%_55%,white,transparent)]">
            <svg class="h-[60rem] w-[100rem] flex-none stroke-blue-600 opacity-20" aria-hidden="true">
                <defs>
                    <pattern id="e9033f3e-f665-41a6-84ef-756f6778e6fe" width="200" height="200" x="50%" y="50%"
                        patternUnits="userSpaceOnUse" patternTransform="translate(-100 0)">
                        <path d="M.5 200V.5H200" fill="none"></path>
                    </pattern>
                </defs>
                <svg x="50%" y="50%" class="overflow-visible fill-blue-50">
                    <path d="M-300 0h201v201h-201Z M300 200h201v201h-201Z" stroke-width="0"></path>
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#e9033f3e-f665-41a6-84ef-756f6778e6fe)">
                </rect>
            </svg>
        </div>
    </div>
    <div class="relative z-20 mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                Refreshingly Sustainable:
                <span class="text-blue-600">Boxed Water
           </span>
            </h1>
            <h2 class="mt-6 text-lg leading-8 text-gray-600">
                Choose a more eco-friendly way to hydrate with our 100% recyclable cartons.
            </h2>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a class="isomorphic-link isomorphic-link--internal inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                    href="/login">Browse
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

<!-- New Interactive Process Section -->
<section class="py-16 bg-white" x-data="{ openTab: 'discover' }">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-5">Lorem Ipsum</h2>
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-5">Lorem ipsum dolor sit amet consectetur  </h2>
        
        <!-- Tabs Navigation -->
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            <button 
                @click="openTab = 'discover'" 
                :class="{'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg': openTab === 'discover', 'bg-white hover:bg-gray-50 border border-gray-200': openTab !== 'discover'}"
                class="px-6 py-3 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50"
            >
                Discover
            </button>
            <button 
                @click="openTab = 'define'" 
                :class="{'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg': openTab === 'define', 'bg-white hover:bg-gray-50 border border-gray-200': openTab !== 'define'}"
                class="px-6 py-3 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50"
            >
                Define
            </button>
            <button 
                @click="openTab = 'design'" 
                :class="{'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg': openTab === 'design', 'bg-white hover:bg-gray-50 border border-gray-200': openTab !== 'design'}"
                class="px-6 py-3 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50"
            >
                Design
            </button>
            <button 
                @click="openTab = 'develop'" 
                :class="{'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg': openTab === 'develop', 'bg-white hover:bg-gray-50 border border-gray-200': openTab !== 'develop'}"
                class="px-6 py-3 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50"
            >
                Develop
            </button>
            <button 
                @click="openTab = 'deliver'" 
                :class="{'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg': openTab === 'deliver', 'bg-white hover:bg-gray-50 border border-gray-200': openTab !== 'deliver'}"
                class="px-6 py-3 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50"
            >
                Deliver
            </button>
        </div>

        <!-- Tab Contents -->
        <div class="bg-gradient-to-b from-blue-50 to-white p-5 rounded-xl shadow-sm border border-gray-100 max-w-lg mx-auto min-h-[300px]">
            <!-- Discover Content -->
            <div x-show="openTab === 'discover'" x-transition class="h-full flex flex-col space-y-3">
                <h3 class="text-xl font-bold text-blue-600">Discover Phase</h3>
                <p class="text-gray-700 text-sm flex-grow">We analyze your hydration needs and explore sustainable solutions through comprehensive market research and environmental impact analysis.</p>
                <ul class="list-disc pl-5 space-y-1 text-gray-600 text-sm">
                    <li>Market trend analysis</li>
                    <li>Sustainability research</li>
                    <li>Consumer behavior studies</li>
                </ul>
            </div>
        
            <!-- Define Content -->
            <div x-show="openTab === 'define'" x-transition class="h-full flex flex-col space-y-3">
                <h3 class="text-xl font-bold text-blue-600">Define Phase</h3>
                <p class="text-gray-700 text-sm flex-grow">We outline clear objectives and product requirements to perfectly align with your sustainability goals and business vision.</p>
                <ul class="list-disc pl-5 space-y-1 text-gray-600 text-sm">
                    <li>Product specifications</li>
                    <li>Eco-friendly material selection</li>
                    <li>Supply chain planning</li>
                </ul>
            </div>
        
            <!-- Design Content -->
            <div x-show="openTab === 'design'" x-transition class="h-full flex flex-col space-y-3">
                <h3 class="text-xl font-bold text-blue-600">Design Phase</h3>
                <p class="text-gray-700 text-sm flex-grow">We create innovative sustainable packaging designs that combine functionality with environmental responsibility.</p>
                <ul class="list-disc pl-5 space-y-1 text-gray-600 text-sm">
                    <li>Eco-friendly packaging concepts</li>
                    <li>Material testing</li>
                    <li>Branding integration</li>
                </ul>
            </div>
        
            <!-- Develop Content -->
            <div x-show="openTab === 'develop'" x-transition class="h-full flex flex-col space-y-3">
                <h3 class="text-xl font-bold text-blue-600">Develop Phase</h3>
                <p class="text-gray-700 text-sm flex-grow">We manufacture your boxed water solution implementing sustainable practices at every production step.</p>
                <ul class="list-disc pl-5 space-y-1 text-gray-600 text-sm">
                    <li>Prototype development</li>
                    <li>Sustainable production processes</li>
                    <li>Quality assurance testing</li>
                </ul>
            </div>
        
            <!-- Deliver Content -->
            <div x-show="openTab === 'deliver'" x-transition class="h-full flex flex-col space-y-3">
                <h3 class="text-xl font-bold text-blue-600">Deliver Phase</h3>
                <p class="text-gray-700 text-sm flex-grow">We distribute your sustainable hydration solution through eco-conscious channels while providing ongoing support.</p>
                <ul class="list-disc pl-5 space-y-1 text-gray-600 text-sm">
                    <li>Eco-conscious distribution</li>
                    <li>Retailer partnerships</li>
                    <li>Customer education programs</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">SERVICES</h2>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                We possess techniques that can dismantle them into fragments
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Heroic Software Crafting -->
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex items-start">
                    <div class="flex-shrink-0 bg-blue-100 p-3 rounded-lg">
                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Heroic Software Crafting</h3>
                        <p class="text-gray-700">
                            In the realm of coding quests, we are your digital heroes. Harness the power of our software development resources to turn your online vision into reality.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Heroic Data Mastery -->
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex items-start">
                    <div class="flex-shrink-0 bg-blue-100 p-3 rounded-lg">
                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Heroic Data Mastery</h3>
                        <p class="text-gray-700">
                            Navigate the vast landscapes of data with our heroic analytics. From unraveling insights to overcoming data challenges, our expertise ensures you make informed decisions.
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex items-start">
                    <div class="flex-shrink-0 bg-blue-100 p-3 rounded-lg">
                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Heroic Data Mastery</h3>
                        <p class="text-gray-700">
                            Navigate the vast landscapes of data with our heroic analytics. From unraveling insights to overcoming data challenges, our expertise ensures you make informed decisions.
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex items-start">
                    <div class="flex-shrink-0 bg-blue-100 p-3 rounded-lg">
                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Heroic Data Mastery</h3>
                        <p class="text-gray-700">
                            Navigate the vast landscapes of data with our heroic analytics. From unraveling insights to overcoming data challenges, our expertise ensures you make informed decisions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Make sure Alpine.js is loaded -->
<script src="//unpkg.com/alpinejs" defer></script>
@endsection