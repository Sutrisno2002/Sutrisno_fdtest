@extends('administrator::layouts.master')

@section('title', 'Daftar Konten')

@push('style')
    {{--  --}}
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Konten">
        <x-common::utils.breadcrumb-item page="Konten" />
    </x-common::utils.breadcrumb>

    <livewire:administrator::content.table />
@endsection

@push('script')
    {{--  --}}
@endpush
