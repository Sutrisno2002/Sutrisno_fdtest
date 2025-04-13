@extends('front::layouts.master')

@push('meta')
    <x-front::meta :title="cache('seo_judul_tentang_kami')" :description="cache('seo_description_tentang_kami')" :image="cache('seo_gambar_tentang_kami')" />
@endpush

@push('style')
@endpush

@section('content')
    <div class="full-width banner-hero banner-2">
        <div
            class="px-[12px] md:px-[36px] mt-[70px] xl:px-0 z-10 relative mx-auto mt-0 py-[60px] !mt-0 max-w-[1320px] lg:flex lg:items-center">
            <div class="lg:w-[60%] lg:mr-[150px]">
                <span
                    class="font-chivo inline-block bg-bg-2 text-orange-900 py-[14px] px-[28px] rounded-[50px] text-[14px] leading-[14px] mb-[29px]">Apa
                    yang Kami Lakukan, Apa yang Anda Dapatkan</span>
                <h1
                    class="font-chivo font-bold lg:text-display-3 md:text-[45px] md:leading-[52px] text-[35px] leading-[42px] mb-[20px]">
                    {{ cache('about_us.title') ?? 'Soc Software House' }}</h1>
                <p class="text-quote md:text-lead-lg text-gray-500 pr-[40px] lg:pr-[60px] mb-[44px] md:w-[36ch]">
                    {!! cache('about_us.description') ?:
                        'Alur kerja terintegrasi yang dirancang untuk tim produk. Kami menciptakan pengembangan dan branding kelas dunia' !!}</p>
                <div class="flex items-center justify-start mt-[50px] ">

                    <button type="button" >
                        <a class="flex items-center inline-block z-10 relative transition-all duration-200 group px-[22px] py-[15px] lg:px-[32px] lg:py-[22px] rounded-[50px] bg-gray-900 text-white hover:bg-gray-100 hover:text-gray-900 hover:-translate-y-[2px] text-white bg-black text-heading-6 tracking-wide mr-[22px]"
                            href="{{ route('front.contact') }}">
                            <span
                                class="block text-inherit w-full h-full rounded-[50px] text-lg font-chivo font-semibold">Hubungi Tim Kami</span>
                            <i><img class="ml-[7px] w-[12px] filter-white group-hover:filter-black"
                                    src="{{ asset('assets/front/agon/images/icons/icon-right.svg') }}"
                                    alt="ikon panah kanan"></i>
                        </a>
                    </button>
                    {{-- <a class="text-base flex items-center font-chivo font-bold text-[18px] leading-[18px] gap-[5px]"
                        href="{{ route('front.contact') }}">Hubungi Kami</a>
                    <i><img class="ml-[7px] w-[12px]" src="{{ asset('assets/front/agon/images/icons/icon-right.svg') }}"
                            alt="ikon panah kanan"></i> --}}
                </div>
            </div>
            <div class="hidden relative lg:block">
                {{-- <img class="animate-float absolute rounded-2xl max-w-[240px] max-h-[340px] bottom-[-12%] left-[-50%]"
                    src="{{ cache('homepage.about.image_1') ?? asset('assets/default/images/about/about-1.jpg') }}"
                    alt="Image"> --}}
                <img class="animate-hero-thumb-sm-animation max-w-[360px] max-h-[689px]"
                    src="{{ cache('homepage.about.image_2') ?? asset('assets/default/images/about/about-2.jpg') }}"
                    alt="Image">
            </div>
        </div>
    </div>
    <div class="px-[12px] md:px-[36px] mt-[70px] xl:px-0 lg:mt-[88px]">
        <div
            class="grid grid-cols-2 flex-1 text-center gap-2 gap-y-8 md:grid-cols-2 xl:gap-y-[70px] lg:grid-cols-4 mb-[45px] md:mb-[88px]">
            <div>
                <h1
                    class="font-chivo font-bold lg:text-display-3 md:text-[45px] md:leading-[52px] text-[35px] leading-[42px] mb-1 text-green-900">
                    +12</h1>
                <p class="text-text text-gray-500 mx-auto md:w-[26ch]">tahun dalam bisnis</p>
            </div>
            <div>
                <h1
                    class="font-chivo font-bold lg:text-display-3 md:text-[45px] md:leading-[52px] text-[35px] leading-[42px] mb-1 text-green-900">
                    2K+</h1>
                <p class="text-text text-gray-500 mx-auto md:w-[26ch]">proyek selesai</p>
            </div>
            <div>
                <h1
                    class="font-chivo font-bold lg:text-display-3 md:text-[45px] md:leading-[52px] text-[35px] leading-[42px] mb-1 text-green-900">
                    28+</h1>
                <p class="text-text text-gray-500 mx-auto md:w-[26ch]">negara / kantor</p>
            </div>
            <div>
                <h1
                    class="font-chivo font-bold lg:text-display-3 md:text-[45px] md:leading-[52px] text-[35px] leading-[42px] mb-1 text-green-900">
                    86</h1>
                <p class="text-text text-gray-500 mx-auto md:w-[26ch]">Klien tetap</p>
            </div>
        </div>
        <div class="bg-gray-300 mx-auto w-[90%] h-[1px]"></div>
    </div>

    {{-- <x-front::cta_registration /> --}}
@endsection
