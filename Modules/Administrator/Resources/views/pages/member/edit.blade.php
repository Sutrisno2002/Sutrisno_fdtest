@extends('administrator::layouts.master')

@section('title', 'Edit')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-common::utils.breadcrumb title="Anggota">
            <x-common::utils.breadcrumb-item href="{{ route('administrator.member.index') }}" page="Anggota" />
            <x-common::utils.breadcrumb-item page="Edit" />

            @slot('action')
            <button type="button" class="btn bg-secondary text-white rounded-full" onclick="window.history.back()">
                <i class="bx bx-left-arrow-alt text-base me-2"></i> Kembali
            </button>
            @endslot
        </x-common::utils.breadcrumb>
        <div class="row">
            <div class="col-md-8">
                <livewire:administrator::member.edit :member="$member" />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
