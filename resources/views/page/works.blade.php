@extends('layout.header')

@section('content')
    <!-- Works Hero Section -->
<!-- Works Hero Section -->
<section class="relative py-8 md:py-12 lg:py-16 min-h-[40vh] md:min-h-[50vh] bg-gradient-to-br from-blue-50 to-indigo-50 overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Floating Circles - Adjusted sizes for better responsiveness -->
        <div class="absolute top-16 left-8 w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-blue-100 rounded-full opacity-30 animate-float-1"></div>
        <div class="absolute top-1/3 right-8 sm:right-12 w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 bg-indigo-100 rounded-full opacity-20 animate-float-2"></div>
        <div class="absolute bottom-16 left-1/4 w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-blue-200 rounded-full opacity-25 animate-float-3"></div>

        <!-- Grid Pattern - Fixed size for all screen -->
        <div class="absolute inset-0 opacity-3">
            <svg class="absolute left-0 top-0" width="100vw" height="100vh" viewBox="0 0 1920 1080" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <defs>
                    <pattern id="grid-pattern" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M 60 0 L 0 0 0 60" fill="none" stroke="#04b2f7" stroke-width="0.3" opacity="0.15" />
                    </pattern>
                </defs>
                <rect width="1920" height="1080" fill="url(#grid-pattern)" />
            </svg>
        </div>
    </div>

    <div class="relative container mx-auto px-4 sm:px-6 h-full flex flex-col justify-center items-center text-center">
        <!-- Title with consistent sizing -->
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-5 leading-tight">
            {{ __('works.hero.title1') }}
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#04b2f7] to-[#6366f1] block sm:inline">
                {{ __('works.hero.title2') }}
            </span>
        </h1>

        <!-- Subtitle with proper line clamping -->
        <p class="text-xs sm:text-sm md:text-base text-gray-600 max-w-2xl mx-auto mb-5 md:mb-6 px-4 leading-relaxed line-clamp-3">
            {{ __('works.hero.subtitle') }}
        </p>

        <!-- CTA Button with consistent sizing -->
        <div>
            <a href="#projects" class="inline-flex items-center px-4 py-1.5 sm:px-5 sm:py-2 bg-gradient-to-r from-[#04b2f7] to-[#6366f1] text-white font-medium rounded-full shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 text-sm sm:text-base">
                <span class="mr-2">{{ __('works.hero.button') }}</span>
                <svg class="w-3 h-3 sm:w-4 sm:h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>

        <!-- Scrolling indicator -->
        <div class="absolute bottom-4 sm:bottom-6 left-0 right-0 flex justify-center animate-bounce">
            <div class="w-5 h-8 flex justify-center">
                <div class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></div>
            </div>
        </div>
    </div>
