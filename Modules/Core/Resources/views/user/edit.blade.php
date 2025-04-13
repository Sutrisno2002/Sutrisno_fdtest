@extends('core::layouts.master')

@section('title', 'Edit User')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-admin.components.breadcrumb page="User">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('core.user.index') }}">User</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>

            <x-slot name="button">
                <a href="{{ route('core.user.index') }}" class="btn bg-primary">
                    <i class="bx bx-left-arrow-alt mt-1 mr-1"></i> Kembali
                </a>
            </x-slot>
        </x-admin.components.breadcrumb>
        <div class="row">
            <div class="col-md-8">
                <livewire:common::user.edit :user="$user" />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
