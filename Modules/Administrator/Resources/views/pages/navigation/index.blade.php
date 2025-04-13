@extends('administrator::layouts.master')

@section('title', 'Daftar Navigasi')

@push('style')
    <style>
        .list-group.child {
            background: #ffffff;
            border-radius: 0 !important;
        }

        .list-group.child a {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        .list-group.child .list-group-item {
            position: relative;
            background: #ffffff;
            padding: 0.5rem 1.25rem;
            border-bottom: 0;
            border-right: 0;
            border-left: 0;
            margin-left: 2.5rem;
            border-color: #f5f5f5;
            border-radius: 0 !important;
            border-collapse: collapse;
        }

        .list-group.child .list-group-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: -1px;
            bottom: -1px;
            border-left: 1px solid #844ff1;
        }

        .list-group.child .list-group-item::after {
            content: '';
            position: absolute;
            left: -5px;
            top: 50%;
            transform: translate(0px, -50%);
            border: 5px solid #844ff1;
            width: 10px;
            border-radius: 100%;
        }
    </style>
@endpush

@section('content')
    <div id="main-wrapper">
        <x-common::utils.breadcrumb title="Navigasi">
            <li class="breadcrumb-item active" aria-current="page">Daftar Navigasi</li>
        </x-common::utils.breadcrumb>
        <div class="row">
            <div class="col-12">
                <livewire:administrator::navigation.table />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
