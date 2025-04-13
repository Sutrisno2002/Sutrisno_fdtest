@extends('administrator::layouts.master')

@section('title', 'Daftar FAQ')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-common::utils.breadcrumb title="FAQ">
            <li class="breadcrumb-item active" aria-current="page">Daftar FAQ</li>
        </x-common::utils.breadcrumb>
        <livewire:administrator::faq.table />
    </div>
@endsection

@push('script')
@endpush
