    <!-- Services Section -->
    <section class="py-20 bg-white">
        <!-- Header -->
        <div class="max-w-3xl mx-auto text-center mb-16 py-5 scroll-reveal-section">
            <p class="text-lg uppercase text-[#04b2f7] font-semibold tracking-wider">Our Services</p>
            <h2 class="mt-4 px-4 text-3xl lg:text-4xl font-semibold text-gray-800 leading-tight">
                We possess techniques that can dismantle them into fragments
            </h2>
        </div>

        <div class="container mx-auto px-4 lg:px-8 space-y-24">
            <!-- Service Item 1 -->
            <div class="flex flex-col lg:flex-row items-center gap-12 scroll-reveal-row">
                <div class="lg:w-1/2 w-full transform transition duration-500 hover:scale-[1.02]">
                    <img src="{{ asset('image/Developer activity-bro (1).svg') }}" alt="Software Development"
                        class="w-full h-auto rounded-xl object-cover max-h-[460px]">
                </div>
                <div class="lg:w-1/2 w-full space-y-6">
                    <h3 class="text-3xl font-bold text-gray-800">Software Development</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        In the realm of coding quests, we are your digital heroes. Harness the power of our software
                        development prowess to turn your visions into groundbreaking digital solutions.
                        We don't just write code; we script success stories.
                    </p>
                    <div class="pt-2">
                        <a href="#" class="inline-flex items-center group text-[#04b2f7] font-semibold text-lg">
                            Learn More
                            <span class="ml-2 group-hover:translate-x-1 transition-transform duration-300">→</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service Item 2 (reverse on large screens) -->
            <div class="flex flex-col lg:flex-row-reverse items-center gap-12 scroll-reveal-row">
                <div class="lg:w-1/2 w-full transform transition duration-500 hover:scale-[1.02]">
                    <img src="{{ asset('image/Data extraction-rafiki (1).svg') }}" alt="Data Analytics"
                        class="w-full h-auto rounded-xl object-cover max-h-[460px]">
                </div>
                <div class="lg:w-1/2 w-full space-y-6 lg:pr-8">
                    <h3 class="text-3xl font-bold text-gray-800">Data Analytics</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Navigate the vast landscapes of data with our heroic analytics. From unraveling insights to
                        conquering data challenges, our expertise ensures your business emerges victorious.
                        We turn data into your most powerful ally.
                    </p>
                    <div class="pt-2">
                        <a href="#" class="inline-flex items-center group text-[#04b2f7] font-semibold text-lg">
                            Learn More
                            <span class="ml-2 group-hover:translate-x-1 transition-transform duration-300">→</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service Item 3 -->
            <div class="flex flex-col lg:flex-row items-center gap-12 scroll-reveal-row">
                <div class="lg:w-1/2 w-full transform transition duration-500 hover:scale-[1.02]">
                    <img src="{{ asset('image/Maintenance-bro (1).svg') }}" alt="IT Maintenance"
                        class="w-full h-auto rounded-xl object-cover max-h-[460px]">
                </div>
                <div class="lg:w-1/2 w-full space-y-6">
                    <h3 class="text-3xl font-bold text-gray-800">IT Maintenance</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        As guardians of your digital realm, we ensure seamless IT infrastructure. Count on our heroic
                        maintenance to keep your systems resilient, secure, and ever-ready for the challenges of the
                        digital
                        frontier.
                    </p>
                    <div class="pt-2">
                        <a href="#" class="inline-flex items-center group text-[#04b2f7] font-semibold text-lg">
                            Learn More
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
                See All Service →
            </a>
        </div>
    </section>
