@extends('admin-layouts.main')

@section('title', 'Categories')

@section('header-title', 'Categories')

@section('content')
<section class="content">
    <!-- Search -->
    <form action="{{ route('admin.categories.index') }}" method="GET" class="form-inline mb-3">
      <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Search category...">
      <button type="submit" class="btn btn-primary">Search</button>
      <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary ml-2">Reset</a>
    </form>

    <div class="row">
      <div class="col-md-8">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Categories List</h3>
          </div>
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Total Content</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $index => $category)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->posts_count }} Content</td>
                  <td>
                    <div class="btn-group btn-group-sm">
                      <button type="button" class="btn btn-info btn-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" data-toggle="modal" data-target="#editModal-{{ $category->id }}">
                        <i class="fas fa-edit"></i>
                      </button>
                      <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onclick="return confirmDelete({{ $category->id }})">
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
            @if($categories->isEmpty())
                <p>No categories found.</p>
            @endif
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              {{-- Previous Page Link --}}
              @if ($categories->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
              @else
                <li class="page-item"><a class="page-link" href="{{ $categories->previousPageUrl() }}">&laquo;</a></li>
              @endif
              
              {{-- Pagination Elements --}}
              @php
                $start = max($categories->currentPage() - 2, 1);
                $end = min($categories->currentPage() + 2, $categories->lastPage());
              @endphp

              @if($start > 1)
                <li class="page-item"><a class="page-link" href="{{ $categories->url(1) }}">1</a></li>
                @if($start > 2)
                  <li class="page-item">...</li>
                @endif
              @endif
                
              @for ($page = $start; $page <= $end; $page++)
                @if ($page == $categories->currentPage())
                  <li class="page-item"><a class="page-link" href="{{ $categories->url($page) }}" class="active">{{ $page }}</a></li>
                @else
                  <li class="page-item"><a class="page-link" href="{{ $categories->url($page) }}">{{ $page }}</a></li>
                @endif
              @endfor
              
              @if($end < $categories->lastPage())
                @if($end < $categories->lastPage() - 1)
                  <li class="page-item">...</li>
                @endif
                  <li class="page-item"><a class="page-link" href="{{ $categories->url($categories->lastPage()) }}">{{ $categories->lastPage() }}</a></li>
              @endif

              {{-- Next Page Link --}}
              @if ($categories->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $categories->nextPageUrl() }}">&raquo;</a></li>
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
        @include('admin.categories.add')
      </div>
    </div>

  </section>
@endsection
  
@section('modals')    
  @foreach ($categories as $category)
    @include('admin.categories.edit')
  @endforeach
@endsection

<script>
  function confirmDelete(userId) {
    return confirm('Apakah kamu yakin ingin menghapus user ini?');
  }
</script>
