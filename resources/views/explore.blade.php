@extends('layouts.main')

@section('hero')
    <!-- Page Title -->
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Explore</h1>
                        <p class="mb-0">Eksplorasi Info Pelatihan & Kursus</p>
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
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Blog Posts Section -->
                <section id="blog-posts" class="blog-posts section">
                <div class="row gy-4">
                    @forelse ($posts as $post)
                    <div class="col-sm-6">
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
                            </p> <!-- You can replace with actual category if available -->

                            <h2 class="title">
                                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="{{ $post->user && $post->user->profile_picture ? asset('storage/' . $post->user->profile_picture) : asset('impact/assets/img/default-avatar-icon.jpg') }}" alt="Author" class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">{{ $post->user->name ?? 'Unknown' }}</p>
                                    <p class="post-date">
                                        <time datetime="{{ $post->created_at->toDateString() }}">{{ $post->created_at->format('M d, Y') }}</time>
                                    </p>
                                </div>
                            </div>

                        </article>
                    </div><!-- End post list item -->
                    @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <h4>Belum ada konten tersedia.</h4>
                        </div>
                    </div>
                    @endforelse
                </div>
                </section><!-- /Blog Posts Section -->

                <!-- Blog Pagination Section -->
                <section id="blog-pagination" class="blog-pagination section">

                    <div class="container">
                        <div class="d-flex justify-content-center mt-4">
                            <ul>
                                {{-- Previous Page Link --}}
                                @if ($posts->onFirstPage())
                                    <li class="disabled"><a href="#"><</a></li>
                                @else
                                    <li><a href="{{ $posts->previousPageUrl() }}"><</a></li>
                                @endif

                                {{-- Pagination Elements --}}
                                @php
                                    $start = max($posts->currentPage() - 2, 1);
                                    $end = min($posts->currentPage() + 2, $posts->lastPage());
                                @endphp

                                @if($start > 1)
                                    <li><a href="{{ $posts->url(1) }}">1</a></li>
                                    @if($start > 2)
                                        <li>...</li>
                                    @endif
                                @endif

                                @for ($page = $start; $page <= $end; $page++)
                                    @if ($page == $posts->currentPage())
                                        <li><a href="{{ $posts->url($page) }}" class="active">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $posts->url($page) }}">{{ $page }}</a></li>
                                    @endif
                                @endfor

                                @if($end < $posts->lastPage())
                                    @if($end < $posts->lastPage() - 1)
                                        <li>...</li>
                                    @endif
                                    <li><a href="{{ $posts->url($posts->lastPage()) }}">{{ $posts->lastPage() }}</a></li>
                                @endif

                                {{-- Next Page Link --}}
                                @if ($posts->hasMorePages())
                                    <li><a href="{{ $posts->nextPageUrl() }}">></a></li>
                                @else
                                    <li class="disabled"><a href="#">></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </section><!-- /Blog Pagination Section -->
            </div>

            <div class="col-lg-4 sidebar">
                @include('layouts.widget')
            </div>

        </div>
    </div>
@endsection
