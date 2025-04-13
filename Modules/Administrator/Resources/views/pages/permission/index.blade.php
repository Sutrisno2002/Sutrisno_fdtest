@extends('administrator::layouts.master')

@section('title', 'Daftar Permission')

@push('style')
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Permission">
        <x-common::utils.breadcrumb-item page="Permission" />

        @slot('action')
            <a href="{{ route('administrator.permission.create') }}" class="btn bg-primary text-white rounded-full">
                <i class="bx bx-plus me-2"></i> Tambah
            </a>
        @endslot
    </x-common::utils.breadcrumb>

    <livewire:administrator::permission.table />
@endsection

@push('script')
@endpush
