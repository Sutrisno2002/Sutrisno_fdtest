@extends('administrator::layouts.master')

@section('title', 'Notifikasi')

@push('style')
    {{--  --}}
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Notifikasi">
        <x-common::utils.breadcrumb-item page="Notifikasi" />

        @slot('action')
        @endslot
    </x-common::utils.breadcrumb>

    <livewire:administrator::notification.table />
@endsection

@push('script')
    {{--  --}}
@endpush
