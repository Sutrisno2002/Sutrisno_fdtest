@extends('administrator::layouts.master')

@section('title', 'Edit Profil')

@push('style')
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Profil">
        <x-common::utils.breadcrumb-item page="Profil" />
    </x-common::utils.breadcrumb>

    <livewire:administrator::profile.edit :user-id="$user" />
@endsection

@push('script')
@endpush
