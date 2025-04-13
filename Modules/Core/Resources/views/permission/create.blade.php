@extends('core::layouts.master')

@section('title', 'Tambah Permission')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-admin.components.breadcrumb page="Permission">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('core.permission.index') }}">Permission</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>

            <x-slot name="button">
                <a href="{{ route('core.permission.index') }}" class="btn bg-primary">
                    <i class="bx bx-left-arrow-alt mt-1 mr-1"></i> Kembali
                </a>
            </x-slot>
        </x-admin.components.breadcrumb>
        <div class="row">
            <div class="col-md-6">
                <livewire:common::permission.create />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
