@extends('administrator::layouts.master')

@section('title', 'Anggota')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-common::utils.breadcrumb title="Anggota">
            <x-common::utils.breadcrumb-item page="Anggota" />

            @slot('action')
            <livewire:administrator::member.action />
                
            @endslot
        </x-common::utils.breadcrumb>
        <div class="row">
            <div class="col-12">
                <livewire:administrator::member.table />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
