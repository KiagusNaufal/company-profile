@extends('layout.header') <!-- nama file layout Anda -->

@section('title', 'Home Page')

@section('content')
    <!-- Hero Section -->
    <section class="bg-white py-24">
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
    </section>

<!-- Projects Grid -->
<section class="container mx-auto px-4 py-12 scroll-reveal-section">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">All Works</h2>
  
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach ($projects as $project)
        <div class="flex flex-col bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 group scroll-reveal-card">

          <div class="h-96 w-full overflow-hidden rounded-t-xl border-2" style="background-image: url('https://source.unsplash.com/400x300')">
            
          </div>

          <div class="p-6 flex-1 flex flex-col">
            <div class="flex items-center justify-between mb-4">
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
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
