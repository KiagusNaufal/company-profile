@extends('layout.header')

@section('content')
    <!-- Works Hero Section -->
 <section class="relative py-12 md:py-20 lg:py-28 h-auto min-h-[40vh] md:min-h-[80vh] bg-gradient-to-br from-blue-50 to-indigo-50 overflow-hidden scroll-reveal-section">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Floating Circles -->
            <div class="absolute top-16 left-8 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 bg-blue-100 rounded-full opacity-30 animate-float-1"></div>
            <div class="absolute top-1/3 right-8 sm:right-12 md:right-20 w-32 h-32 sm:w-40 sm:h-40 md:w-60 md:h-60 bg-indigo-100 rounded-full opacity-20 animate-float-2"></div>
            <div class="absolute bottom-16 left-1/4 w-20 h-20 sm:w-24 sm:h-24 md:w-32 md:h-32 bg-blue-200 rounded-full opacity-25 animate-float-3"></div>
            
            <!-- Grid Pattern -->
            <div class="absolute inset-0 opacity-5">
                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid-pattern" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#04b2f7" stroke-width="0.5" opacity="0.2"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid-pattern)" />
                </svg>
            </div>
        </div>

        <div class="relative container mx-auto px-4 sm:px-6 h-full flex flex-col justify-center items-center text-center">
            <!-- Animated Title -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4 md:mb-6 animate-fade-in-up">
            {{ __('works.hero.title1') }} 
            <span class="text-transparent bg-clip-text" style="background-image: linear-gradient(to right, #04b2f7, #6366f1);">
                {{ __('works.hero.title2') }}
            </span>
            </h1>
            
            <!-- Subtitle with smooth transition -->
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-600 max-w-2xl mx-auto mb-6 md:mb-10 px-4 animate-fade-in-up delay-100">
            {{ __('works.hero.subtitle') }}
            </p>
            
            <!-- CTA Button with hover effect -->
            <div class="animate-fade-in-up delay-200">
            <a href="#projects" class="relative inline-flex items-center px-5 py-2 sm:px-6 sm:py-3 md:px-8 md:py-4 overflow-hidden font-medium text-white rounded-full group" style="background-image: linear-gradient(to right, #04b2f7, #6366f1);">
                <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
                <span class="relative flex items-center">
                {{ __('works.hero.button') }}
                <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
                </span>
            </a>
            </div>
            
            <!-- Scrolling indicator with pulse animation - Adjusted position -->
            <div class="absolute bottom-4 sm:bottom-6 md:bottom-8 left-0 right-0 flex justify-center animate-bounce">
                <div class="w-6 h-10 sm:w-8 sm:h-12 md:w-10 md:h-16 flex justify-center">
                    <div class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-blue-500 animate-pulse"></div>
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
            <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-6 sm:mb-8 md:mb-12 px-2 overflow-x-auto pb-2 filter-tabs">
                <button data-category="all" class="category-filter px-3 py-1 sm:px-4 sm:py-2 rounded-full font-medium text-xs sm:text-sm bg-blue-500 text-white shadow-md transition-colors active">
                    All Projects
                </button>
                @foreach ($categories as $category)
                <button data-category="{{ $category->id }}" class="category-filter px-3 py-1 sm:px-4 sm:py-2 rounded-full font-medium text-xs sm:text-sm bg-white text-gray-700 border border-gray-200 hover:bg-gray-50 transition-colors">
                    {{ $category->name }}
                </button>
                @endforeach
            </div>
            
            <!-- Projects Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8 scroll-reveal-card">
                @foreach ($projects as $project)
                <div class="project-card group overflow-hidden rounded-lg sm:rounded-xl md:rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 md:hover:-translate-y-2 scroll-reveal-item" data-category="{{ $project->kategori->id }}">
                   <!-- Image Container with Ribbon -->
                    <div class="relative h-48 sm:h-56 md:h-64 lg:h-72 w-full overflow-hidden">
                        <!-- Ribbon for Featured Projects -->
                        @if($project->is_featured)
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 md:top-4 md:right-4 z-10 bg-yellow-400 text-xs font-bold px-2 py-1 sm:px-3 sm:py-1 rounded-full shadow-md">
                            Featured
                        </div>
                        @endif
                                                <img src="{{ secure_asset('storage/' . cetak($project->image)) }}" alt="{{ cetak($project->title) }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            loading="lazy"
                            onerror="this.src='https://via.placeholder.com/800x600?text=Image+Not+Available'; this.className='w-full h-full object-contain bg-gray-100 p-4'">
                            
                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-3 sm:p-4 md:p-6">
                            <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                <h3 class="text-base sm:text-lg md:text-xl font-bold text-white">{{ cetak($project->name) }}</h3>
                                <p class="text-blue-200 mt-1 text-xs sm:text-sm md:text-base line-clamp-2">{{ cetak($project->short_description) }}</p>
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

                        <div class="mb-3 sm:mb-4">
                            <span class="text-base sm:text-lg md:text-xl font-bold text-gray-900">Rp {{ number_format(cetak($project->price)), 0, ',', '.' }}</span>
                            @if($project->original_price)
                            <span class="text-xs sm:text-sm text-gray-500 line-through ml-2">Rp {{ number_format(cetak($project->original_price)), 0, ',', '.' }}</span>
                            @endif
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
                            <!-- Buy Now Button -->
                            <button data-id="{{ cetak($project->id) }}"
                                data-name="{{ cetak($project->name) }}"
                                data-price="{{ cetak($project->price) }}"
                                data-image="{{ cetak($project->image) }}"
                                class="buy-now-btn flex-1 group inline-flex items-center justify-center px-4 py-3 bg-[#04b2f7] text-white font-medium rounded-lg hover:bg-[#0399d9] transition-all shadow-md hover:shadow-lg text-sm">
                                <span class="mr-2">{{ __('works.card.buy_now') }}</span>
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </button>

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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-medium text-gray-900 mb-2">No projects found</h3>
                <p class="text-gray-500 max-w-md mx-auto text-sm sm:text-base">We couldn't find any projects matching your selected category. Please try another category.</p>
                <button class="mt-4 sm:mt-6 px-5 py-2 sm:px-6 sm:py-3 border border-blue-500 text-blue-500 rounded-lg font-medium hover:bg-blue-50 transition-colors text-sm sm:text-base" onclick="resetFilters()">
                    Reset Filters
                </button>
            </div>
            
            <!-- Pagination or Load More -->
            <div class="mt-10 sm:mt-12 md:mt-16 text-center">
                <button class="px-4 py-2 sm:px-5 sm:py-2 md:px-6 md:py-3 border border-blue-500 text-blue-500 rounded-lg font-medium hover:bg-blue-50 transition-colors text-sm sm:text-base">
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
                <div class="bg-white p-5 sm:p-6 md:p-8 rounded-lg sm:rounded-xl shadow-md hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full overflow-hidden mr-3 sm:mr-4">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Client" class="w-full h-full object-cover" loading="lazy">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm sm:text-base">Sarah Johnson</h4>
                            <p class="text-xs sm:text-sm text-gray-500">CEO, TechSolutions</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-3 sm:mb-4 text-sm sm:text-base">
                        "The platform exceeded our expectations. The quality of work and attention to detail was exceptional."
                    </p>
                    <div class="flex text-yellow-400">
                        <!-- 5 stars -->
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white p-5 sm:p-6 md:p-8 rounded-lg sm:rounded-xl shadow-md hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full overflow-hidden mr-3 sm:mr-4">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Client" class="w-full h-full object-cover" loading="lazy">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm sm:text-base">Michael Chen</h4>
                            <p class="text-xs sm:text-sm text-gray-500">Marketing Director</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-3 sm:mb-4 text-sm sm:text-base">
                        "Incredibly responsive team that delivered exactly what we needed ahead of schedule. Will definitely work with them again."
                    </p>
                    <div class="flex text-yellow-400">
                        <!-- 5 stars -->
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white p-5 sm:p-6 md:p-8 rounded-lg sm:rounded-xl shadow-md hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full overflow-hidden mr-3 sm:mr-4">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Client" class="w-full h-full object-cover" loading="lazy">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm sm:text-base">Emma Rodriguez</h4>
                            <p class="text-xs sm:text-sm text-gray-500">Founder, StartupX</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-3 sm:mb-4 text-sm sm:text-base">
                        "As a startup, we needed cost-effective solutions without compromising quality. They delivered perfectly."
                    </p>
                    <div class="flex text-yellow-400">
                        <!-- 5 stars -->
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
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
                    <div class="text-2xl sm:text-3xl md:text-4xl font-bold mb-1 sm:mb-2 animate-count" data-target="150">0</div>
                    <div class="text-xs sm:text-sm uppercase tracking-wider">Projects Completed</div>
                </div>
                <div class="p-4 sm:p-5 md:p-6">
                    <div class="text-2xl sm:text-3xl md:text-4xl font-bold mb-1 sm:mb-2 animate-count" data-target="98">0</div>
                    <div class="text-xs sm:text-sm uppercase tracking-wider">Happy Clients</div>
                </div>
                <div class="p-4 sm:p-5 md:p-6">
                    <div class="text-2xl sm:text-3xl md:text-4xl font-bold mb-1 sm:mb-2 animate-count" data-target="12">0</div>
                    <div class="text-xs sm:text-sm uppercase tracking-wider">Awards Won</div>
                </div>
                <div class="p-4 sm:p-5 md:p-6">
                    <div class="text-2xl sm:text-3xl md:text-4xl font-bold mb-1 sm:mb-2 animate-count" data-target="24">0</div>
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
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-float-1 {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-float-2 {
            animation: float 8s ease-in-out infinite 2s;
        }
        
        .animate-float-3 {
            animation: float 7s ease-in-out infinite 1s;
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
            from { opacity: 0; }
            to { opacity: 1; }
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
                }, { threshold: 0.5 });
                
                observer.observe(counter);
            });
        }
        
        function initBuyNowButtons() {
            document.querySelectorAll('.buy-now-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const projectId = this.getAttribute('data-id');
                    const projectName = this.getAttribute('data-name');
                    const projectPrice = this.getAttribute('data-price');
                    const projectImage = this.getAttribute('data-image');
                    
                    // Set values in payment modal
                    document.getElementById('project-id').value = projectId;
                    document.getElementById('project-name-display').textContent = projectName;
                    document.getElementById('project-price-display').textContent = 'Rp ' + parseInt(projectPrice).toLocaleString();
                    document.getElementById('project-image-display').src = 'storage/' + projectImage;
                    
                    // Show modal
                    document.getElementById('payment-modal').classList.remove('hidden');
                    document.body.classList.add('overflow-hidden');
                });
            });
        }
    </script>
@endsection