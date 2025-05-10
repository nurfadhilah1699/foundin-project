@extends('admin-layouts.main')

@section('title', 'Post Content')

@section('header-title', 'Post Content')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <div class="card-title">
              <h5>Post Content List</h5>
            </div>

            <div class="card-tools">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addPost">
                + Post Content
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Author</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $index => $post)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $post->user ? $post->user->name : 'Unknown' }}</td>
                  <td>
                    @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" height="50">
                    @else
                    <i>No image available</i>
                    @endif
                  </td>
                  <td>{{ $post->title}}</td>
                  <td>{{ $post->description}}</td>
                  <td>@forelse ($post->categories as $category)
                        {{ $category->name }}
                      @empty
                        No category
                      @endforelse
                  </td>
                  <td>
                    <div class="btn-group btn-group-sm">
                      <button type="button" class="btn btn-info btn-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" data-toggle="modal" data-target="#editModal-{{ $post->id }}">
                        <i class="fas fa-edit"></i>
                      </button>
                      <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirmDelete({{ $post->id }})">
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
            @if($posts->isEmpty())
                <p>No posts found.</p>
            @endif
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              {{-- Previous Page Link --}}
              @if ($posts->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
              @else
                <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}">&laquo;</a></li>
              @endif
              
              {{-- Pagination Elements --}}
              @php
                $start = max($posts->currentPage() - 2, 1);
                $end = min($posts->currentPage() + 2, $posts->lastPage());
              @endphp

              @if($start > 1)
                <li class="page-item"><a class="page-link" href="{{ $posts->url(1) }}">1</a></li>
                @if($start > 2)
                  <li class="page-item">...</li>
                @endif
              @endif
                
              @for ($page = $start; $page <= $end; $page++)
                @if ($page == $posts->currentPage())
                  <li class="page-item"><a class="page-link" href="{{ $posts->url($page) }}" class="active">{{ $page }}</a></li>
                @else
                  <li class="page-item"><a class="page-link" href="{{ $posts->url($page) }}">{{ $page }}</a></li>
                @endif
              @endfor
              
              @if($end < $posts->lastPage())
                @if($end < $posts->lastPage() - 1)
                  <li class="page-item">...</li>
                @endif
                  <li class="page-item"><a class="page-link" href="{{ $posts->url($posts->lastPage()) }}">{{ $posts->lastPage() }}</a></li>
              @endif

              {{-- Next Page Link --}}
              @if ($posts->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}">&raquo;</a></li>
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
  
@section('modals')    
  @include('admin.posts.add')
  @include('admin.posts.edit')
@endsection
<script>
  function confirmDelete(postId) {
    return confirm('Apakah kamu yakin ingin menghapus konten ini?');
}
</script>
