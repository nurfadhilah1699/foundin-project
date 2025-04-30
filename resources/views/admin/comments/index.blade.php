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
