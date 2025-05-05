@extends('layout.header') <!-- nama file layout Anda -->

@section('title', 'Home Page')

{{-- Hero Content --}}
@section('content')
    <div class="">
        <div class="flex flex-1 items-center px-6 lg:px-20">
            <div class="py-40 px 4 md:w-1/2 md:space-y-4 text-center md:text-left">
            <h1 class="text-4xl lg:text-5xl font-semibold">
                Heroes at Your Service,<br>
                Meeting Your Every Need
            </h1>
            <p class="py-10 text-gray-600">
                We’re Heroes to your business forward through expert software development, strategic big data analytics, and seamless IT maintenance. Elevate your enterprise with us.
            </p>

            <div class="py-10 flex gap-4">
                <a href="#" class="bg-blue-700 text-white px-5 py-3 rounded-lg hover:bg-green-800 transition">Tell Us Digital Mission</a>
                <a href="#" class="border border-green-700 px-5 py-3 rounded-lg hover:bg-green-700 hover:text-white transition flex items-center gap-2">
                Learn More <span>→</span>
                </a>
            </div>

            </div>
            <div class="hidden lg:block lg:w-1/2">
            <img src="{{ asset('images/hero-man.png') }}" alt="Hero Image" class="mx-auto rounded-xl">
            </div>
        </div>
    </div>
@endsection
