@extends('core::layouts.master')

@section('title', 'Daftar Pengaturan')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-admin.components.breadcrumb page="Pengaturan">
            <li class="breadcrumb-item active" aria-current="page">Daftar Pengaturan</li>

            <x-slot name="button">
                <a href="{{ route('core.app-setting.create') }}" class="btn bg-primary">
                    + Pengaturan </a>
            </x-slot>
        </x-admin.components.breadcrumb>
        <div class="row">
            <div class="col-12">
                <livewire:common::app-setting.table />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
