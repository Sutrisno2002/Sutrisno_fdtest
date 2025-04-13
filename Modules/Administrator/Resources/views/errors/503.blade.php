@extends('administrator::errors.layout')

@push('meta')
    <x-front::meta title="Service Unavailable" description="Service Unavailable" :image="cache('seo_gambar_beranda')" />
@endpush

@section('image')
    <img class="mx-auto w-full max-w-screen-md" src="{{ asset('assets/front/images/vector/3.svg') }}" alt="">
@endsection

@section('error_code', '503 Service Unavailable')
@section('error_message',
    'Mohon maaf, layanan saat ini tidak tersedia. Kami sedang melakukan pemeliharaan atau
    peningkatan. Mohon coba lagi nanti.')
