<div id="comment-{{ $comment->id }}" class="comment" style="margin-left: {{ $comment->parent_id ? '40px' : '0' }};">
  <div class="d-flex">
    <div class="comment-img">
      <img src="{{ asset('impact/assets/img/blog/comments-1.jpg') }}" alt="User Avatar">
    </div>
    <div>
      <h5>
        <a href="#">{{ $comment->user->name }}</a>
        <a href="#" class="reply" data-comment-id="{{ $comment->id }}"><i class="bi bi-reply-fill"></i> Reply</a>
      </h5>
      <time datetime="{{ $comment->created_at }}">{{ $comment->created_at->format('d M, Y') }}</time>
      <p>{{ $comment->content }}</p>
    </div>
  </div>

  @if($comment->replies)
    @foreach($comment->replies as $reply)
      @include('posts.partials.comment', ['comment' => $reply])
    @endforeach
  @endif
</div>
