@extends('core::layouts.auth')

@section('title', 'Login')

@push('style')
@endpush

@section('content')
    <div class="card overflow-hidden sm:rounded-md rounded-none">
        <div class="p-6 pt-8">

            <h3 class="mb-2 text-gray-600">Log In.</h3>
            <p class="mb-8">Welcome back! Please login to continue.</p>

            <form method="POST" action="{{ route('auth.login.form') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                           for="LoggingEmailAddress">Email Address</label>
                    <input id="LoggingEmailAddress" class="form-input" type="email" placeholder="Enter your email"
                           name="email">

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                           for="loggingPassword">Password</label>
                    <input id="loggingPassword" class="form-input" type="password" placeholder="Enter your password"
                           name="password">

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" class="form-checkbox rounded" id="checkbox-signin">
                        <label class="ms-2" for="checkbox-signin">Remember me</label>
                    </div>

                    @if (Route::has('auth.password.request'))
                        <a class="text-sm text-primary border-b border-dashed border-primary"
                           href="{{ route('auth.password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="flex justify-center mb-6">
                    <button class="btn w-full text-white bg-primary"> Log In</button>
                </div>
            </form>

            {{-- <div class="flex items-center my-6">
                <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
                <div class="mx-4 text-secondary">Or</div>
                <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
            </div>

            <div class="flex gap-4 justify-center mb-6">
                <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                    <span class="flex justify-center items-center gap-2">
                        <i class="mgc_github_line text-info text-xl"></i>
                        <span class="lg:block hidden">Github</span>
                    </span>
                </a>
                <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                    <span class="flex justify-center items-center gap-2">
                        <i class="mgc_google_line text-danger text-xl"></i>
                        <span class="lg:block hidden">Google</span>
                    </span>
                </a>
                <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                    <span class="flex justify-center items-center gap-2">
                        <i class="mgc_facebook_line text-primary text-xl"></i>
                        <span class="lg:block hidden">Facebook</span>
                    </span>
                </a>
            </div> --}}

            @if (Route::has('auth.register'))
                <p class="text-gray-500 dark:text-gray-400 text-center">Don't have an account ?<a
                       href="{{ route('auth.register') }}" class="text-primary ms-1"><b>Register</b></a>
                </p>
            @endif
        </div>
    </div>
@endsection

@push('script')
@endpush
