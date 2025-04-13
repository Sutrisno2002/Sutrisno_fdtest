@extends('front::layouts.master')

@push('meta')
    <x-front::meta :title="cache('seo_judul_beranda')" :description="cache('seo_description_beranda')" :image="cache('seo_gambar_beranda')" :keywords="cache('seo_keyword_beranda')" :url="request()->fullUrl()" />
@endpush

@push('style')
    <style>
        .uaa {
            width: 400px;
            position: absolute;
            right: 160px;
            top: 130px;
        }
    </style>
@endpush

@section('content')
    <livewire:front::post.listing />

    <!-- ===== Media End ===== -->
@endsection
