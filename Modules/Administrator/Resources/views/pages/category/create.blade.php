@extends('administrator::layouts.master')

@section('title', 'Tambah Kategori')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-common::utils.breadcrumb title="Kategori">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('administrator.setting.category.index') }}">Kategori</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>

            <x-slot name="button">
                <a href="{{ route('administrator.setting.category.index') }}" class="btn bg-primary">
                    <i class="bx bx-left-arrow-alt mt-1 mr-1"></i> Kembali
                </a>
            </x-slot>
        </x-common::utils.breadcrumb>
        <div class="row">
            <div class="col-md-6">
                <livewire:administrator::category.create :parent_id="request()->get('parent_id')" />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
