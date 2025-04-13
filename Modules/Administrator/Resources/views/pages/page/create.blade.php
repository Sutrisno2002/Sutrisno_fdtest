@extends('administrator::layouts.master')

@section('title', 'Halaman Web')

@push('style')
    {{-- Summernote --}}
    <link href="{{ asset('vendor/summernote/css/summernote-lite.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div id="main-wrapper">
        <x-common::utils.breadcrumb title="Halaman Web">
            <x-common::utils.breadcrumb-item href="{{ route('administrator.page.index') }}" page="Halaman Web" />
            <x-common::utils.breadcrumb-item page="Tambah" />
        
            @slot('action')
            <button type="button" class="btn bg-secondary text-white rounded-full" onclick="window.history.back()">
                <i class="bx bx-left-arrow-alt text-base me-2"></i> Kembali
            </button>
        @endslot
        </x-common::utils.breadcrumb>
        <div class="row">
            <div class="col-md-8">
                <livewire:administrator::page.create />
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- Summernote --}}
    <script src="{{ asset('vendor/summernote/js/summernote-lite.min.js') }}"></script>
@endpush
