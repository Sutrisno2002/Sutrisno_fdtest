@extends('administrator::layouts.master')

@section('title', 'Daftar Testimonial')

@push('style')
    {{--  --}}
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Testimonial">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.testimonial.index') }}" page="Testimonial" />
        <x-common::utils.breadcrumb-item page="Daftar Testimonial" />

        @slot('action')
            <a href="{{ route('administrator.testimonial.create') }}" class="btn bg-primary text-white rounded-full">
                <i class="bx bx-plus me-2"></i> Tambah
            </a>
        @endslot
    </x-common::utils.breadcrumb>
    <livewire:administrator::testimonial.table />
@endsection

@push('script')
    {{--  --}}
@endpush
