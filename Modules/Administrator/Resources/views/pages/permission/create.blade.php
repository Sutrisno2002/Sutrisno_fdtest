@extends('administrator::layouts.master')

@section('title', 'Tambah Permission')

@push('style')
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Permission">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.permission.index') }}" page="Permission" />
        <x-common::utils.breadcrumb-item page="Tambah" />

        @slot('action')
            <button type="button" class="btn bg-secondary text-white rounded-full" onclick="window.history.back()">
                <i class="bx bx-left-arrow-alt text-base me-2"></i> Kembali
            </button>
        @endslot
    </x-common::utils.breadcrumb>

    <livewire:administrator::permission.create />
@endsection

@push('script')
@endpush
