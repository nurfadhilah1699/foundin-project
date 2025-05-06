@extends('admin-layouts.main')

@section('title', 'Tags')

@section('header-title', 'Tags')

@section('content')

<section class="content">
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
