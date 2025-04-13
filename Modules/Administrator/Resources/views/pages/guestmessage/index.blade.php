@extends('administrator::layouts.master')

@section('title', 'Daftar Pesan Tamu')

@push('style')
    {{--  --}}
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Pesan Tamu">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.guestmessage.index') }}" page="Pesan Tamu" />
        <x-common::utils.breadcrumb-item page="Daftar Pesan Tamu" />

        {{-- @slot('action')
            <a href="{{ route('administrator.testimonial.create') }}" class="btn bg-primary text-white rounded-full">
                <i class="bx bx-plus me-2"></i> Tambah
            </a>
        @endslot --}}
    </x-common::utils.breadcrumb>
    <livewire:administrator::guest-message.table />
@endsection

@push('script')
    {{--  --}}
@endpush
