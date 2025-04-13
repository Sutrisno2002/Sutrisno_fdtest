@extends('administrator::layouts.master')

@section('title', 'Edit testimonial')

@push('style')
    {{-- Filepond --}}
    <link href="{{ asset('vendor/filepond/css/filepond.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/filepond/plugins/image-preview/filepond-plugin-image-preview.min.css') }}"
          rel="stylesheet" />
    <link href="{{ asset('vendor/filepond/plugins/file-poster/filepond-plugin-file-poster.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Testimonial">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.testimonial.index') }}" page="Testimonial" />
        <x-common::utils.breadcrumb-item page="Edit" />

        @slot('action')
            <button type="button" class="btn bg-secondary text-white rounded-full" onclick="window.history.back()">
                <i class="bx bx-left-arrow-alt text-base me-2"></i> Kembali
            </button>
        @endslot
    </x-common::utils.breadcrumb>

    <livewire:administrator::testimonial.edit :testimonial="$testimonial" />
@endsection

@push('script')
    {{-- Filepond --}}
    <script src="{{ asset('vendor/filepond/js/filepond.js') }}"></script>
    <script src="{{ asset('vendor/filepond/plugins/image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('vendor/filepond/plugins/file-poster/filepond-plugin-file-poster.min.js') }}"></script>
    <script src="{{ asset('vendor/filepond/plugins/jquery/filepond.jquery.js') }}"></script>
@endpush
