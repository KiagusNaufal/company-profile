@extends('layout.header') <!-- nama file layout Anda -->

@section('title', 'Home Page')
<style type="text/tailwindcss">
    * {
        /* border: 1px solid red; */
    }
</style>
@section('content')
    {{-- Hero Content --}}
    <section class="border-b-[1px] border-gray-200">
        <div class="flex flex-col-reverse lg:flex-row items-center px-4 sm:px-6 lg:px-20 scroll-reveal-hero ">
            <div class="order-1 lg:order-1 w-full lg:w-1/2 space-y-6 py-12 sm:py-16 md:py-20 text-center md:text-left">
                <h1 class="text-4xl lg:text-5xl mx-20 mt-7 mb-7 tracking-wide font-sans">
                    Lebih dari Sekadar Kode, <br>
                    Kami Menciptakan Solusi
                </h1>
                <p class="py-5 px-20 text-xl md:w-[750px] text-gray-600">
                    We’re Heroes to your business forward through ex pert software development, strategic big data
                    analytics,
                    and seamless IT maintenance. Elevate your enterprise with us.
                </p>
                <div class="py-5 px-20 flex gap-4">
                    <a href="#" class="bg-[#04b2f7] text-white px-5 py-3 rounded-lg hover:bg-blue-800 transition">Tell
                        Us Digital Mission</a>
                    <a href="#"
                        class="border border-[#04b2f7] px-5 py-3 rounded-lg hover:bg-[#04b2f7] hover:text-white transition flex items-center">
                        Learn More <span>→</span>
                    </a>
                </div>
            </div>
            {{-- Hero Image --}}
            <div class="order-2 lg:order-2 w-full lg:w-1/2 mb-8 lg:mb-0">
                <img src="{{ asset('image/company.svg') }}" alt="Hero Image" width="512" height="600"
                    class="mx-auto lg:mx-40 w-4/5 sm:w-3/4 md:w-2/3 lg:w-[80%] rounded-lg">
            </div>
        </div>
    </section>

    <!-- Technology Section -->
    <section class="py-4 bg-white">
        <div class="container mx-auto px-4">
            <!-- Heading -->
            <div class="text-center mb-12">
                <p class="text-gray-600">Language that use our solution to enhance their digitalization.</p>
            </div>

            <!-- Marquee Container -->
            <div class="overflow-hidden relative py-16 h-40 border-b-2">
                <!-- Marquee Content -->
                <div class="absolute flex items-center space-x-20 gap-5 animate-marquee whitespace-nowrap">
                    <!-- Programming Language Logos -->
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg"
                        alt="Logo JavaScript" class="h-12 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg"
                        alt="Logo Python" class="h-14 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" alt="Logo Java"
                        class="h-12 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="Logo PHP"
                        class="h-14 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original-wordmark.svg" alt="Logo Go"
                        class="h-12 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/ruby/ruby-original.svg" alt="Logo Ruby"
                        class="h-14 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg"
                        alt="Logo C++" class="h-12 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/csharp/csharp-original.svg" alt="Logo C#"
                        class="h-14 hover:scale-110 transition-transform">

                    <!-- Duplicate for seamless loop -->
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg"
                        alt="Logo JavaScript" class="h-12 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg"
                        alt="Logo Python" class="h-14 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" alt="Logo Java"
                        class="h-12 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="Logo PHP"
                        class="h-14 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original-wordmark.svg" alt="Logo Go"
                        class="h-12 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/ruby/ruby-original.svg" alt="Logo Ruby"
                        class="h-14 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg"
                        alt="Logo C++" class="h-12 hover:scale-110 transition-transform">

                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/csharp/csharp-original.svg" alt="Logo C#"
                        class="h-14 hover:scale-110 transition-transform">
                </div>
            </div>
            <style>
                @keyframes marquee {
                    0% {
                        transform: translateX(0);
                    }

                    100% {
                        transform: translateX(-50%);
                    }
                }

                .animate-marquee {
                    animation: marquee 10s linear infinite;
                }
            </style>
    </section>

    <!-- Services Section -->
    <section class="py-20 ">
        <!-- Header -->
        <div class="max-w-3xl mx-auto grid justify-between text-center mb-16 py-5 scroll-reveal-section">
            <p class="text-lg uppercase text-[#04b2f7] font-semibold">Our Services</p>
            <h2
                class="mt-4 px-8 text-3xl lg:text-4xl tracking-normal md:tracking-wide font-semibold max-w-[800px] text-gray-800">
                We possess techniques that can dismantle them into fragments
            </h2>
        </div>

        <div class="container mx-auto space-y-20 px-10 lg:px-20 scroll-reveal-row">
            <!-- Service Item 1 -->
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="lg:w-1/2">
                    <img src="{{ asset('image/Developer activity-bro (1).svg') }}" alt="Software Development"
                        class="w-full rounded-lg md:h-[460px] ">
                </div>
                <div class="lg:w-1/2 space-y-4 pt-10">
                    <h3 class="text-2xl font-semibold text-gray-800">Software Development</h3>
                    <p class="text-gray-600 sm:text-[28px] lg:text-2xl">
                        In the realm of coding quests, we are your digital heroes. Harness the power of our software
                        development prowess to turn your visions into groundbreaking digital solutions.
                        We don’t just write code; we script success stories.
                    </p>
                    <a href="#" class="inline-flex items-center text-[#04b2f7] hover:underline font-medium text-xl">
                        Learn More <span class="ml-2">→</span>
                    </a>
                </div>
            </div>

            <!-- Service Item 2 (reverse on large screens) -->
            <div class="flex flex-col lg:flex-row-reverse items-center gap-8 scroll-reveal-row">
                <div class="lg:w-1/2">
                    <img src="{{ asset('image/Data extraction-rafiki (1).svg') }}" alt="Data Analytics"
                        class="w-full rounded-lg md:h-[460px]">
                </div>
                <div class="lg:w-1/2 space-y-4">
                    <h3 class="text-2xl font-semibold text-gray-800">Data Analytics</h3>
                    <p class="text-gray-600 sm:text-[28px] lg:text-2xl">
                        Navigate the vast landscapes of data with our heroic analytics. From unraveling insights to
                        conquering data challenges, our expertise ensures your business emerges victorious.
                        We turn data into your most powerful ally.
                    </p>
                    <a href="#" class="inline-flex items-center text-[#04b2f7] hover:underline font-medium text-xl">
                        Learn More <span class="ml-2">→</span>
                    </a>
                </div>
            </div>

            <!-- Service Item 3 -->
            <div class="flex flex-col lg:flex-row items-center gap-8 scroll-reveal-row">
                <div class="lg:w-1/2">
                    <img src="{{ asset('image/Maintenance-bro (1).svg') }}" alt="IT Maintenance"
                        class="w-full rounded-lg md:h-[460px] ">
                </div>
                <div class="lg:w-1/2 sm:w1/2 space-y-4">
                    <h3 class="text-2xl font-semibold text-gray-800">IT Maintenance</h3>
                    <p class="text-gray-600 sm:text-[28px] lg:text-2xl">
                        As guardians of your digital realm, we ensure seamless IT infrastructure. Count on our heroic
                        maintenance to keep your systems resilient, secure, and ever‑ready for the challenges of the digital
                        frontier.
                    </p>
                    <a href="#" class="inline-flex items-center text-[#04b2f7] hover:underline font-medium text-xl">
                        Learn More <span class="ml-2">→</span>
                    </a>
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

    <section class="py-16 bg-blue-50 ">
        <div class="max-w-7xl  mx-auto px-4 relative">
            <!-- Judul -->
            <h2 class="text-sm font-semibold text-[#04b2f7] uppercase mb-2">Selected Works</h2>
            <p class="text-3xl font-bold text-gray-900 mb-6">
                We work and collaborate to create <br>
                digital products for business and user goals.
            </p>

            <!-- Carousel Wrapper -->
            <div id="carousel"
                class="overflow-x-auto snap-x snap-mandatory mt-5 flex space-x-8 md:space-x-[234px] scrollbar-none min-h-[512px] md:h-[640px] scroll-smooth [&::-webkit-scrollbar]:hidden">
                @foreach ($projects as $project)
                    <div class=" flex-none w-full sm:w-80 bg-white  rounded-2xl shadow-lg snap-start">
                        <div class="flex flex-col h-full min-w-[512px] gap-[32px] border rounded-[16px] bg-white overflow-hidden ">
                            <!-- Thumbnail Utama -->
                            <div class="h-48 md:h-[280px] w-full overflow-hidden rounded-t-[16px] border-b-2"
                                style="background-image: url('https://picsum.photos/500/300')">
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <!-- Ikon / Logo Kecil -->
                                <!-- Judul Project -->
                                <h3 class="text-lg font-semibold text-[#192424] mb-2 line-clamp-1"
                                    title="Dana Siap Pakai Badan Nasional Penanggulangan Bencana (DSP BNPB)">
                                    {{ $project['title'] }}
                                </h3>

                                <!-- Deskripsi -->
                                <p class="text-sm text-[#343C3C] mb-6 line-clamp-5 flex-1">
                                    {{ $project['description'] }}
                                </p>

                                <!-- Read More -->
                                <a href="#"
                                    class="inline-flex items-center text-[#008A85] font-medium hover:underline">
                                    <span>Read More</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Prev/Next Buttons -->
                <button id="prevBtn"
                    class="hidden md:block absolute top-1/2 -left-7 md:-left-[280px] translate-y-20 bg-white p-3 rounded-full shadow-lg z-10">&larr;</button>
                <button id="nextBtn"
                    class="hidden md:block absolute top-1/2 right-0 md:-right-10 translate-y-20 bg-[#04b2f7] text-white p-3 rounded-full shadow-lg z-10">&rarr;</button>
            </div>
    </section>

    <section class="py-16 bg-white relative overflow-hidden">
        <!-- Header -->
        <div class="max-w-7xl mx-auto px-4 text-center mb-12">
            <p class="text-[#04b2f7] font-bold text-sm mb-2">WHAT THEY SAY</p>
            <h2 class="text-3xl sm:text-4xl font-semibold text-gray-900">
                Our Partners’ Kind Words
            </h2>
        </div>

            <!-- Carousel Wrapper -->
            <div id="testimonialCarousel" class="relative max-w-4xl mx-auto">
                <!-- Slides Container -->
                <div class="overflow-hidden">
                    <div id="slides" class="flex transition-transform duration-700 ease-out">
                        <!-- Slide 1 -->
                        <div class="flex-none w-full sm:w-3/4 lg:w-1/2 px-4">
                            <div
                                class="bg-white rounded-xl shadow-md border-2 border-transparent hover:border-teal-500 transform hover:scale-105 transition">
                                <div class="p-8 flex flex-col justify-between h-[400px]">
                                    <p class="text-gray-600 mb-6">
                                        “Tim yang kompeten dan profesional. Komunikasi lancar, solusi kreatif, dan hasil
                                        kerja berkualitas membuat saya sangat puas dengan layanan mereka.”
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <img src="/icons/icon-user.svg" alt="Muhammad Ivandry"
                                            class="w-16 h-16 rounded-lg bg-teal-50 p-2" />
                                        <div>
                                            <p class="font-bold text-gray-800">Muhammad Ivandry</p>
                                            <p class="text-sm text-gray-600">Pasker ID | Pranata Komputer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="flex-none w-full sm:w-3/4 lg:w-1/2 px-4">
                            <div
                                class="bg-white rounded-xl shadow-md border-2 border-transparent hover:border-teal-500 transform hover:scale-105 transition">
                                <div class="p-8 flex flex-col justify-between h-[400px]">
                                    <p class="text-gray-600 mb-6">
                                        “Sejauh ini Someah cukup adaptif di saat ada perubahan yang kami minta sehubungan
                                        dengan kondisi terkini. Responsif dalam mengelola isu yang disampaikan.”
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <img src="/icons/icon-user.svg" alt="Nindiastuti"
                                            class="w-16 h-16 rounded-lg bg-teal-50 p-2" />
                                        <div>
                                            <p class="font-bold text-gray-800">Nindiastuti</p>
                                            <p class="text-sm text-gray-600">PT Grafindo Media Pratama | Department Head
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="flex-none w-full sm:w-3/4 lg:w-1/2 px-4">
                            <div
                                class="bg-white rounded-xl shadow-md border-2 border-transparent hover:border-teal-500 transform hover:scale-105 transition">
                                <div class="p-8 flex flex-col justify-between h-[400px]">
                                    <p class="text-gray-600 mb-6">
                                        “Respon admin Someah baik dan dapat memahami permintaan dari Admin BKHM. Memiliki
                                        backup web staging dan pelayanan di luar jam kerja.”
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <img src="/icons/icon-user.svg" alt="Shaka"
                                            class="w-16 h-16 rounded-lg bg-teal-50 p-2" />
                                        <div>
                                            <p class="font-bold text-gray-800">Shaka</p>
                                            <p class="text-sm text-gray-600">Staf Admin IT Darmasiswa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prev/Next Buttons -->
                <button id="prevBtn"
                    class="hidden sm:flex absolute left-2 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100 z-20">
                    &larr;
                </button>
                <button id="nextBtn"
                    class="hidden sm:flex absolute right-2 top-1/2 -translate-y-1/2 bg-[#04b2f7] p-2 rounded-full shadow text-white hover:bg-teal-700 z-20">
                    &rarr;
                </button>

                <!-- Dots -->
                <div class="flex justify-center gap-2 mt-6">
                    <span class="dot w-6 h-1 bg-[#04b2f7] rounded-full cursor-pointer" data-index="0"></span>
                    <span class="dot w-2 h-2 bg-gray-300 rounded-full cursor-pointer" data-index="1"></span>
                    <span class="dot w-2 h-2 bg-gray-300 rounded-full cursor-pointer" data-index="2"></span>
                </div>
            </div>
        </section>

        {{-- <x-coverflow-slider :slides="$slides" /> --}}

        <x-cta-section></x-cta-section>

        <script>
            // Carousel functionality
            const slides = document.getElementById('slides');
            const total = slides.children.length;
            let index = 0;

            function update() {
                slides.style.transform = `translateX(-${index * (100/ total)}%)`;
                document.querySelectorAll('.dot').forEach((dot, i) => {
                    dot.classList.toggle('bg-[#04b2f7]', i === index);
                    dot.classList.toggle('bg-gray-300', i !== index);
                });
            }

            document.getElementById('prevBtn').onclick = () => {
                index = (index - 1 + total) % total;
                update();
            };
            document.getElementById('nextBtn').onclick = () => {
                index = (index + 1) % total;
                update();
            };
            document.querySelectorAll('.dot').forEach(dot =>
                dot.addEventListener('click', () => {
                    index = parseInt(dot.dataset.index);
                    update();
                })
            );

            update();

            document.addEventListener('DOMContentLoaded', () => {
                const carousel = document.getElementById('carousel');
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');

                // Lebar satu card + gap (ubah sesuai gap dan w-80 mu)
                const cardWidth = carousel.querySelector('.flex-none').offsetWidth;
                const gap = parseInt(getComputedStyle(carousel).gap) || 24; // gap-6 = 1.5rem = 24px
                const scrollAmount = cardWidth + gap;

                prevBtn.addEventListener('click', () => {
                    carousel.scrollBy({
                        left: -scrollAmount,
                        behavior: 'smooth'
                    });
                });

                nextBtn.addEventListener('click', () => {
                    carousel.scrollBy({
                        left: scrollAmount,
                        behavior: 'smooth'
                    });
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Basic configuration
                if (document.getElementById('threejs-canvas')) {
                    initThreeJS();
                }

                init3DCard('card-1', 0x04b2f7);
                init3DCard('card-2', 0x6c5ce7);
                init3DCard('card-3', 0x00b894);

            });

            // Staggered animation with shorter delay
            document.addEventListener('DOMContentLoaded', () => {
                const techItems = document.querySelectorAll('.tech-item');
                techItems.forEach((item, index) => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(10px)';

                    setTimeout(() => {
                        item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, 50 * index);
                });
            });

            function init3DCard(containerId, color) {
                const container = document.getElementById(containerId);
                if (!container) return;

                const width = container.clientWidth;
                const height = container.clientHeight;

                // 1. Create Scene
                const scene = new THREE.Scene();

                // 2. Create Camera
                const camera = new THREE.PerspectiveCamera(75, width / height, 0.1, 1000);
                camera.position.z = 5;

                // 3. Create Renderer
                const renderer = new THREE.WebGLRenderer({
                    antialias: true,
                    alpha: true
                });
                renderer.setSize(width, height);
                renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
                container.appendChild(renderer.domElement);

                // 4. Create 3D Object
                const geometry = new THREE.IcosahedronGeometry(1.5, 1);
                const material = new THREE.MeshStandardMaterial({
                    color: color,
                    metalness: 0.7,
                    roughness: 0.4,
                    transparent: true,
                    opacity: 0.9
                });
                const mesh = new THREE.Mesh(geometry, material);
                scene.add(mesh);

                // 5. Add Lighting
                const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
                scene.add(ambientLight);

                const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
                directionalLight.position.set(1, 1, 1);
                scene.add(directionalLight);

                // 6. Handle Mouse Move
                container.addEventListener('mousemove', (e) => {
                    const x = (e.clientX - container.getBoundingClientRect().left) / width;
                    const y = (e.clientY - container.getBoundingClientRect().top) / height;

                    mesh.rotation.y = x * 2;
                    mesh.rotation.x = -y * 2;
                });

                // 7. Animation Loop
                function animate() {
                    requestAnimationFrame(animate);

                    // Gentle rotation when not interacting
                    if (!container.matches(':hover')) {
                        mesh.rotation.x += 0.005;
                        mesh.rotation.y += 0.01;
                    }

                    renderer.render(scene, camera);
                }

                animate();

                // 8. Handle Resize
                window.addEventListener('resize', () => {
                    camera.aspect = container.clientWidth / container.clientHeight;
                    camera.updateProjectionMatrix();
                    renderer.setSize(container.clientWidth, container.clientHeight);
                });
            }
        </script>

        <script src="//unpkg.com/alpinejs" defer></script>
    @endsection
