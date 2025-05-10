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