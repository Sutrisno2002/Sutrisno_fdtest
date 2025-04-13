@extends('administrator::layouts.master')

@section('title', 'Daftar Slider')

@push('style')
    {{--  --}}
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Slider">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.slider.index') }}" page="Slider" />
        <x-common::utils.breadcrumb-item page="Daftar Slider" />

        @slot('action')
            @can('create.slider', 'web')
                <a href="{{ route('administrator.slider.create') }}" class="btn bg-primary text-white rounded-full">
                    <i class="bx bx-plus me-2"></i> Tambah
                </a>
            @endcan
        @endslot
    </x-common::utils.breadcrumb>
    <livewire:administrator::slider.table />
@endsection

@push('script')
    {{--  --}}
@endpush
