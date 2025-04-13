@extends('administrator::errors.layout')

@push('meta')
    <x-front::meta title="Page Expired" description="Page Expired" :image="cache('seo_gambar_beranda')" />
@endpush

@section('image')
    <img class="mx-auto w-full max-w-screen-md" src="{{ asset('assets/front/images/vector/3.svg') }}" alt="">
@endsection

@section('error_code', '419 Page Expired')
@section('error_message', 'Sesi Anda telah habis. Mohon lakukan login kembali untuk melanjutkan akses.')
