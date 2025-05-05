@extends('layout.header') <!-- nama file layout Anda -->

@section('title', 'Home Page')
<style type="text/tailwindcss">
    * {
        border: 1px solid red;
    }
</style>
{{-- Hero Content --}}
@section('content')
    <div class="">
        <div class="flex flex-1 items-center px-6 lg:px-20 border-b-[1px] border-gray-200">
            <div class="py-40 px 4 md:w-1/2 md:space-y-4 text-center md:text-left">
            <h1 class="text-4xl lg:text-5xl font-semibold">
                Heroes at Your Service,<br>
                Meeting Your Every Need
            </h1>
            <p class="py-10 text-gray-600">
                We’re Heroes to your business forward through expert software development, strategic big data analytics, and seamless IT maintenance. Elevate your enterprise with us.
            </p>

            <div class="py-10 flex gap-4">
                <a href="#" class="bg-[#0e60de] text-white px-5 py-3 rounded-lg hover:bg-blue-800 transition">Tell Us Digital Mission</a>
                <a href="#" class="border border-[#0e60de] px-5 py-3 rounded-lg hover:bg-blue-700 hover:text-white transition flex items-center gap-2">
                Learn More <span>→</span>
                </a>
            </div>

            </div>
            <div class="hidden lg:block lg:w-1/2 pl-40">
            <img src="{{ asset('image/company.svg') }}" alt="Hero Image" class="mx-auto rounded-xl ">
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <section class="py-20 bg-sky-50">
        <!-- Header -->
        <div class="max-w-3xl mx-auto text-center mb-16 py-5">
          <p class="text-sm uppercase text-blue-700 font-semibold">Our Services</p>
          <h2 class="mt-2 text-3xl lg:text-4xl font-semibold text-gray-800">
            We possess techniques that can dismantle them into fragments
          </h2>
        </div>

        <div class="container mx-auto space-y-20">
          <!-- Service Item 1 -->
          <div class="flex flex-col lg:flex-row items-center gap-8">
            <div class="lg:w-1/2">
              <img src="{{ asset('image/Developer activity-bro.svg') }}" alt="Software Development" class="w-full rounded-lg shadow-lg w-[80%] md:h-[460px] w-[80%]">
            </div>
            <div class="lg:w-1/2 space-y-4">
              <h3 class="text-2xl font-semibold text-gray-800">Software Development</h3>
              <p class="text-gray-600">
                In the realm of coding quests, we are your digital heroes. Harness the power of our software development prowess to turn your visions into groundbreaking digital solutions.
                We don’t just write code; we script success stories.
              </p>
              <a href="#" class="inline-flex items-center text-blue-700 hover:underline font-medium">
                Learn More <span class="ml-2">→</span>
              </a>
            </div>
          </div>

          <!-- Service Item 2 (reverse on large screens) -->
          <div class="flex flex-col lg:flex-row-reverse items-center gap-8">
            <div class="lg:w-1/2">
              <img src="{{ asset('image/Data extraction-rafiki.svg') }}" alt="Data Analytics" class="w-50 rounded-lg shadow-lg w-[80%] md:h-[460px] w-[80%]">
            </div>
            <div class="lg:w-1/2 space-y-4">
              <h3 class="text-2xl font-semibold text-gray-800">Data Analytics</h3>
              <p class="text-gray-600">
                Navigate the vast landscapes of data with our heroic analytics. From unraveling insights to conquering data challenges, our expertise ensures your business emerges victorious.
                We turn data into your most powerful ally.
              </p>
              <a href="#" class="inline-flex items-center text-blue-700 hover:underline font-medium">
                Learn More <span class="ml-2">→</span>
              </a>
            </div>
          </div>

          <!-- Service Item 3 -->
          <div class="flex flex-col lg:flex-row items-center gap-8">
            <div class="lg:w-1/2">
              <img src="{{ asset('image/Maintenance-bro.svg') }}" alt="IT Maintenance" class="w-full rounded-lg shadow-lg w-[80%] md:h-[460px] w-[80%]">
            </div>
            <div class="lg:w-1/2 space-y-4">
              <h3 class="text-2xl font-semibold text-gray-800">IT Maintenance</h3>
              <p class="text-gray-600">
                As guardians of your digital realm, we ensure seamless IT infrastructure. Count on our heroic maintenance to keep your systems resilient, secure, and ever‑ready for the challenges of the digital frontier.
              </p>
              <a href="#" class="inline-flex items-center text-blue-700 hover:underline font-medium">
                Learn More <span class="ml-2">→</span>
              </a>
            </div>
          </div>
        </div>

        <!-- See All Services Button -->
        <div class="mt-16 text-center">
          <a href="#"
             class="inline-block px-8 py-3 border border-green-700 text-blue-700 rounded-lg hover:bg-green-700 hover:text-white transition">
            See All Service →
          </a>
        </div>
      </section>

@endsection
