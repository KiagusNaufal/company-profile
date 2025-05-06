@extends('layout.header') <!-- nama file layout Anda -->

@section('title', 'Home Page')

@section('content')
    <!-- Hero Section -->
<section class="bg-white py-16">
    <div class="container mx-auto px-4 max-w-4xl text-center">
        <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-600 to-green-500 bg-clip-text text-transparent mb-6">
            Digital Transformation, Ready to Meet Your Every Need
        </h1>
        <p class="text-gray-600 text-lg mb-8">
            Our company provides various types of services to support the convenience of your business and activities in the digital world.
        </p>
        <div class="border-b-2 border-gray-200 w-24 mx-auto"></div>
    </div>
</section>

<!-- Projects Grid -->
<section class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">All Works</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Project Item -->
        {{-- @foreach($projects as $project) --}}
        <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">project</h3>
                    <span class="text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded-full">project</span>
                </div>
                <p class="text-gray-600 mb-4 line-clamp-3">
                    {{-- {{ $project['description'] }} --}}
                </p>
                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                    Read More
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center space-x-4">
        <a href="#" class="px-4 py-2 text-gray-600 hover:text-blue-600">&laquo; Previous</a>
        <a href="#" class="px-4 py-2 text-blue-600 font-medium">Next &raquo;</a>
    </div>
</section>
@endsection
