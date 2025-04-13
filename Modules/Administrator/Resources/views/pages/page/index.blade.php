@extends('administrator::layouts.master')

@section('title', 'Halaman Web')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-common::utils.breadcrumb title="Halaman Web">
            <x-common::utils.breadcrumb-item page="Halaman Web" />

            @slot('action')
                @can('create.page', 'web')
                    <a href="{{ route('administrator.page.create') }}" class="btn bg-primary text-white rounded-full">
                        + Halaman </a>
                @endcan
            @endslot
        </x-common::utils.breadcrumb>
        <div class="row">
            <div class="col-12">
                <livewire:administrator::page.table />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