</section>

    <!-- Projects Grid Section -->
    <section id="projects" class="py-10 sm:py-12 md:py-16 lg:py-20 bg-white scroll-reveal-section">
        <div class="container mx-auto px-4 sm:px-6">
            <!-- Section Header -->
            <div class="text-center mb-10 sm:mb-12 md:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    {{ __('works.projects.title') }}
                </h2>
                <p class="text-sm sm:text-base md:text-lg text-gray-600 max-w-2xl mx-auto">
                    {{ __('works.projects.subtitle') }}
                </p>
            </div>

            <!-- Filter Tabs - Updated with better mobile sizing -->
            <div
                class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-6 sm:mb-8 md:mb-12 px-2 overflow-x-auto pb-2 filter-tabs">
                <button data-category="all"
                    class="category-filter px-3 py-1 sm:px-4 sm:py-2 rounded-full font-medium text-xs sm:text-sm bg-blue-500 text-white shadow-md transition-colors active">
                    All Projects
                </button>
                @foreach ($categories as $category)
                    <button data-category="{{ $category->id }}"
                        class="category-filter px-3 py-1 sm:px-4 sm:py-2 rounded-full font-medium text-xs sm:text-sm bg-white text-gray-700 border border-gray-200 hover:bg-gray-50 transition-colors">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8 scroll-reveal-card">
                @foreach ($projects as $project)
                    <div class="project-card group overflow-hidden rounded-lg sm:rounded-xl md:rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 md:hover:-translate-y-2 scroll-reveal-item"
                        data-category="{{ $project->kategori->id }}">
                        <!-- Image Container with Ribbon -->
                        <div class="relative h-48 sm:h-56 md:h-64 lg:h-72 w-full overflow-hidden">
                            <!-- Ribbon for Featured Projects -->
                            @if ($project->is_featured)
                                <div
                                    class="absolute top-2 right-2 sm:top-3 sm:right-3 md:top-4 md:right-4 z-10 bg-yellow-400 text-xs font-bold px-2 py-1 sm:px-3 sm:py-1 rounded-full shadow-md">
                                    Featured
                                </div>
                            @endif
                            <img src="{{ secure_asset('storage/' . cetak($project->image)) }}"
                                alt="{{ cetak($project->title) }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                loading="lazy"
                                onerror="this.src='https://via.placeholder.com/800x600?text=Image+Not+Available'; this.className='w-full h-full object-contain bg-gray-100 p-4'">

                            <!-- Hover Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-3 sm:p-4 md:p-6">
                                <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    <h3 class="text-base sm:text-lg md:text-xl font-bold text-white">
                                        {{ cetak($project->name) }}</h3>
                                    <p class="text-blue-200 mt-1 text-xs sm:text-sm md:text-base line-clamp-2">
                                        {{ cetak($project->short_description) }}</p>
                                </div>
                            </div>
                        </div>

                    <!-- Content Container -->
                                       <div class="p-4 sm:p-5 md:p-6 bg-white scroll-reveal-item">
                        <div class="flex items-center justify-between mb-2 sm:mb-3">
                            <span class="text-xs {{ cetak($project->badge_color) }} px-2 py-1 rounded-full font-medium">
                                {{ cetak($project->kategori->name) }}
                            </span>
                            <div class="flex items-center text-yellow-400">
                                <!-- Star Ratings -->
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="text-gray-600 text-xs sm:text-sm ml-1">4.8</span>
                            </div>
                        </div>
                        <!-- Progress Bar (for crowdfunding projects) -->
                        @if($project->funding_goal)
                        <div class="mb-3 sm:mb-4">
                            <div class="flex justify-between text-xs text-gray-500 mb-1">
                                <span>{{ ceil(($project->funds_raised / $project->funding_goal) * 100) }}% funded</span>
                                <span>Rp {{ number_format($project->funds_raised) }} of Rp {{ number_format($project->funding_goal) }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: {{ ($project->funds_raised / $project->funding_goal) * 100 }}%"></div>
                            </div>
                        </div>
                        @endif
                        <!-- ... (previous content remains the same until buttons) ... -->

                            <!-- Button Container - Updated with better mobile sizing -->
                            <div class="flex space-x-3 mt-4 sm:mt-5 md:mt-6 scroll-reveal-item">
    <!-- View Details Button -->
    <a href="{{ route('project.detail', ['id' => cetak($project->id), 'slug' => Str::slug(cetak($project->name))]) }}"
        class="flex-1 inline-flex items-center justify-center px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#04b2f7] transition-colors">
        {{ __('works.card.view_details') }}
    </a>
</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No Projects Message (Hidden by default) -->
            <div id="no-projects-message" class="text-center py-10 sm:py-12 hidden">
                <div class="mx-auto w-20 h-20 sm:w-24 sm:h-24 mb-4 sm:mb-6 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-medium text-gray-900 mb-2">No projects found</h3>
                <p class="text-gray-500 max-w-md mx-auto text-sm sm:text-base">We couldn't find any projects matching your
                    selected category. Please try another category.</p>
                <button
                    class="mt-4 sm:mt-6 px-5 py-2 sm:px-6 sm:py-3 border border-blue-500 text-blue-500 rounded-lg font-medium hover:bg-blue-50 transition-colors text-sm sm:text-base"
                    onclick="resetFilters()">
                    Reset Filters
                </button>
            </div>

            <!-- Pagination or Load More -->
            <div class="mt-10 sm:mt-12 md:mt-16 text-center">
                <button
                    class="px-4 py-2 sm:px-5 sm:py-2 md:px-6 md:py-3 border border-blue-500 text-blue-500 rounded-lg font-medium hover:bg-blue-50 transition-colors text-sm sm:text-base">
                    Load More Projects
                </button>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-10 sm:py-12 md:py-16 lg:py-20 bg-gray-50 scroll-reveal-section">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-10 sm:mb-12 md:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    What Our Clients Say
                </h2>
                <p class="text-sm sm:text-base md:text-lg text-gray-600 max-w-2xl mx-auto">
                    Don't just take our word for it - hear from some of our satisfied customers
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">
                <!-- Testimonial 1 -->
                <div
                    class="bg-white p-5 sm:p-6 md:p-8 rounded-lg sm:rounded-xl shadow-md hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full overflow-hidden mr-3 sm:mr-4">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Client"
                                class="w-full h-full object-cover" loading="lazy">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm sm:text-base">Sarah Johnson</h4>
                            <p class="text-xs sm:text-sm text-gray-500">CEO, TechSolutions</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-3 sm:mb-4 text-sm sm:text-base">
                        "The platform exceeded our expectations. The quality of work and attention to detail was
                        exceptional."
                    </p>
                    <div class="flex text-yellow-400">
                        <!-- 5 stars -->
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div
                    class="bg-white p-5 sm:p-6 md:p-8 rounded-lg sm:rounded-xl shadow-md hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full overflow-hidden mr-3 sm:mr-4">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Client"
                                class="w-full h-full object-cover" loading="lazy">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm sm:text-base">Michael Chen</h4>
                            <p class="text-xs sm:text-sm text-gray-500">Marketing Director</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-3 sm:mb-4 text-sm sm:text-base">
                        "Incredibly responsive team that delivered exactly what we needed ahead of schedule. Will definitely
                        work with them again."
                    </p>
                    <div class="flex text-yellow-400">
                        <!-- 5 stars -->
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div
                    class="bg-white p-5 sm:p-6 md:p-8 rounded-lg sm:rounded-xl shadow-md hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full overflow-hidden mr-3 sm:mr-4">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Client"
                                class="w-full h-full object-cover" loading="lazy">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm sm:text-base">Emma Rodriguez</h4>
                            <p class="text-xs sm:text-sm text-gray-500">Founder, StartupX</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-3 sm:mb-4 text-sm sm:text-base">
                        "As a startup, we needed cost-effective solutions without compromising quality. They delivered
                        perfectly."
                    </p>
                    <div class="flex text-yellow-400">
                        <!-- 5 stars -->
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-10 sm:py-12 md:py-16 bg-gradient-to-r from-blue-500 to-indigo-600 text-white scroll-reveal-section">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 md:gap-8 text-center">
                <div class="p-4 sm:p-5 md:p-6">
                    <div class="text-2xl sm:text-3xl md:text-4xl font-bold mb-1 sm:mb-2 animate-count" data-target="150">0
                    </div>
                    <div class="text-xs sm:text-sm uppercase tracking-wider">Projects Completed</div>
                </div>
                <div class="p-4 sm:p-5 md:p-6">
                    <div class="text-2xl sm:text-3xl md:text-4xl font-bold mb-1 sm:mb-2 animate-count" data-target="98">0
                    </div>
                    <div class="text-xs sm:text-sm uppercase tracking-wider">Happy Clients</div>
                </div>
                <div class="p-4 sm:p-5 md:p-6">
                    <div class="text-2xl sm:text-3xl md:text-4xl font-bold mb-1 sm:mb-2 animate-count" data-target="12">0
                    </div>
                    <div class="text-xs sm:text-sm uppercase tracking-wider">Awards Won</div>
                </div>
                <div class="p-4 sm:p-5 md:p-6">
                    <div class="text-2xl sm:text-3xl md:text-4xl font-bold mb-1 sm:mb-2 animate-count" data-target="24">0
                    </div>
                    <div class="text-xs sm:text-sm uppercase tracking-wider">Team Members</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <x-cta-section></x-cta-section>

    <!-- Payment Modal -->
    @include('partials.form-pembayaran')

    <style>
        /* Animations */
       .line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}

