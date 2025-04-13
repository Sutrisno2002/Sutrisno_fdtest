@extends('core::layouts.auth')

@section('title', 'Register')

@push('style')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="login-header">
                <h3>Register</h3>
                <p>Now you can create new account.</p>
            </div>

            <div class="login-body">
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

                    <div class="form-group">
                        <input ttype="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               id="name" placeholder="Enter name" value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" placeholder="Enter email" value="{{ old('email') }}">

                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" placeholder="Password">

                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation"
                               class="form-control @error('password_confirmation') is-invalid @enderror"
                               id="password_confirmation" placeholder="Re-type password">
                    </div>
                    <button type="submit" class="btn bg-primary">Register</button>
                </form>
                <p class="m-t-sm">
                    <a href="{{ route('auth.login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
