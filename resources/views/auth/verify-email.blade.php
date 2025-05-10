{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
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
            <p class="login-box-msg">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
    
            <div class="row">
                <div class="col-8">
                    <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                        <button type="submit" class="btn btn-custom btn-block">Resend Verification Email</button>
                        <!-- /.col -->
                    </form>
                </div>  

                <div class="col-4">
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                        <button type="submit" class="btn btn-custom btn-block">Log Out</button>
                    </form>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
</body>
@endsection