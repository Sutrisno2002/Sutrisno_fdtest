@extends('core::layouts.auth')

@section('title', 'Register')

@push('style')
@endpush

@section('content')
    <div class="card overflow-hidden sm:rounded-md rounded-none">
        <div class="p-6 pt-8">

            <h3 class="mb-2 text-gray-600">Register</h3>
            <p class="mb-8">Now you can create new account.</p>

            @if (session()->has('status'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form method="POST" action="{{ route('auth.register') }}">
                @csrf

                <div class="mb-4">
                    <input type="text" name="name" class="form-input @error('name') is-invalid @enderror"
                        id="name" placeholder="Enter name" value="{{ old('name') }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <input type="email" name="email" class="form-input @error('email') is-invalid @enderror"
                        id="email" placeholder="Enter email" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <input type="password" name="password" class="form-input @error('password') is-invalid @enderror"
                        id="password" placeholder="Password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <input type="password" name="password_confirmation"
                        class="form-input @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" placeholder="Re-type password">
                </div>

                <div class="flex justify-center mb-6">
                    <button type="submit" class="btn w-full text-white bg-primary">Register</button>
                </div>
            </form>

            <p class="text-gray-500 dark:text-gray-400 text-center">Already registered? <a
                    href="{{ route('auth.login') }}" class="text-primary ms-1"><b>Log In</b></a>
            </p>
        </div>
    </div>
@endsection

@push('script')
@endpush
