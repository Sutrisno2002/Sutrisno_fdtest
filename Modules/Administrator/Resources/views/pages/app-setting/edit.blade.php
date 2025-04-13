@extends('administrator::layouts.master')

@section('title', 'Edit Pengaturan')

@push('style')
    {{--  --}}
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Pengaturan">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.setting.main.index') }}" page="Pengaturan" />
        <x-common::utils.breadcrumb-item page="Edit" />

        @slot('action')
            <button type="button" class="btn bg-secondary text-white rounded-full" onclick="window.history.back()">
                <i class="bx bx-left-arrow-alt text-base me-2"></i> Kembali
            </button>
        @endslot
    </x-common::utils.breadcrumb>

    <livewire:administrator::app-setting.edit :app-setting="$app_setting" />
@endsection

@push('script')
    {{--  --}}
@endpush
