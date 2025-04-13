@extends('administrator::errors.layout')

@push('meta')
    <x-front::meta title="Forbidden" description="Forbidden" :image="cache('seo_gambar_beranda')" />
@endpush

@section('image')
    <img class="mx-auto w-full max-w-screen-md" src="{{ asset('assets/front/images/vector/3.svg') }}" alt="">
@endsection

@section('error_code', '403 Forbidden')
@section('error_message', 'Akses Ditolak. Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.')
