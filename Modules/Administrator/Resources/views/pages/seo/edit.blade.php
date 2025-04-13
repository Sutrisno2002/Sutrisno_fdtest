@extends('administrator::layouts.master')

@section('title', 'Edit SEO')

@push('style')
    {{--  --}}
@endpush

@section('content')
    <x-common::utils.breadcrumb title="SEO">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.setting.main.index') }}" page="Pengaturan" />
        <x-common::utils.breadcrumb-item href="{{ route('administrator.setting.seo.index') }}" page="SEO" />
        <x-common::utils.breadcrumb-item page="Edit" />

        @slot('action')
            <button type="button" class="btn bg-secondary text-white rounded-full" onclick="window.history.back()">
                <i class="bx bx-left-arrow-alt text-base me-2"></i> Kembali
            </button>
        @endslot
    </x-common::utils.breadcrumb>

    <livewire:administrator::seo.edit :seo="$seo" />
@endsection


@push('script')
    {{--  --}}
@endpush
