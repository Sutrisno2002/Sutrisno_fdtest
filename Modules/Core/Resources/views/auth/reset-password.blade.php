@extends('core::layouts.auth')

@section('title', 'Update Password')

@push('style')
@endpush

@section('content')
    @if (session()->has('status'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card overflow-hidden sm:rounded-md rounded-none">
        <div class="p-6 pt-8">

            <h3 class="mb-2 text-gray-600">Update Password.</h3>
            <p class="mb-8">Update your password.</p>


            @error('token')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>error!</strong> {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror

            <form method="POST" action="{{ route('auth.password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->token }}">

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="email">E-Mail
                        Address</label>
                    <input type="email" name="email" class="form-input @error('email') is-invalid @enderror"
                           id="email" placeholder="Enter email" value="{{ old('email') ?: request('email') }}">

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                           for="password">Password</label>
                    <input type="password" name="password" class="form-input @error('password') is-invalid @enderror"
                           id="password" placeholder="Enter password" value="{{ old('password') }}">

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                           for="password_confirmation">Re-type Password</label>
                    <input type="password" name="password_confirmation"
                           class="form-input @error('password_confirmation') is-invalid @enderror"
                           id="password_confirmation" placeholder="Re-type password"
                           value="{{ old('password_confirmation') }}">

                    @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="flex justify-center mb-6">
                    <button class="btn w-full text-white bg-primary">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
@endpush
