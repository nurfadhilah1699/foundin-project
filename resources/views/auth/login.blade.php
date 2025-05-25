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
          <p class="login-box-msg">Log in to start your session</p>
    
          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="input-group mb-3">
              <input type="password" id="password" type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
              @error('password')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember_me" name="remember">
                  <label for="remember_me">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-custom btn-block">Log In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
          {{-- <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-custom">
              <i class="fab fa-google mr-2"></i> Log in using Google
            </a>
          </div> --}}
          <!-- /.social-auth-links -->
    
          <p class="mb-1">
            @if (Route::has('password.request'))    
              <a href="{{ route('password.request') }}">I forgot my password</a>
            @endif
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






