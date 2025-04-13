@extends('core::layouts.master')

@section('title', 'Daftar Role')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-admin.components.breadcrumb page="Role">
            <li class="breadcrumb-item active" aria-current="page">Daftar Role</li>

            <x-slot name="button">
                <a href="{{ route('core.role.create') }}" class="btn bg-primary">
                    + Role </a>
            </x-slot>
        </x-admin.components.breadcrumb>
        <div class="row">
            <div class="col-12">
                <livewire:common::role.table />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
