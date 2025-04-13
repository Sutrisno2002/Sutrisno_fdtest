@extends('core::layouts.master')

@section('title', 'Tambah Role')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-admin.components.breadcrumb page="Role">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('core.role.index') }}">Role</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>

            <x-slot name="button">
                <a href="{{ route('core.role.index') }}" class="btn bg-primary">
                    <i class="bx bx-left-arrow-alt mt-1 mr-1"></i> Kembali
                </a>
            </x-slot>
        </x-admin.components.breadcrumb>
        <livewire:common::role.create />
    </div>
@endsection

@push('script')
@endpush
