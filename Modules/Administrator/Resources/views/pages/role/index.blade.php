@extends('administrator::layouts.master')

@section('title', 'Daftar Role')

@push('style')
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Role">
        <x-common::utils.breadcrumb-item page="Role" />

        @slot('action')
            <a href="{{ route('administrator.role.create') }}" class="btn bg-primary text-white rounded-full">
                <i class="bx bx-plus me-2"></i> Tambah
            </a>
        @endslot
    </x-common::utils.breadcrumb>

    <livewire:administrator::role.table />
@endsection

@push('script')
@endpush
