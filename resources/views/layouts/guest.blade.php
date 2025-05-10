<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FoundIn</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin-lte') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin-lte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin-lte') }}/dist/css/adminlte.min.css">

  <style>
    body{
        font-family: 'Poppins', 'Montserrat', 'Roboto', sans-serif;
        background: #04695d !important;
    }
    .card-body {
        background: #f0fdfa;
        color: #465e57;
    }
    .card-body > a, div.input-group-text, span {
        color: #465e57;
    }
    .card-body > a:hover {
        color: #263833;
    }
    .card-body > p > a {
        color: #465e57;
    }
    .card-body > p > a:hover {
        color: #263833;
    }
    .btn-custom {
        background: #04695d;
        color: whitesmoke;
        border: none;
        font-weight: 600;
    }
    .btn-custom:hover,
    .btn-custom:focus {
      background-color: #005f52;
      color: white;
    }
    div > .btn-custom:hover {
      box-shadow: 0 6px 12px rgba(15, 118, 110, 0.5);
    }
  </style>
</head>

@yield('body')

<!-- jQuery -->
<script src="{{ asset('admin-lte') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin-lte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin-lte') }}/dist/js/adminlte.min.js"></script>
</html>