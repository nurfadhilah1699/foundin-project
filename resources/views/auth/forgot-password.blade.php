{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.guest')

@section('body')
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        @include('components.application-logo')
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
    
          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="input-group mb-3">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-custom btn-block">Request new password</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
          <p class="mt-3 mb-1">
            <a href="{{ route('login') }}">Login</a>
          </p>
          <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">Register a new account</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
</body>
@endsection