.animate-float-1 { animation: float 6s ease-in-out infinite; }
.animate-float-2 { animation: float 8s ease-in-out infinite 2s; }
.animate-float-3 { animation: float 7s ease-in-out infinite 1s; }

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.animate-bounce { animation: bounce 2s infinite; }

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.animate-pulse { animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        /* Count animation */
        @keyframes countUp {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-count {
            animation: countUp 0.8s ease-out forwards;
        }


        /* Smooth transition for project cards */
        .project-card {
            transition: all 0.3s ease, opacity 0.3s ease, transform 0.3s ease;
        }

        .bg-\[\#04b2f7\] {
            background-color: #04b2f7;
        }

        .hover\:bg-\[\#0399d9\]:hover {
            background-color: #0399d9;
        }

        .focus\:ring-\[\#04b2f7\]:focus {
            --tw-ring-color: #04b2f7;
        }

        /* Active filter button style */
        .category-filter.active {
            background-color: #04b2f7 !important;
            color: white !important;
            border-color: #04b2f7 !important;
        }

        /* Button sizing for mobile */
        @media (max-width: 640px) {

            .category-filter,
            .buy-now-btn,
            [class*="px-4"].py-3 {
                padding-left: 1rem;
                padding-right: 1rem;
                padding-top: 0.75rem;
                padding-bottom: 0.75rem;
                font-size: 0.875rem;
            }
        }

        /* For mobile menu */
        .filter-tabs {
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }

        .filter-tabs::-webkit-scrollbar {
            display: none;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize category filter functionality
            initCategoryFilter();

            // Animate counting numbers
            animateCounters();

            // Initialize buy now button functionality
            initBuyNowButtons();
        });

        function initCategoryFilter() {
            const filterButtons = document.querySelectorAll('.category-filter');
            const projectCards = document.querySelectorAll('.project-card');
            const noProjectsMessage = document.getElementById('no-projects-message');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');

                    // Update active state on buttons - Fixed implementation
                    filterButtons.forEach(btn => {
                        btn.classList.remove('active');
                        btn.classList.remove('bg-blue-500', 'text-white', 'border-blue-500');
                        btn.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
                    });

                    // Set active button styles
                    this.classList.add('active', 'bg-blue-500', 'text-white', 'border-blue-500');
                    this.classList.remove('bg-white', 'text-gray-700', 'border-gray-200');

                    // Filter projects
                    let visibleProjects = 0;

                    projectCards.forEach(card => {
                        if (category === 'all' || card.getAttribute('data-category') === category) {
                            card.style.display = 'block';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, 10);
                            visibleProjects++;
                        } else {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(10px)';
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300);
                        }
                    });

                    // Show/hide no projects message
                    if (visibleProjects === 0) {
                        noProjectsMessage.classList.remove('hidden');
                    } else {
                        noProjectsMessage.classList.add('hidden');
                    }
                });
            });
        }


        function resetFilters() {
            const allButton = document.querySelector('.category-filter[data-category="all"]');
            allButton.click();
            document.getElementById('no-projects-message').classList.add('hidden');
        }

        function animateCounters() {
            const counters = document.querySelectorAll('.animate-count');

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 1500; // 1.5 seconds
                const step = target / (duration / 16); // 60fps
                let current = 0;

                const updateCounter = () => {
                    current += step;
                    if (current < target) {
                        counter.textContent = Math.floor(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };

                // Start animation when element is in viewport
                const observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) {
                        updateCounter();
                        observer.unobserve(counter);
                    }
                }, {
                    threshold: 0.5
                });

                observer.observe(counter);
            });
        }

        function initBuyNowButtons() {
        const modal = document.getElementById('paymentModal');
        const paymentForm = document.getElementById('paymentForm');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const paymentFormContainer = document.getElementById('paymentFormContainer');
        const duitkuCheckoutContainer = document.getElementById('duitkuCheckoutContainer');
        const openDuitkuBtn = document.getElementById('openDuitkuBtn');
        let duitkuReference = null;
        let merchantOrderId = null;

        // Fungsi untuk menutup modal
        function closePaymentModal() {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Fungsi untuk menampilkan modal
        function showPaymentModal(id, name, price) {
            document.getElementById('modal_produk_id').value = id;
            document.getElementById('modal_amount').value = price;
            document.getElementById('modal_project_name').textContent = name;
            document.getElementById('modal_project_price').textContent = 'Rp ' + parseInt(price).toLocaleString('id-ID');

            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            paymentFormContainer.classList.remove('hidden');
            duitkuCheckoutContainer.classList.add('hidden');
            paymentForm.reset();
        }

        // Event listener untuk tombol close
        closeModalBtn.addEventListener('click', closePaymentModal);

        // Event listener untuk klik di luar modal
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closePaymentModal();
            }
        });

        // Event listener untuk tombol "Buy Now"
        document.querySelectorAll('.buy-now-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const price = this.getAttribute('data-price');
                showPaymentModal(id, name, price);
            });
        });

        // Handler submit form
        paymentForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitBtn = this.querySelector('[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            try {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Processing...
                `;

                const response = await fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: new FormData(this)
                });

                if (!response.ok) {
                    throw new Error('Server responded with status ' + response.status);
                }

                const data = await response.json();

                if (data.success && data.reference) {
                    duitkuReference = data.reference;
                    merchantOrderId = data.merchant_order_id;
                    paymentFormContainer.classList.add('hidden');
                    duitkuCheckoutContainer.classList.remove('hidden');

                    openDuitkuBtn.onclick = function() {
                        processDuitkuPayment(data.reference, data.merchant_order_id);
                    };
                } else {
                    throw new Error(data.message || 'Payment creation failed');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error: ' + error.message);
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });

        // Fungsi untuk memproses pembayaran Duitku
    // Fungsi untuk memproses pembayaran Duitku
    function processDuitkuPayment(reference, merchantOrderId) {
        if (!window.checkout || !window.checkout.process) {
            alert('Payment gateway not loaded. Please refresh the page.');
            return;
        }

        checkout.process(reference, {
            defaultLanguage: "id",
            currency: "IDR",
            successEvent: function(result) {
                // Redirect ke halaman return dengan merchantOrderId
                window.location.href = `/payment/return?merchantOrderId=${merchantOrderId}`;
            },
            pendingEvent: function(result) {
                // Untuk pembayaran pending (bank transfer dll)
                window.location.href = `/payment/return?merchantOrderId=${merchantOrderId}`;
            },
            errorEvent: function(result) {
                alert('Payment failed: ' + (result.message || 'Please try again'));
                window.location.href = `/payment/return?merchantOrderId=${merchantOrderId}`;
            },
            closeEvent: function(result) {
                // Jika popup ditutup tanpa menyelesaikan pembayaran
                console.log('Payment popup closed', result);
            }
        });
    }

        // Fungsi untuk memeriksa status pembayaran secara berkala
        function checkPaymentStatusPeriodically(merchantOrderId) {
            const interval = setInterval(async () => {
                try {
                    const response = await fetch(`/payment/status/${merchantOrderId}`);
                    const data = await response.json();
                    
                    if (data.paid) {
                        clearInterval(interval);
                        window.location.href = `/payment/return?merchantOrderId=${merchantOrderId}`;
                    } else if (data.status === 'failed') {
                        clearInterval(interval);
                        alert('Payment failed. Please try again.');
                    }
                } catch (error) {
                    console.error('Error checking payment status:', error);
                    clearInterval(interval);
                }
            }, 5000); // Periksa setiap 5 detik
        }
    };

    // Fungsi tampilkan modal error
    function showErrorModal(message) {
        const errorModal = document.getElementById('errorModal');
        errorModal.querySelector('.modal-body').textContent = message;
        new bootstrap.Modal(errorModal).show();
    }

    // Fungsi tampilkan modal success
    function showSuccessModal(message) {
        const successModal = document.getElementById('successModal');
        successModal.querySelector('.modal-body').textContent = message;
        new bootstrap.Modal(successModal).show();
    }

    // Fungsi tampilkan modal info
    function showInfoModal(message) {
        const infoModal = document.getElementById('infoModal');
        infoModal.querySelector('.modal-body').textContent = message;
        new bootstrap.Modal(infoModal).show();
    }

    </script>
@endsection
