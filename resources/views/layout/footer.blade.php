    <div class="z-10 py-4 w-full items-center justify-center bg-[#04b2f7]">
        <div class="w-[1440px] max-w-[90%] justify-between items-center m-auto">
            <div class="items-center justify-center">
                <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-3 pt-[64px]">
                    <div class="text-white">
                        <p class="font-[600] mb-3 text-2xl">Aeratek Global Solution</p>
                        <p class="font-normal text-blue-500 max-w-[75%]">{{ __('footer.subtitle') }} <br> </p>
                        <p class="font-normal text-slate-100 mb-6 max-w-[75%]">{{ __('footer.subtitle2') }} </p>
                        <div class="flex gap-2">
                            <a href="https://www.facebook.com">
                                <img src="{{ secure_asset('icons/facebook.svg') }}" alt="fb icon" fetchpriority="high"
                                    width="0" height="0" decoding="async" data-nimg="1"
                                    class="relative mb-4 w-[21px] h-[21px]" style="color:transparent">
                            </a>
                            <a href="https://www.instagram.com">
                                <img src="{{ secure_asset('icons/instagram.svg') }}" alt="fb icon" fetchpriority="high"
                                    width="0" height="0" decoding="async" data-nimg="1"
                                    class="relative mb-4 w-[21px] h-[21px]" style="color:transparent">
                            </a>
                            <a href="https://www.linkedin.com">
                                <img src="{{ secure_asset('icons/linkedin.svg') }}" alt="fb icon" fetchpriority="high"
                                    width="0" height="0" decoding="async" data-nimg="1"
                                    class="relative mb-4 w-[21px] h-[21px]" style="color:transparent">
                            </a>
                        </div>
                    </div>
                    <div class="text-white">
                        <p class="font-[600] text-[#ffffff] text-[20px] mb-6">Company
                        </p>
                        <p class="cursor-pointer font-light mb-4 hover:underline"><a
                                href="{{ url('/about') }}">{{ __('footer.company.about') }}</a></p>
                        <p class="cursor-pointer font-light mb-4 hover:underline"><a
                                href="{{ url('/service') }}">{{ __('footer.company.services') }}</a></p>
                        <p class="cursor-pointer font-light mb-4 hover:underline"><a
                                href="{{ url('/works') }}">{{ __('footer.company.works') }}</a></p>
                        <p class="cursor-pointer font-light mb-4 hover:underline"><a
                                href="{{ url('/') }}">{{ __('footer.company.products') }}</a></p>
                    </div>
                    <div class="text-white">
                        <p class="font-[600] text-slate-100 text-[20px] mb-6">{{ __('footer.contact.contact') }}</p>
                        <p class="font-[600] text-slate-100">{{ __('footer.contact.office') }}</p>
                        <a href="https://maps.app.goo.gl/">
                            <p class="font-light mb-6 hover:underline ">Jl. Arciko Gg Harapan II No 60 Rt 01 Rw 13 Kel
                                Sayang Cianjur, <br> Kota Cianjur, Jawa Barat</p>
                        </a>
                        <p class="font-[600] text-slate-100">Workshop</p>
                        <a href="https://maps.app.goo.gl/">
                            <p class="font-light  mb-6 hover:underline">Jl. Arciko Gg Harapan II No 60 Rt 01 Rw 13 Kel
                                Sayang Cianjur, <br> Kota Cianjur, Jawa Barat</p>
                        </a>
                        <a href="font-light pb-2 cursor-pointer">
                            <p class="mb-1 hover-underline ">aeratekglobalsolution@gmail.com</p>
                        </a>
                        <a href="https://whatsapp.com">
                            <p class="font-light mb-6 hover-underline ">+62 878 8231 8231</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center m-auto bg[#04b2f7]">
                <div class="z-10 w-[1440px] bg-[#04b2f7] flex pt-[24px] justify-center">
                    <div class="w-full justify-center text-center">
                        <hr class="mx-auto">
                        <p class="text-white text-center mt-3">© 2025 PT Aeratek Global Solution. All Rights Reserved.
                        </p>
                        <span class="text-[#04b2f7]">v0.0.0.0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
