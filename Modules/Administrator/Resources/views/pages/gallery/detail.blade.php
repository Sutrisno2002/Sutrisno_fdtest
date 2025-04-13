@extends('administrator::layouts.master')

@section('title', 'Galeri')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-common::utils.breadcrumb title="Galeri">
            <x-common::utils.breadcrumb-item href="{{ route('administrator.gallery.index') }}" page="Galeri" />
            <x-common::utils.breadcrumb-item page="Detail" />

            @slot('action')
            <button type="button" class="btn bg-secondary text-white rounded-full" onclick="window.history.back()">
                <i class="bx bx-left-arrow-alt text-base me-2"></i> Kembali
            </button>
        @endslot
        </x-common::utils.breadcrumb>

        <livewire:administrator::gallery.detail :gallery="$gallery"/>
    </div>
@endsection

@push('script')
@endpush
