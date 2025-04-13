@extends('administrator::layouts.master')

@section('title', 'Daftar User')

@push('style')
@endpush

@section('content')
    <x-common::utils.breadcrumb title="User">
        <x-common::utils.breadcrumb-item page="User" />

        @slot('action')
            @can('create.user', 'web')
                <a href="{{ route('administrator.user.create') }}" class="btn bg-primary text-white rounded-full">
                    <i class="bx bx-plus me-2"></i> Tambah
                </a>
            @endcan
        @endslot
    </x-common::utils.breadcrumb>

    <livewire:administrator::user.table />
@endsection

@push('script')
@endpush
