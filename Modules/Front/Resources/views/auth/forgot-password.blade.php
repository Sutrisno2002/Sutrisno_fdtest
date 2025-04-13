@extends('core::layouts.auth')

@section('title', 'Forgot Password')

@push('style')
@endpush

@section('content')
    @if (session()->has('status'))
        <x-common::utils.alert class="primary mb-3" icon="bx bx-check-circle" title="Success!" dismissable>
            {{ session('status') }}
        </x-common::utils.alert>
    @endif
    <div class="card overflow-hidden sm:rounded-md rounded-none">
        <div class="p-6 pt-8">

            <h3 class="mb-2 text-gray-600">Forgot Password.</h3>
            <p class="mb-8">Forgot your password? No problem. Just let us know your email address and we will email you a
                password reset link that will allow you to choose a new one.</p>

            <form method="POST" action="{{ route('auth.password.email') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                           for="LoggingEmailAddress">Email Address</label>
                    <input type="email" name="email" class="form-input @error('email') is-invalid @enderror"
                           id="email" placeholder="Enter email" value="{{ old('email') }}">

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex justify-center mb-6">
                    <button class="btn w-full text-white bg-primary">Email Me Password Reset Link</button>
                </div>
            </form>
        </div>

    </div>
@endsection

@push('script')
@endpush
