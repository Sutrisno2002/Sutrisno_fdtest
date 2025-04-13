@extends('front::layouts.master')

@push('meta')
    <x-front::meta :title="cache('seo_judul_faq')" :description="cache('seo_deskripsi_faq')" :image="cache('seo_gambar_faq')" />
@endpush

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="full-width bg-bg-2">
        <div class="text-center px-5 pt-[74px] pb-[90px]">
            <h2 class="font-bold font-chivo text-[28px] leading-[32px] md:text-heading-2 mb-[22px]">
                {{ cache('faq.title') ?? 'Butuh Bantuan? Cek FAQ Kami' }}</h2>
            <p class="text-text text-gray-500 mx-auto md:w-[49ch]">
                {{ cache('faq.description') ??
                    'Temukan jawaban atas pertanyaan umum seputar Gibran Penerus Jokowi (GPJ) dan cara bergabung sebagai relawan. Cek FAQ kami untuk informasi lebih lanjut!' }}
            </p>
        </div>
        <div
            class="bg-gray-100 relative p-[40px] md:pt-[91px] md:pr-[98px] md:pb-[86px] md:pl-[92px] mt-[150px] rounded-[58px]">
            <div class="mx-auto relative max-w-[1320px]">
                <livewire:front::faq.listing />
            </div>
        </div>

    </div>

    @endsection
