@extends('layout.header') <!-- nama file layout Anda -->

@section('title', 'Home Page')
<style type="text/tailwindcss">
    * {
        /* border: 1px solid red; */
    }
</style>
@section('content')
    {{-- Hero Content --}}
    <section class="border-b border-gray-200 bg-gradient-to-r from-blue-50 to-white">
        <div
            class="container mx-auto flex flex-col-reverse lg:flex-row items-center px-4 sm:px-6 lg:px-8 xl:px-12 scroll-reveal-hero">
            <!-- Text Content -->
            <div class="w-full lg:w-1/2 py-8 sm:py-12 lg:py-16 xl:py-20 px-4 sm:px-6 lg:px-8 xl:px-12">
                <div class="max-w-2xl mx-auto lg:mx-0 space-y-6">
                    <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] font-bold leading-tight tracking-tight text-gray-900">
                        Lebih dari Sekadar Kode,<br>
                        <span class="text-[#04b2f7]">Kami Menciptakan Solusi</span>
                    </h1>

                    <p class="text-lg sm:text-xl text-gray-600 leading-relaxed">
                        We're Heroes to your business forward through expert software development, strategic big data
                        analytics, and seamless IT maintenance. Elevate your enterprise with us.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 pt-2">
                        <button type="button" id="tellUsButton" data-toggle="contact-modal"
                            class="bg-[#04b2f7] hover:bg-[#0388c4] text-white font-medium px-6 py-3.5 rounded-lg transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                            Tell Us Your Digital Mission
                        </button>
                        <button type="button" id="tellUsButton" data-toggle="contact-modal"
                            class="border-2 border-[#04b2f7] text-[#04b2f7] hover:bg-[#04b2f7] hover:text-white font-medium px-6 py-3.5 rounded-lg transition-all duration-300 flex items-center justify-center gap-2">
                            Learn More <span class="transition-transform duration-300 group-hover:translate-x-1">→</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end p-4 sm:p-6 lg:p-8">
                <div class="relative w-full max-w-xl">
                    <img src="{{ asset('image/company.svg') }}" alt="Hero Image"
                        class="w-full h-auto rounded-xl object-contain drop-shadow-xl" loading="eager" width="600"
                        height="600">
                </div>
            </div>
        </div>
    </section>

    <x-marquee></x-marquee>

    <x-services></x-services>
    
    <!-- Projects Section -->
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
                class="overflow-x-auto snap-x snap-mandatory mt-5 flex space-x-1 md:space-x-56 scrollbar-none min-h-[512px] md:h-[640px] scroll-smooth [&::-webkit-scrollbar]:hidden">
                @foreach ($products as $project)
                    <div class=" flex-none w-full sm:w-80 bg-white  rounded-2xl shadow-lg snap-start">
                        <div
                            class="flex flex-col h-full min-w-[400px] md:min-w-[512px] gap-[32px] border rounded-[16px] bg-white overflow-hidden ">
                            <!-- Thumbnail Utama -->
                            <div
                                class="relative h-48 md:h-[280px] w-full overflow-hidden rounded-t-[16px] border-b-2 border-gray-200">
                                <!-- Image with proper sizing and positioning -->
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }} Thumbnail"
                                    class="w-full h-full object-cover object-center transition-transform duration-500 hover:scale-105"
                                    loading="lazy"
                                    onerror="this.style.display='none'; this.parentElement.classList.add('bg-gray-100')">

                                <!-- Fallback background if image fails to load -->
                                <div class="absolute inset-0 bg-gray-100 flex items-center justify-center"
                                    style="display: none;">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <!-- Ikon / Logo Kecil -->
                                <!-- Judul Project -->
                                <h3 class="text-lg font-semibold text-[#192424] mb-2 line-clamp-1"
                                    title="Dana Siap Pakai Badan Nasional Penanggulangan Bencana (DSP BNPB)">
                                    {{ $project->name }}
                                </h3>

                                <!-- Deskripsi -->
                                <p class="text-sm text-[#343C3C] mb-6 line-clamp-5 flex-1">
                                    {{ $project->description }}
                                </p>

                                <!-- Read More -->
                                <a href="#"
                                    class="inline-flex items-center text-[#04b2f7] font-medium hover:underline">
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

    <!-- Testimonial Section -->
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
            <button id="prevBtn_testimonial"
                class="hidden sm:flex absolute left-2 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100 z-20">
                &larr;
            </button>
            <button id="nextBtn_testimonial"
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

        document.getElementById('prevBtn_testimonial').onclick = () => {
            index = (index - 1 + total) % total;
            update();
        };
        document.getElementById('nextBtn_testimonial').onclick = () => {
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
