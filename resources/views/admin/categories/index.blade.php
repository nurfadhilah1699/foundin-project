@extends('admin-layouts.main')

@section('title', 'Categories')

@section('header-title', 'Categories')

@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Categories List</h3>

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
                      <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
    </div>
  </section>
@endsection
