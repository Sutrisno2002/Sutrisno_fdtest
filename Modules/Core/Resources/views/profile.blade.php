@extends('core::layouts.master')

@section('title', 'Edit Profile')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-admin.components.breadcrumb page="Profil">
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
        </x-admin.components.breadcrumb>
        <div class="row">
            <div class="col-md-8">
                <livewire:common::profile.edit :user="user()" />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
