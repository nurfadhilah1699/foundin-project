<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>FoundIn</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('impact') }}/assets/img/favicon-fi.png" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('impact') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('impact') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('impact') }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('impact') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('impact') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('impact') }}/assets/css/main.css" rel="stylesheet">

  <!-- Custom Style -->
  <style>
    .btn-custom {
      color: #ffffff;
      background: #008374;
      border: 0;
      padding: 12px 30px;
      transition: 0.4s;
      border-radius: 50px;
    }

    .btn-custom:hover {
      background: color-mix(in srgb, #008374, transparent 20%);
      color: color-mix(in srgb, #ffffff, transparent 10%);
    }
  </style>

  <!-- =======================================================
  * Template Name: Impact
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:foundinhelpdesk@gmail.com">foundinhelpdesk@gmail.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 823 4567 8901</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
          <img src="{{ asset('impact') }}/assets/img/logo-white.png" alt="">
          {{-- <h1 class="sitename">FoundIn</h1> --}}
          <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="/" class="active">Home<br></a></li>
            <li><a href="/explore">Explore</a></li>
            <li><a href="/posts/create">Create Post</a></li>
            <li><a href="#contact">Help</a></li>
            @if (Route::has('login'))
                @auth
                  @if (Auth::user()->role == 'admin')
                  <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                      <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                      <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                      <li>
                        <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  this.closest('form').submit();">Logout</a>
                        </form>
                      </li>
                    </ul>
                  </li>
                  @else
                    <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                        <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                        <li>
                          <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">Logout</a>
                          </form>
                        </li>
                      </ul>
                    </li> 
                  @endif
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>

                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                @endauth
            @endif
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero or Page Title-->
    @yield('hero')

    <!-- Alert success-->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
    </div>
    @endif
    
    <!-- Begin Page Content -->
    @yield('content')

  <footer id="footer" class="footer accent-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="/" class="logo d-flex align-items-center">
            <span class="sitename">FoundIn</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Courses Information</h4>
          <ul>
            <li><a href="#">Front-End Web</a></li>
            <li><a href="#">Back-End Web</a></li>
            <li><a href="#">Machine Learning</a></li>
            <li><a href="#">Android Developer</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>Jl. Poros Majene-Mamuju, Sendana</p>
          <p>Kab. Majene, Sulawesi Barat 91452</p>
          <p>Indonesia</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+62 823 9435 6836</span></p>
          <p><strong>Email:</strong> <span>foundinhelpdesk@gmail.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">FoundIn</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('impact') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('impact') }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('impact') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('impact') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('impact') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('impact') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="{{ asset('impact') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ asset('impact') }}/assets/js/main.js"></script>
  @yield('scripts')

</body>

</html>