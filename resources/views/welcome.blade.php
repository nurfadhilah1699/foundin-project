@extends('layouts.main')

@section('hero')

<!-- Hero Section -->
<section id="hero" class="hero section accent-background">

  <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-5 justify-content-between">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h2><span>Welcome to </span><span class="accent">FoundIn</span></h2>
        <p>Temukan berbagai info menarik terkait kursus dan pelatihan disini, dan kembangkan skillmu!</p>
        <div class="d-flex">
          <a href="#about" class="btn-get-started">Get Started</a>
        </div>
      </div>
      <div class="col-lg-5 order-1 order-lg-2">
        <img src="{{ asset('impact') }}/assets/img/hero2-img.png" class="img-fluid" alt="">
      </div>
    </div>
  </div>

  <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
    <div class="container position-relative">
      <div class="row gy-4 mt-5">

        <div class="col-xl-3 col-md-6">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-pc-display-horizontal"></i></div>
            <h4 class="title"><a href="" class="stretched-link">Front-End Web</a></h4>
          </div>
        </div><!--End Icon Box -->

        <div class="col-xl-3 col-md-6">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-database-gear"></i></div>
            <h4 class="title"><a href="" class="stretched-link">Back-End Web</a></h4>
          </div>
        </div><!--End Icon Box -->

        <div class="col-xl-3 col-md-6">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-robot"></i></div>
            <h4 class="title"><a href="" class="stretched-link">Machine Learning</a></h4>
          </div>
        </div><!--End Icon Box -->

        <div class="col-xl-3 col-md-6">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-android2"></i></div>
            <h4 class="title"><a href="" class="stretched-link">Android Dev</a></h4>
          </div>
        </div><!--End Icon Box -->

      </div>
    </div>
  </div>

</section>
<!-- /Hero Section -->

@endsection

@section('content')

<!-- Recent Posts Section -->
<section id="recent-posts" class="recent-posts section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Feed Content</h2>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      @foreach ($posts as $post)
      <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <article>

          <div class="post-img">
            @if($post->image)
              <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
            @else
              <img src="{{ asset('impact/assets/img/blog/blog-1.jpg') }}" alt="{{ $post->title }}" class="img-fluid">
            @endif
          </div>

          <p class="post-category">
            @if($post->categories->count() > 0)
              {{ $post->categories->first()->name }}
            @else
              Uncategorized
            @endif
          </p>

          <h2 class="title">
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
          </h2>

          <div class="d-flex align-items-center">
            <img src="{{ asset('impact/assets/img/blog/blog-author.jpg') }}" alt="Author" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author">{{ $post->user->name ?? 'Unknown' }}</p>
              <p class="post-date">
                <time datetime="{{ $post->created_at->toDateString() }}">{{ $post->created_at->format('M d, Y') }}</time>
              </p>
            </div>
          </div>

        </article>
      </div><!-- End post list item -->
      @endforeach

      <!-- Link to Explore Page -->
      <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="100">
        <a href="{{ route('explore') }}" class="btn-custom">Telusuri Lebih Lanjut</a>
      </div>

    </div><!-- End recent posts list -->

  </div>

</section><!-- /Recent Posts Section -->

<!-- Contact Section -->
<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Help</h2>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gx-lg-0 gy-4">

      <div class="col-lg-4">
        <div class="info-container d-flex flex-column align-items-center justify-content-center">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Address</h3>
              <p>Jl. Poros Majene-Mamuju, Sendana, Kab. Majene, Sulawesi Barat 91452</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Call Us</h3>
              <p>+62 823 9435 6836</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email Us</h3>
              <p>foundinhelpdesk@gmail.com</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
            <i class="bi bi-clock flex-shrink-0"></i>
            <div>
              <h3>Open Hours:</h3>
              <p>Mon-Fri: 9AM - 9PM</p>
            </div>
          </div><!-- End Info Item -->

        </div>

      </div>

      <div class="col-lg-8">
        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade" data-aos-delay="100">
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="8" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <button type="submit">Send Message</button>
            </div>

          </div>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>

</section><!-- /Contact Section -->

@endsection