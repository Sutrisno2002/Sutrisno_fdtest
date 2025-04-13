@extends('administrator::layouts.master')

@section('title', 'Daftar Pengaturan')

@push('style')
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Pengaturan">
        <x-common::utils.breadcrumb-item page="Pengaturan" />
    </x-common::utils.breadcrumb>

    <livewire:administrator::app-setting.table />
@endsection

@push('script')
@endpush
