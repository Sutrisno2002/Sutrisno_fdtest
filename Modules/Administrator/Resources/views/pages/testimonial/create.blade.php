@extends('administrator::layouts.master')

@section('title', 'Tambah Testimonial')

@push('style')
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Testimonial">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.testimonial.index') }}" page="Testimonial" />
        <x-common::utils.breadcrumb-item page="Tambah" />

        @slot('action')
            <button type="button" class="btn bg-secondary text-white rounded-full" onclick="window.history.back()">
                <i class="bx bx-left-arrow-alt text-base me-2"></i> Kembali
            </button>
        @endslot
    </x-common::utils.breadcrumb>

    <livewire:administrator::testimonial.create />
@endsection

@push('script')
@endpush
