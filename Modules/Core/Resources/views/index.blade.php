@extends('core::layouts.master')

@section('title', 'Dashboard')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-admin.components.breadcrumb page="Dashboard">
            <li class="breadcrumb-item active" aria-current="Dashboard">Dashboard</li>
        </x-admin.components.breadcrumb>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-0 pb-1">Session</h5>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <livewire:common::activity.session />
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush
