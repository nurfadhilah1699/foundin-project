@extends('admin-layouts.main')

@section('title', 'Categories')

@section('header-title', 'Categories')

@section('content')
<section class="content">
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
