@extends('core::layouts.master')

@section('title', 'Daftar User')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-admin.components.breadcrumb page="User">
            <li class="breadcrumb-item active" aria-current="page">Daftar User</li>

            <x-slot name="button">
                <a href="{{ route('core.user.create') }}" class="btn bg-primary">
                    + User </a>
            </x-slot>
        </x-admin.components.breadcrumb>
        <div class="row">
            <div class="col-12">
                <livewire:common::user.table />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
