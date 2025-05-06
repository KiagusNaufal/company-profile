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
                <p class="py-5 px-20 text-xl w-[750px] text-gray-600">
                    We’re Heroes to your business forward through ex pert software development, strategic big data analytics,
                    and seamless IT maintenance. Elevate your enterprise with us.
                </p>
                <div class="py-5 px-20 flex gap-4">
                    <a href="#" class="bg-[#0e60de] text-white px-5 py-3 rounded-lg hover:bg-blue-800 transition">Tell
                        Us Digital Mission</a>
                    <a href="#" class="border border-[#0e60de] px-5 py-3 rounded-lg hover:bg-blue-700 hover:text-white transition flex items-center">
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


    <section class="py-4 bg-white">
        <div class="container mx-auto px-4">
            <!-- Heading -->
            <div class="text-center mb-12">
                <p class="text-gray-600">Language that use our solution to enhance their digitalization.</p>
            </div>

           <!-- Marquee Container -->
<div class="overflow-hidden relative py-5 h-24 bg-gray-100">
    <!-- Marquee Content -->
    <div class="absolute flex items-center space-x-20 gap-5 animate-marquee whitespace-nowrap">
        <!-- Programming Language Logos -->
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg"
             alt="Logo JavaScript" class="h-12 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg"
             alt="Logo Python" class="h-14 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg"
             alt="Logo Java" class="h-12 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg"
             alt="Logo PHP" class="h-14 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original-wordmark.svg"
             alt="Logo Go" class="h-12 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/ruby/ruby-original.svg"
             alt="Logo Ruby" class="h-14 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg"
             alt="Logo C++" class="h-12 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/csharp/csharp-original.svg"
             alt="Logo C#" class="h-14 hover:scale-110 transition-transform">

        <!-- Duplicate for seamless loop -->
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg"
             alt="Logo JavaScript" class="h-12 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg"
             alt="Logo Python" class="h-14 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg"
             alt="Logo Java" class="h-12 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg"
             alt="Logo PHP" class="h-14 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original-wordmark.svg"
             alt="Logo Go" class="h-12 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/ruby/ruby-original.svg"
             alt="Logo Ruby" class="h-14 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg"
             alt="Logo C++" class="h-12 hover:scale-110 transition-transform">

        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/csharp/csharp-original.svg"
             alt="Logo C#" class="h-14 hover:scale-110 transition-transform">
    </div>
