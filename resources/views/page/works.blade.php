@extends('layout.header')


@section('content')
    <!-- Works Hero Section -->
 <section
            class="relative py-32 h-[512px] md:min-h-[712px] bg-gradient-to-r from-blue-50 to-gray-50 overflow-hidden scroll-reveal-section">
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
                    {{ __('works.hero.title1') }} <span class="text-[#04b2f7]">{{ __('works.hero.title2') }}</span>
                </h1>
                <!-- Subtitle -->
                <p class="scroll-reveal-item mt-4 text-xl text-gray-600 max-w-2xl mx-auto">
                    {{ __('works.hero.subtitle') }}
                </p>
                <!-- CTA -->
                <div class="scroll-reveal-item mt-8">
                    <a href="#projects"
                        class="inline-block px-8 py-4 bg-[#04b2f7] text-white font-medium rounded-full shadow-lg hover:bg-[#0399d9] transition">
                        {{ __('works.hero.button') }}
                    </a>
                </div>
            </div>
            <!-- Scrolling indicator -->
            <div class="absolute bottom-8 left-0 right-0 flex justify-center">
                <div class="animate-bounce w-8 h-8 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </div>
            </div>
        </section>

    <!-- Projects Grid -->
<!-- In your projects grid section -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($projects as $project)
    <div class="group overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 scroll-reveal-card">
        <!-- Image Container -->
        <div class="relative h-64 w-full overflow-hidden">
            <img src="{{ secure_asset('storage/' . cetak($project->image)) }}" alt="{{ cetak($project->title) }}"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                loading="lazy"
                onerror="this.src='https://via.placeholder.com/800x600?text=Image+Not+Available'; this.className='w-full h-full object-contain bg-gray-100 p-4'">
        </div>

        <!-- Content Container -->
        <div class="p-6 bg-white">
            <div class="flex items-center justify-between mb-4 gap-2">
                <h3 class="text-xl font-bold text-gray-900 truncate flex-1">{{ cetak($project->name) }}</h3>
                <span class="text-xs {{ cetak($project->badge_color) }} px-2 py-1 rounded-full font-medium whitespace-nowrap">
                    {{ cetak($project->kategori->name) }}
                </span>
            </div>

            <div class="mb-4">
                <span class="text-xl font-bold text-gray-900">Rp {{ number_format(cetak($project->price, 0, ',', '.')) }}</span>
            </div>

            <p class="text-gray-600 mb-6 line-clamp-3 leading-relaxed">
                {{ cetak($project->description) }}
            </p>

            <!-- Button Container -->
            <div class="flex space-x-3">
                <!-- Buy Now Button -->
                <button data-id="{{ cetak($project->id) }}"
                    data-name="{{ cetak($project->name) }}"
                    data-price="{{ cetak($project->price) }}"
                    data-image="{{ cetak($project->image) }}"
                    class="buy-now-btn flex-1 group inline-flex items-center justify-center text-blue-600 hover:text-blue-800 font-medium transition-colors">
                    <span class="mr-2">{{ __('works.card.buy_now') }}</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>

                <!-- View Details Button -->
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

    <!-- Payment Modal -->
    @include('partials.form-pembayaran')
  <!-- Payment Modal -->

    <!-- CTA Section -->
    <x-cta-section></x-cta-section>

    <script>

    </script>
@endsection

