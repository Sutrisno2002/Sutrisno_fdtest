@extends('front::layouts.master')

@push('meta')
    <x-front::meta :title="cache('seo_judul_berita')" :description="cache('seo_description_berita')" :image="cache('seo_gambar_berita')" />
@endpush

@push('style')
@endpush

@section('content')
    <livewire:front::post.listing />

@endsection
