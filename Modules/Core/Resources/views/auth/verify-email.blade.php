@extends('core::layouts.auth')

@section('title', 'Verifikasi Email')

@push('style')
@endpush

@section('content')
    <div class="card overflow-hidden sm:rounded-md rounded-none">
        <div class="p-6 pt-8">
            <h3 class="mb-2 text-gray-600">Verifikasi Email</h3>
            <p class="mb-8">Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan ke email Anda. Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkan yang baru.</p>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form class="flex mb-2" method="POST" action="{{ route('auth.verification.send') }}">
                @csrf
                <button type="submit" class="btn w-full text-white bg-primary">Kirim Ulang Email Verifikasi</button>
            </form>

            <form class="flex" method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit" class="btn w-full text-gray-700 bg-outline-primary">
                    {{ __('Keluar') }}
                </button>
            </form>
        </div>
    </div>
@endsection

@push('script')
@endpush
