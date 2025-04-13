@extends('administrator::layouts.master')

@section('title', 'Daftar Kategori FAQ')

@push('style')
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Kategori FAQ">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.faq.main.index') }}" page="FAQ" />
        <x-common::utils.breadcrumb-item page="Daftar Kategori FAQ" />
    </x-common::utils.breadcrumb>
    <livewire:administrator::faq-category.table />
@endsection

@push('script')
@endpush
