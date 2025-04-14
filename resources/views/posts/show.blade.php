@extends('layouts.main')
@section('hero')
<!-- Page Title -->
<div class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Detail Page</h1>
            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="/">Home</a></li>
          <li class="current">Detail Page</li>
        </ol>
      </div>
    </nav>
</div><!-- End Page Title -->

@endsection

@section('content')

<div class="container">
  <div class="row">

    <div class="col-lg-8">

      <!-- Details Section -->
      <section id="blog-details" class="blog-details section">
        <div class="container">

          <article class="article">

            <div class="post-img">
              <img src="{{ asset('storage/'. $post->image) }}" alt="Post Image" class="img-fluid">
            </div>

            <h2 class="title">{{ $post->title }}</h2>

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i>{{ $post->user->name }}</li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i>{{ $post->created_at}}</li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>
              </ul>
            </div><!-- End meta top -->

            <div class="description">

              <p>{{ $post->description }}</p>

            </div><!-- End post content -->

            <div class="meta-bottom">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li><a href="#">Business</a></li>
              </ul>

              <i class="bi bi-tags"></i>
              <ul class="tags">
                <li><a href="#">Creative</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>
            </div><!-- End meta bottom -->

          </article>

        </div>
      </section><!-- /Blog Details Section -->

      <!-- Blog Comments Section -->
      <section id="blog-comments" class="blog-comments section">

        <div class="container">

          <h4 class="comments-count">8 Comments</h4>

          <div id="comment-1" class="comment">
            <div class="d-flex">
              <div class="comment-img"><img src="{{ asset('impact') }}/assets/img/blog/comments-1.jpg" alt=""></div>
              <div>
                <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan,2022</time>
                <p>
                  Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.
                  Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                </p>
              </div>
            </div>
          </div><!-- End comment #1 -->

          <div id="comment-2" class="comment">
            <div class="d-flex">
              <div class="comment-img"><img src="{{ asset('impact') }}/assets/img/blog/comments-2.jpg" alt=""></div>
              <div>
                <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan,2022</time>
                <p>
                  Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                </p>
              </div>
            </div>

            <div id="comment-reply-1" class="comment comment-reply">
              <div class="d-flex">
                <div class="comment-img"><img src="{{ asset('impact') }}/assets/img/blog/comments-3.jpg" alt=""></div>
                <div>
                  <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                  <time datetime="2020-01-01">01 Jan,2022</time>
                  <p>
                    Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.

                    Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.

                    Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.
                  </p>
                </div>
              </div>

              <div id="comment-reply-2" class="comment comment-reply">
                <div class="d-flex">
                  <div class="comment-img"><img src="{{ asset('impact') }}/assets/img/blog/comments-4.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan,2022</time>
                    <p>
                      Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                    </p>
                  </div>
                </div>

              </div><!-- End comment reply #2-->

            </div><!-- End comment reply #1-->

          </div><!-- End comment #2-->

        </div>

      </section><!-- /Blog Comments Section -->

      <!-- Comment Form Section -->
      <section id="comment-form" class="comment-form section">
        <div class="container">

          <form action="">

            <h4>Post Comment</h4>
            <div class="row">
              <div class="col form-group">
                <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Post Comment</button>
            </div>

          </form>

        </div>
      </section><!-- /Comment Form Section -->

    </div>

    <div class="col-lg-4 sidebar">

      <div class="widgets-container">

        <!-- Search Widget -->
        <div class="search-widget widget-item">

          <h3 class="widget-title">Search</h3>
          <form action="">
            <input type="text">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
          </form>

        </div><!--/Search Widget -->

        <!-- Categories Widget -->
        <div class="categories-widget widget-item">

          <h3 class="widget-title">Categories</h3>
          <ul class="mt-3">
            <li><a href="#">General <span>(25)</span></a></li>
            <li><a href="#">Lifestyle <span>(12)</span></a></li>
            <li><a href="#">Travel <span>(5)</span></a></li>
            <li><a href="#">Design <span>(22)</span></a></li>
            <li><a href="#">Creative <span>(8)</span></a></li>
            <li><a href="#">Educaion <span>(14)</span></a></li>
          </ul>

        </div><!--/Categories Widget -->

        <!-- Tags Widget -->
        <div class="tags-widget widget-item">

          <h3 class="widget-title">Tags</h3>
          <ul>
            <li><a href="#">App</a></li>
            <li><a href="#">IT</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Mac</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Office</a></li>
            <li><a href="#">Creative</a></li>
            <li><a href="#">Studio</a></li>
            <li><a href="#">Smart</a></li>
            <li><a href="#">Tips</a></li>
            <li><a href="#">Marketing</a></li>
          </ul>

        </div><!--/Tags Widget -->

      </div>

    </div>

  </div>
</div>
@endsection
