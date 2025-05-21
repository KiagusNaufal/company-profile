    <!-- Services Section -->
    <section class="py-20 bg-white">
        <!-- Header -->
        <div class="max-w-3xl mx-auto text-center mb-16 py-5 scroll-reveal-section">
            <p class="text-lg uppercase text-[#04b2f7] font-semibold tracking-wider">{{ __('message.home.services.title') }}</p>
            <h2 class="mt-4 px-4 text-3xl lg:text-4xl font-semibold text-gray-800 leading-tight">
                {{ __('message.home.services.description') }}
            </h2>
        </div>

        <div class="container mx-auto px-4 lg:px-8 space-y-24">
            <!-- Service Item 1 -->
            <div class="flex flex-col lg:flex-row items-center gap-12 scroll-reveal-row">
                <div class="lg:w-1/2 w-full transform transition duration-500 hover:scale-[1.02]">
                    <img src="{{ secure_asset('image/Developer activity-bro (1).svg') }}" alt="Software Development"
                        class="w-full h-auto rounded-xl object-cover max-h-[460px]">
                </div>
                <div class="lg:w-1/2 w-full space-y-6">
                    <h3 class="text-3xl font-bold text-gray-800">{{ __('message.home.services.items.development') }}</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        {{ __('message.home.services.items.description1') }}
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('services') }}" class="inline-flex items-center group text-[#04b2f7] font-semibold text-lg">
                            {{ __('message.home.services.title') }}
                            <span class="ml-2 group-hover:translate-x-1 transition-transform duration-300">→</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service Item 2 (reverse on large screens) -->
            <div class="flex flex-col lg:flex-row-reverse items-center gap-12 scroll-reveal-row">
                <div class="lg:w-1/2 w-full transform transition duration-500 hover:scale-[1.02]">
                    <img src="{{ secure_asset('image/Data extraction-rafiki (1).svg') }}" alt="Data Analytics"
                        class="w-full h-auto rounded-xl object-cover max-h-[460px]">
                </div>
                <div class="lg:w-1/2 w-full space-y-6 lg:pr-8">
                    <h3 class="text-3xl font-bold text-gray-800">{{ __('message.home.services.items.analytics') }}</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        {{ __('message.home.services.items.description2') }}
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('services') }}" class="inline-flex items-center group text-[#04b2f7] font-semibold text-lg">
                            {{ __('message.home.services.title') }}
                            <span class="ml-2 group-hover:translate-x-1 transition-transform duration-300">→</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service Item 3 -->
            <div class="flex flex-col lg:flex-row items-center gap-12 scroll-reveal-row">
                <div class="lg:w-1/2 w-full transform transition duration-500 hover:scale-[1.02]">
                    <img src="{{ secure_asset('image/Maintenance-bro (1).svg') }}" alt="IT Maintenance"
                        class="w-full h-auto rounded-xl object-cover max-h-[460px]">
                </div>
                <div class="lg:w-1/2 w-full space-y-6">
                    <h3 class="text-3xl font-bold text-gray-800">{{ __('message.home.services.items.it_support') }}</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        {{ __('message.home.services.items.description3') }}
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('services') }}" class="inline-flex items-center group text-[#04b2f7] font-semibold text-lg">
                            {{ __('message.home.services.title') }}
                            <span class="ml-2 group-hover:translate-x-1 transition-transform duration-300">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- See All Services Button -->
        <div class="mt-16 text-center">
            <a href="{{ route('services') }}"
                class="inline-block px-8 py-3 border border-[#04b2f7] text-[#04b2f7] rounded-lg hover:bg-[#04b2f7] hover:text-white transition">
                {{ __('message.home.services.all_services') }}
            </a>
        </div>
    </section>
