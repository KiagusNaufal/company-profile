@extends('layout.header') <!-- nama file layout Anda -->

@section('title', 'Footer Page')

@section('footer')
    <div class="z-10 py-4 w-full items-center justify-center bg-[#003366]">
        <div class="w-[1440px] max-w-[90%] justify-between items-center m-auto">
            <div class="items-center justify-center">
                <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-3 pt-[64px]">
                    <div class="text-white">
                        <img src="{{ asset('image/company.svg') }}" alt="Logo" fetchpriority="high" width="0" height="0"
                        class="relative mb-4 w-[158px] h-[441px]" style="color:transparent" data-nimg="1" decoding="async"/>
                        <p class="font-[600] mb-3">Lorem Ipsum</p>
                        <p class="font[400] mb-6 max-w-[75%]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus pariatur alias placeat molestias</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection