@extends('admin-layouts.main')

@section('title', 'Tags')

@section('header-title', 'Tags')

@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-6">
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
                      <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </div>
                  </td>
                <tr>
                @endforeach
              </tbody>
            </table>
            @if($tags->isEmpty())
                <p>No tags found.</p>
            @endif
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>
@endsection
