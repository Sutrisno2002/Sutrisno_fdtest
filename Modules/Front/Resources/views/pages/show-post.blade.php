@extends('front::layouts.master')

@push('meta')
    <x-front::meta :title="$post->title" :description="$post->subject" :image="$post->getThumbnail()" :keyword="$post->tags" />
@endpush

@push('style')
@endpush

@section('content')
    <livewire:front::post.show :post="$post" />
@endsection

@push('script')
    <script src="{{ asset('assets/front/js/vendor/shareon.js') }}"></script>
@endpush
