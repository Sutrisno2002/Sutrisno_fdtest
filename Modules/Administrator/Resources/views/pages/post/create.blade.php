@extends('administrator::layouts.master')

@section('title', 'Buku')

@push('style')
    {{--  --}}
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Buku">
        <x-common::utils.breadcrumb-item href="{{ route('administrator.post.article.index') }}" page="Buku" />
        <x-common::utils.breadcrumb-item page="Tambah" />

        @slot('action')
            <button type="button" class="btn bg-secondary text-white rounded-full" onclick="window.history.back()">
                <i class="bx bx-left-arrow-alt text-base me-2"></i> Kembali
            </button>
        @endslot
    </x-common::utils.breadcrumb>


    <div class="flex flex-col gap-6">
        <livewire:administrator::post.create />
    </div>
@endsection

@push('script')
    {{--  --}}
@endpush
