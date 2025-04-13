@extends('administrator::errors.layout')

@push('meta')
    <x-front::meta title="Unauthorized" description="Unauthorized" :image="cache('seo_gambar_beranda')" />
@endpush

@section('image')
    <img class="mx-auto w-full max-w-screen-md" src="{{ asset('assets/front/images/vector/3.svg') }}" alt="">
@endsection

@section('error_code', '401 Unauthorized')
@section('error_message',
    'Anda tidak diizinkan untuk mengakses sumber daya ini. Pastikan Anda terotentikasi dan memiliki izin
    yang sesuai.')
