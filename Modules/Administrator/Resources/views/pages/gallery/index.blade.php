@extends('administrator::layouts.master')

@section('title', 'Galeri')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-common::utils.breadcrumb title="Galeri">
            <x-common::utils.breadcrumb-item page="Galeri" />

            @slot('action')
                @can('create.gallery', 'web')
                    <a href="{{ route('administrator.gallery.create') }}" class="btn bg-primary text-white rounded-full">
                        + Galeri </a>
                @endcan
            @endslot
        </x-common::utils.breadcrumb>
        <div class="row">
            <div class="col-12">
                <livewire:administrator::gallery.overview />
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
