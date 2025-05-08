@props([
    'title' => 'Ready to Transform Your Business?',
    'subtitle' => 'Let\'s Create Something Amazing Together',
    'buttonText' => 'Tell Us',
    'bgImage1' => '/graphics/vector-contact.svg',
    'bgImage2' => '/graphics/vector-contact-2.svg'
])

<section class="py-16 md:py-24">
    <div class="flex flex-col md:flex-row items-center justify-between w-[80%] rounded-3xl
       bg-blue-600 text-white
       py-8 px-10 md:py-16 md:px-20
       bg-[url('{{ $bgImage1 }}'),_url('{{ $bgImage2 }}')]
       bg-no-repeat bg-[position:right_top_0rem,_left_12rem_bottom_2rem]
       mx-auto">

        <div class="text-center md:text-left">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">{{ $title }}</h2>
            <p class="text-lg opacity-90">{{ $subtitle }}</p>
        </div>

        <button class="mt-6 md:mt-0 bg-white text-blue-600 px-8 py-3 rounded-full
                    font-semibold hover:bg-opacity-90 transition-all">
            {{ $buttonText }}
        </button>
    </div>
</section>
