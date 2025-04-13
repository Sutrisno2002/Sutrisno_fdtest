@extends('administrator::layouts.master')

@section('title', 'Edit User')

@push('style')
@endpush

@section('content')
    <x-common::utils.breadcrumb title="User">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.user.index') }}" page="User" />
        <x-common::utils.breadcrumb-item page="Edit" />

        @slot('action')
            <button type="button" class="btn bg-secondary text-white rounded-full" onclick="window.history.back()">
                <i class="bx bx-left-arrow-alt text-base me-2"></i> Kembali
            </button>
        @endslot
    </x-common::utils.breadcrumb>

    <livewire:administrator::user.edit :user="$user" />
@endsection

@push('script')
@endpush
