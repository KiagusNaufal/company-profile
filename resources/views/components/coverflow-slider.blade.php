@props(['slides' => []])

<div class="relative w-full py-12">
    <!-- Slider main container -->
    <div class="swiper coverflow-slider">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($slides as $slide)
            <div class="swiper-slide">
                <div class="relative overflow-hidden rounded-2xl shadow-xl transform transition-transform duration-300 hover:scale-105">
                    <img
                        src="{{ $slide['image'] }}"
                        alt="{{ $slide['title'] }}"
                        class="w-full h-96 object-cover">

                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                        <h3 class="text-xl font-bold text-white mb-2">{{ $slide['title'] }}</h3>
                        <p class="text-gray-200 line-clamp-2">{{ $slide['description'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Navigation buttons -->
        <div class="swiper-button-prev after:text-white/80 hover:after:text-white"></div>
        <div class="swiper-button-next after:text-white/80 hover:after:text-white"></div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
<style>
    .coverflow-slider {
        padding: 50px 0;
    }

    .swiper-slide {
        width: 300px;
        transition: all 0.4s ease-in-out;
    }

    .swiper-slide-active {
        transform: scale(1.1);
        z-index: 1;
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.coverflow-slider', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 0,
                stretch: 80,
                depth: 200,
                modifier: 1,
                slideShadows: false
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    coverflowEffect: {
                        stretch: 120,
                        depth: 300
                    }
                },
                1024: {
                    coverflowEffect: {
                        stretch: 160,
                        depth: 400
                    }
                }
            }
        });
    });
</script>
@endpush
