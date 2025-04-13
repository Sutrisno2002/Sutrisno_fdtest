@extends('administrator::layouts.master')

@section('title', 'Daftar SEO')

@push('style')
    {{--  --}}
@endpush

@section('content')
    <x-common::utils.breadcrumb title="SEO">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.setting.main.index') }}" page="Pengaturan" />
        <x-common::utils.breadcrumb-item page="SEO" />
    </x-common::utils.breadcrumb>

    <livewire:administrator::seo.table />
@endsection

@push('script')
    {{--  --}}
@endpush
