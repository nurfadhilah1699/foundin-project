@extends('admin-layouts.main')

@section('title', 'Comments')

@section('header-title', 'Comments')

@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Comments List</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Post Title</th>
                  <th>Comment</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($comments as $index => $comment)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $comment->user ? $comment->user->name : 'Unknown' }}</td>
                  <td>{{ $comment->post ? $comment->post->title : '' }}</td>
                  <td>{{ $comment->content }}</td>
                  <td><time datetime="{{ $comment->created_at }}">{{ $comment->created_at->format('d-M-Y') }}</time></td>
                  <td>
                    <div class="btn-group btn-group-sm">
                      <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirmDelete({{ $comment->id }})">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                <tr>
                @endforeach
              </tbody>
            </table>
            @if($comments->isEmpty())
                <p>No comments found.</p>
            @endif
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              {{-- Previous Page Link --}}
              @if ($comments->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
              @else
                <li class="page-item"><a class="page-link" href="{{ $comments->previousPageUrl() }}">&laquo;</a></li>
              @endif
              
              {{-- Pagination Elements --}}
              @php
                $start = max($comments->currentPage() - 2, 1);
                $end = min($comments->currentPage() + 2, $comments->lastPage());
              @endphp

              @if($start > 1)
                <li class="page-item"><a class="page-link" href="{{ $comments->url(1) }}">1</a></li>
                @if($start > 2)
                  <li class="page-item">...</li>
                @endif
              @endif
                
              @for ($page = $start; $page <= $end; $page++)
                @if ($page == $comments->currentPage())
                  <li class="page-item"><a class="page-link" href="{{ $comments->url($page) }}" class="active">{{ $page }}</a></li>
                @else
                  <li class="page-item"><a class="page-link" href="{{ $comments->url($page) }}">{{ $page }}</a></li>
                @endif
              @endfor
              
              @if($end < $comments->lastPage())
                @if($end < $comments->lastPage() - 1)
                  <li class="page-item">...</li>
                @endif
                  <li class="page-item"><a class="page-link" href="{{ $comments->url($comments->lastPage()) }}">{{ $comments->lastPage() }}</a></li>
              @endif

              {{-- Next Page Link --}}
              @if ($comments->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $comments->nextPageUrl() }}">&raquo;</a></li>
              @else
                <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
              @endif
            </ul>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>
@endsection

<script>
  function confirmDelete(commentId) {
    return confirm('Apakah kamu yakin ingin menghapus komentar ini?');
}
</script>