</div>

        <style>
            @keyframes marquee {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            .animate-marquee {
                animation: marquee 10s linear infinite;
            }
        </style>
    </section>

    <!-- Services Section -->
    <section class="py-20  bg-sky-50">
        <!-- Header -->
        <div class="max-w-3xl mx-auto grid justify-between text-center mb-16 py-5 scroll-reveal-section">
            <p class="text-lg uppercase text-blue-700 font-semibold">Our Services</p>
            <h2 class="mt-2 px-8 text-3xl lg:text-4xl tracking-normal md:tracking-wide font-[600] max-w-[800px] text-gray-800">
                We possess techniques that can dismantle them into fragments
            </h2>
        </div>

        <div class="container mx-auto space-y-20 px-10 lg:px-20 scroll-reveal-row">
            <!-- Service Item 1 -->
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="lg:w-1/2">
                    <img src="{{ asset('image/Developer activity-bro.svg') }}" alt="Software Development"
                        class="w-full rounded-lg  w-[80%] md:h-[460px] w-[80%]">
                </div>
                <div class="lg:w-1/2 space-y-4">
                    <h3 class="text-2xl font-semibold text-gray-800">Software Development</h3>
                    <p class="text-gray-600 sm:text-[28px] lg:text-2xl">
                        In the realm of coding quests, we are your digital heroes. Harness the power of our software
                        development prowess to turn your visions into groundbreaking digital solutions.
                        We don’t just write code; we script success stories.
                    </p>
                    <a href="#" class="inline-flex items-center text-blue-700 hover:underline font-medium text-xl">
                        Learn More <span class="ml-2">→</span>
                    </a>
                </div>
            </div>

            <!-- Service Item 2 (reverse on large screens) -->
            <div class="flex flex-col lg:flex-row-reverse items-center gap-8">
                <div class="lg:w-1/2">
                    <img src="{{ asset('image/Data extraction-rafiki.svg') }}" alt="Data Analytics"
                        class="w-full rounded-lg  w-[80%] md:h-[460px] w-[80%]">
                </div>
                <div class="lg:w-1/2 space-y-4">
                    <h3 class="text-2xl font-semibold text-gray-800">Data Analytics</h3>
                    <p class="text-gray-600 sm:text-[28px] lg:text-2xl">
                        Navigate the vast landscapes of data with our heroic analytics. From unraveling insights to
                        conquering data challenges, our expertise ensures your business emerges victorious.
                        We turn data into your most powerful ally.
                    </p>
                    <a href="#" class="inline-flex items-center text-blue-700 hover:underline font-medium text-xl">
                        Learn More <span class="ml-2">→</span>
                    </a>
                </div>
            </div>

            <!-- Service Item 3 -->
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="lg:w-1/2">
                    <img src="{{ asset('image/Maintenance-bro.svg') }}" alt="IT Maintenance"
                        class="w-full rounded-lg  w-[80%] md:h-[460px] w-[80%]">
                </div>
                <div class="lg:w-1/2 sm:w1/2 space-y-4">
                    <h3 class="text-2xl font-semibold text-gray-800">IT Maintenance</h3>
                    <p class="text-gray-600 sm:text-[28px] lg:text-2xl">
                        As guardians of your digital realm, we ensure seamless IT infrastructure. Count on our heroic
                        maintenance to keep your systems resilient, secure, and ever‑ready for the challenges of the digital
                        frontier.
                    </p>
                    <a href="#" class="inline-flex items-center text-blue-700 hover:underline font-medium text-xl">
                        Learn More <span class="ml-2">→</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- See All Services Button -->
        <div class="mt-16 text-center">
            <a href="#"
                class="inline-block px-8 py-3 border border-[#0e60de] text-blue-700 rounded-lg hover:bg-[#0e61de] hover:text-white transition">
                See All Service →
            </a>
        </div>
    </section>

    <section class="py-16 bg-gray-50 border-b-[1px] border-gray-200">
        <div class="container mx-auto px-4">
            <!-- Heading Section -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">SELECTED WORKS</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    We work and collaborate to create digital products for business and user goals.
                </p>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Project 1 -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Dana Siap Pakal Badan Nasional...</h3>
                    <p class="text-gray-600 mb-4">
                        DBP is a web-based application system designed to simplify the management of today’s trust in the National Dossier Management Agency. With an intuitive interface and efficient footrest, DBP ensures that fund management is carried out transparently and accurately.
                    </p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                        Read More →
                    </a>
                </div>

                <!-- Project 2 -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">E-Presensi Kemnaker</h3>
                    <p class="text-gray-600 mb-4">
                        E-Presensi is a computer-based application designed to manage and monitor employee attendance at the Ministry of Management or the Republic of Indonesia. This application leverages the latest technology to ensure an efficient, accurate, and integrated attendance process with existing data.
                    </p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                        Read More →
                    </a>
                </div>

                <!-- Project 3 -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">School Collaboration System</h3>
                    <p class="text-gray-600 mb-4">
                        SCS is an innovative web platform that enables collaboratively create and develop latest integration into the Nordiska Curriculum. We are currently working on a dedicated collaboration project to support SCS in linked theater for teachers to shape up.
                    </p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                        Read More →
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <!-- Heading -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">WHAT THEY SAY</h2>
                <p class="text-xl text-gray-600">Our Partners Kind Words</p>
            </div>

            <!-- Testimonials -->
            <div class="space-y-8">
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-lg shadow-md p-8 relative">
                    <div class="absolute top-4 left-4 text-gray-200 text-5xl">“</div>
                    <p class="text-gray-600 mb-6 mt-2 pl-8 italic">
                        "Respon admin Someah Baik dan dapat memahami permintaan dari Admin BKHM. Memiliki backup web staging dan pelayanan diluar jam kerja"
                    </p>
                    <div class="border-t pt-4 pl-8">
                        <h4 class="font-semibold text-gray-800">Shaka</h4>
                        <p class="text-sm text-gray-500">Stat Admin IT Darmasiswa</p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white rounded-lg shadow-md p-8 relative">
                    <div class="absolute top-4 left-4 text-gray-200 text-5xl">“</div>
                    <p class="text-gray-600 mb-6 mt-2 pl-8 italic">
                        "Tim yang kompeten dan profesional. Komunikasi lancar, solusi kreatif, dan hasil kerja berkualitas membuat saya sangat puas dengan layanan mereka."
                    </p>
                    <div class="border-t pt-4 pl-8">
                        <h4 class="font-semibold text-gray-800">Muhammad Ivandry</h4>
                        <p class="text-sm text-gray-500">Pasker ID | Pranata Komputer</p>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white rounded-lg shadow-md p-8 relative">
                    <div class="absolute top-4 left-4 text-gray-200 text-5xl">“</div>
                    <p class="text-gray-600 mb-6 mt-2 pl-8 italic">
                        "Sejauh ini Someah cukup adaptif di saat ada perubahan yang kami minta sehubungan dengan kondisi terkini. Responsif dalam mengelola isue yang disampalkan."
                    </p>
                    <div class="border-t pt-4 pl-8">
                        <h4 class="font-semibold text-gray-800">Nindlastuti</h4>
                        <p class="text-sm text-gray-500">PT Grafindo Media Pratama | Department Head</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-t from-blue-400 to-white py-16 md:py-24">
        <div class="flex flex-col md:flex-row items-center justify-between w-[80%] rounded-3xl
           bg-[#003A38] text-white
           py-8 px-10 md:py-16 md:px-20
           bg-[url('/graphics/vector-contact.svg'),_url('/graphics/vector-contact-2.svg')]
           bg-no-repeat bg-[position:right_top_0rem,_left_12rem_bottom_2rem]
           mx-auto
           ">
            <div class="text-center md:text-left">
                <h2 class="text-2xl md:text-3xl font-bold mb-4">Ready to Transform Your Business?</h2>
                <p class="text-lg opacity-90">Let's Create Something Amazing Together</p>
            </div>

            <button class="mt-6 md:mt-0 bg-white text-[#003A38] px-8 py-3 rounded-full
                        font-semibold hover:bg-opacity-90 transition-all">
                Get Started
            </button>
            </div>
        </div>
    </section>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Basic configuration
            if (document.getElementById('threejs-canvas')) {
                initThreeJS();
            }

            init3DCard('card-1', 0x04b2f7);
        init3DCard('card-2', 0x6c5ce7);
        init3DCard('card-3', 0x00b894);
            ScrollReveal().reveal('.scroll-reveal-item', {
                delay: 200,
                distance: '20px',
                origin: 'bottom',
                duration: 800,
                easing: 'ease-out',
                reset: false // Ubah ini menjadi false
            });

            // Hero section specific
            ScrollReveal().reveal('.scroll-reveal-hero', {
                delay: 300,
                distance: '40px',
                origin: 'bottom',
                duration: 1000,
                easing: 'ease-out',
                reset: false // Ubah ini menjadi false
            });

            // Process tabs
            ScrollReveal().reveal('.scroll-reveal-tab', {
                delay: 200,
                distance: '20px',
                origin: 'bottom',
                duration: 800,
                easing: 'ease-out',
                interval: 100,
                reset: false // Ubah ini menjadi false
            });

            // Service cards
            ScrollReveal().reveal('.scroll-reveal-card', {
                delay: 200,
                distance: '30px',
                origin: 'bottom',
                duration: 800,
                easing: 'ease-out',
                interval: 150,
                reset: false // Ubah ini menjadi false
            });

            // Technology items
            ScrollReveal().reveal('.scroll-reveal-tech', {
                delay: 100,
                distance: '20px',
                origin: 'bottom',
                duration: 600,
                easing: 'ease-out',
                interval: 50,
                reset: false // Ubah ini menjadi false
            });

            // Sections
            ScrollReveal().reveal('.scroll-reveal-section', {
                delay: 200,
                distance: '40px',
                origin: 'bottom',
                duration: 800,
                easing: 'ease-out',
                reset: false // Ubah ini menjadi false
            });

            // Rows in tech section
            ScrollReveal().reveal('.scroll-reveal-row', {
                delay: 200,
                distance: '20px',
                origin: 'bottom',
                duration: 800,
                easing: 'ease-out',
                interval: 100,
                reset: false // Ubah ini menjadi false
            });

            // Content in process tabs
            ScrollReveal().reveal('.scroll-reveal-content', {
                delay: 300,
                distance: '30px',
                origin: 'bottom',
                duration: 800,
                easing: 'ease-out',
                reset: false // Ubah ini menjadi false
            });
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
