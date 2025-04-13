@extends('administrator::errors.layout')

@push('meta')
    <x-front::meta title="Too Many Requests" description="Too Many Requests" :image="cache('seo_gambar_beranda')" />
@endpush

@section('image')
    <img class="mx-auto w-full max-w-screen-md" src="{{ asset('assets/front/images/vector/9.svg') }}" alt="">
@endsection

@section('error_code', '429 Too Many Requests')
@section('error_message',
    'Permintaan Anda tidak dapat diproses karena terlalu banyak permintaan telah dibuat dalam
    waktu singkat. Mohon coba lagi nanti.')
