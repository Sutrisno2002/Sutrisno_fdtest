@extends('administrator::errors.layout')

@push('meta')
    <x-front::meta title="Server Error" description="Server Error" :image="cache('seo_gambar_beranda')" />
@endpush

@section('image')
    <img class="mx-auto w-full max-w-screen-md" src="{{ asset('assets/front/images/vector/3.svg') }}" alt="">
@endsection

@section('error_code', '500 Server Error')
@section('error_message', 'Terjadi kesalahan pada server saat memproses permintaan Anda. Mohon coba lagi nanti.')
