@extends('layouts.guest')

@section('body')
<body class="hold-transition login-page">
    <!-- logo -->
    <div class="login-box">
      <div class="login-logo">
        @include('components.application-logo')
      </div>

      <div class="card">
        <div class="card-body login-card-body">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="input-group mb-3">
                    <input type="email" id="email" name="email" class="form-control"
                        value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password"
                        placeholder="New Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        required autocomplete="new-password" placeholder="Confirm New Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-custom btn-block">Reset Password</button>
                    </div>
                </div>
            </form>

        </div>
      </div>
    </div>
</body>
@endsection


