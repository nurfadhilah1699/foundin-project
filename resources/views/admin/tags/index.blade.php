@extends('admin-layouts.main')

@section('title', 'Tags')

@section('header-title', 'Tags')

@section('content')

<section class="content">
    <!-- Search -->
    <form action="{{ route('admin.tags.index') }}" method="GET" class="form-inline mb-3">
      <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Search tag...">
      <button type="submit" class="btn btn-primary">Search</button>
      <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary ml-2">Reset</a>
    </form>

    <div class="row">
      <div class="col-md-8">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Tags List</h3>

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
                  <th>Tag</th>
                  <th>Total Content</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tags as $index => $tag)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $tag->name }}</td>
                  <td>{{ $tag->posts_count }} Content</td>
                  <td>
                    <div class="btn-group btn-group-sm">
                      <button type="button" class="btn btn-info btn-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" data-toggle="modal" data-target="#editModal-{{ $tag->id }}">
                        <i class="fas fa-edit"></i>
                      </button>
                      <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" onclick="return confirmDelete({{ $tag->id }})">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              {{-- Previous Page Link --}}
              @if ($tags->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
              @else
                <li class="page-item"><a class="page-link" href="{{ $tags->previousPageUrl() }}">&laquo;</a></li>
              @endif
              
              {{-- Pagination Elements --}}
              @php
                $start = max($tags->currentPage() - 2, 1);
                $end = min($tags->currentPage() + 2, $tags->lastPage());
              @endphp

              @if($start > 1)
                <li class="page-item"><a class="page-link" href="{{ $tags->url(1) }}">1</a></li>
                @if($start > 2)
                  <li class="page-item">...</li>
                @endif
              @endif
                
              @for ($page = $start; $page <= $end; $page++)
                @if ($page == $tags->currentPage())
                    <li class="page-item"><a class="page-link" href="{{ $tags->url($page) }}" class="active">{{ $page }}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $tags->url($page) }}">{{ $page }}</a></li>
                    @endif
              @endfor
              
              @if($end < $tags->lastPage())
                @if($end < $tags->lastPage() - 1)
                  <li class="page-item">...</li>
                @endif
                  <li class="page-item"><a class="page-link" href="{{ $tags->url($tags->lastPage()) }}">{{ $tags->lastPage() }}</a></li>
              @endif

              {{-- Next Page Link --}}
              @if ($tags->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $tags->nextPageUrl() }}">&raquo;</a></li>
              @else
                <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
              @endif
            </ul>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      
      <div class="col-md-4">
        @include('admin.tags.add')
      </div>
    </div>
  </section>
@endsection

@section('modals')
  @foreach ($tags as $tag)
    @include('admin.tags.edit')
  @endforeach
@endsection

<script>
  function confirmDelete(tagId) {
    return confirm('Apakah kamu yakin ingin menghapus tag ini?');
  }
</script>
