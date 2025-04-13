@extends('administrator::layouts.master')

@section('title', 'Edit Permission')

@push('style')
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Permission">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.permission.index') }}" page="Permission" />
        <x-common::utils.breadcrumb-item page="Edit" />

        @slot('action')
            <button type="button" class="btn bg-secondary text-white rounded-full" onclick="window.history.back()">
                <i class="bx bx-left-arrow-alt text-base me-2"></i> Kembali
            </button>
        @endslot
    </x-common::utils.breadcrumb>

    <livewire:administrator::permission.edit :permission="$permission" />
@endsection

@push('script')
@endpush
