@extends('core::layouts.auth')

@section('title', 'Verify Email')

@push('style')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="login-header">
                <h3>Verify Email</h3>
                <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the
                    link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
            </div>

            <div class="login-body">
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> A new verification link has been sent to the email address you provided
                        during registration.'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form class="flex mb-2" method="POST" action="{{ route('auth.verification.send') }}">
                    @csrf
                    <button type="submit" class="btn bg-primary">Resend Verification Email</button>
                </form>

                <form class="flex" method="POST" action="{{ route('auth.logout') }}">
                    @csrf
                    <button type="submit" class="btn bg-outline-primary">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
