@extends('layouts.main')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Explore</h1>
                        <p class="mb-0">Browse all posts from newest to oldest.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Explore</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

        <div class="container">
            <div class="row gy-4">

                @foreach ($posts as $post)
                <div class="col-lg-4">
                    <article>

                        <div class="post-img">
                            @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                            @else
                            <img src="{{ asset('impact/assets/img/blog/blog-1.jpg') }}" alt="{{ $post->title }}" class="img-fluid">
                            @endif
                        </div>

                        <p class="post-category">Category</p> <!-- You can replace with actual category if available -->

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

            </div>
        </div>

    </section><!-- /Blog Posts Section -->

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">

        <div class="container">
            <div class="d-flex justify-content-center">
                <ul>
                    {{-- Previous Page Link --}}
                    @if ($posts->onFirstPage())
                        <li class="disabled"><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                    @else
                        <li><a href="{{ $posts->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a></li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                        @if ($page == $posts->currentPage())
                            <li><a href="{{ $url }}" class="active">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($posts->hasMorePages())
                        <li><a href="{{ $posts->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a></li>
                    @else
                        <li class="disabled"><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>

    </section><!-- /Blog Pagination Section -->

</main>
@endsection
