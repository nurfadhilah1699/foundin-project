@extends('layouts.main')
@section('hero')
<!-- Page Title -->
<div class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Detail Page</h1>
            <p class="mb-0">Informasi Lengkap Pelatihan</p>
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

            @if(!empty($post->image))
            <div class="post-img">
              <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">
            </div>
            @endif

            <h2 class="title">{{ $post->title }}</h2>

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i>{{ $post->user ? $post->user->name : 'Unknown' }}</li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i>{{ $post->created_at}}</li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#comments">{{ $totalCommentsCount }} Comments</a></li>
              </ul>
            </div><!-- End meta top -->

            <div class="description">

              <p>{!! \App\Helpers\FormatTextHelper::formatText($post->description, 'p') !!}</p>

            </div><!-- End post content -->

            <div class="meta-bottom">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li>
                  @forelse ($post->categories as $category)
                    <a href="{{ route('explore', ['category' => $category->id]) }}">{{ $category->name }}</a>
                  @empty
                    <a href="#">No category</a>
                  @endforelse
                </li>
              </ul>

              <i class="bi bi-tags"></i>
              <ul class="tags">
                @forelse ($post->tags as $tag)
                  <li>
                    <a href="{{ route('explore', ['tag' => $tag->id]) }}">{{ $tag->name }}</a>
                  </li>
                @empty
                  <li><em>No tags</em></li>
                @endforelse
              </ul>
            </div><!-- End meta bottom -->

          </article>

        </div>
      </section><!-- /Blog Details Section -->

      <!-- Blog Comments Section -->
      <section id="blog-comments" class="blog-comments section">

        <div class="container">

          <h4 class="comments-count" id="comments">{{ $totalCommentsCount }} Comments</h4>

          @if($post->comments->count() > 0)
            <div class="comments-list">
              @foreach($post->comments as $comment)
                @include('posts.partials.comment', ['comment' => $comment])
              @endforeach
            </div>
          @else
            <p>No comments yet.</p>
          @endif

        </div>

      </section><!-- /Blog Comments Section -->

      <!-- Comment Form Section -->
      <section id="comment-form" class="comment-form section">
        <div class="container">

          <form action="{{ route('posts.comments.store', $post->id) }}" method="POST" id="commentForm">
            @csrf
            <input type="hidden" name="parent_id" id="parent_id" value="">

            <h4>Post Comment</h4>
            <div class="row">
              <div class="col form-group">
                <textarea name="content" class="form-control" placeholder="Your Comment*" required></textarea>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Post Comment</button>
              <button type="button" class="btn btn-secondary" id="cancelReply" style="display:none;">Cancel Reply</button>
            </div>

          </form>

        </div>
      </section><!-- /Comment Form Section -->

    </div>

    <div class="col-lg-4 sidebar">
      @include('layouts.widget')
    </div>

  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const commentForm = document.getElementById('commentForm');
    const parentIdInput = document.getElementById('parent_id');
    const cancelReplyBtn = document.getElementById('cancelReply');

    document.querySelectorAll('.reply').forEach(function (replyLink) {
      replyLink.addEventListener('click', function (e) {
        e.preventDefault();
        const commentId = this.getAttribute('data-comment-id');
        parentIdInput.value = commentId;
        commentForm.scrollIntoView({ behavior: 'smooth' });
        cancelReplyBtn.style.display = 'inline-block';
      });
    });

    cancelReplyBtn.addEventListener('click', function () {
      parentIdInput.value = '';
      cancelReplyBtn.style.display = 'none';
    });
  });
</script>

@endsection
