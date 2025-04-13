@extends('administrator::errors.layout')

@push('meta')
    <x-front::meta title="Not Found" description="Not Found" :image="cache('seo_gambar_beranda')" />
@endpush

@section('image')
    <img class="mx-auto w-full max-w-screen-md" src="{{ asset('assets/front/images/vector/7.svg') }}" alt="">
@endsection

@section('error_code', '404 Not Found')
@section('error_message', 'Halaman yang Anda cari tidak dapat ditemukan. Pastikan URL yang diminta benar.')
