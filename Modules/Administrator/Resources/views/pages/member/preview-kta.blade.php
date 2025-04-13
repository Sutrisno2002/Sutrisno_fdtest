@extends('administrator::layouts.master')

@section('title', 'Anggota')

@push('style')
@endpush

@section('content')
    <div id="main-wrapper">
        <x-common::utils.breadcrumb title="Anggota">
            <x-common::utils.breadcrumb-item page="Anggota" />
            <x-common::utils.breadcrumb-item page="Kirim KTA" />

        </x-common::utils.breadcrumb>
        <div class="row">
            <div class="col-12">
                <h3>Preview KTA</h3>
                <iframe src="{{ url($pdfName) }}" width="100%" height="500px" style="border: none;"></iframe>
            </div>

        </div>
    </div>
@endsection

@push('script')
@endpush
