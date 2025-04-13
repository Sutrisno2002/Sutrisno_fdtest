@extends('core::layouts.master')

@section('title', 'Daftar Permission')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-admin.components.breadcrumb page="Permission">
            <li class="breadcrumb-item active" aria-current="page">Daftar Permission</li>

            <x-slot name="button">
                <a href="{{ route('core.permission.create') }}" class="btn bg-primary">
                    + Permission </a>
            </x-slot>
        </x-admin.components.breadcrumb>
        <div class="row">
            <div class="col-12">
                <livewire:common::permission.table />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
