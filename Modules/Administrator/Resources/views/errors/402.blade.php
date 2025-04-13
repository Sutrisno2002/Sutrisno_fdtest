@extends('administrator::errors.layout')

@push('meta')
    <x-front::meta title="Payment Required" description="Payment Required" :image="cache('seo_gambar_beranda')" />
@endpush

@section('image')
    <img class="mx-auto w-full max-w-screen-md" src="{{ asset('assets/front/images/vector/7.svg') }}" alt="">
@endsection

@section('error_code', '402 Payment Required')
@section('error_message',
    'Untuk mengakses halaman ini, pembayaran diperlukan. Silakan lakukan pembayaran yang
    sesuai untuk melanjutkan.')
