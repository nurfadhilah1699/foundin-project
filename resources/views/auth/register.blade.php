@extends('layouts.guest')

@section('body')
<body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        @include('components.application-logo')
      </div>
    
      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Register a new membership</p>
    
          <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="name" name="name" placeholder="Name">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
                <select name="role" id="role" class="form-control" required>
                    <option value="user">User </option>
                    <option value="admin">Admin</option>
                </select>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" id="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-custom btn-block">Register</button>
                </div>
                <!-- /.col -->
            </div>
          </form>
    
          {{-- signup with google --}}
          {{-- <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-custom">
              <i class="fab fa-google mr-2"></i>
              Sign up using Google
            </a>
          </div> --}}
    
          <a href="{{ route('login') }}" class="text-center">I already have an account</a>
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
</body>
@endsection