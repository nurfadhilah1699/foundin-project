@extends('admin-layouts.main')

@section('title', 'Post Contents')

@section('header-title', 'Post Contents')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Post Contents List</h3>

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
                  <td><img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" height="50"></td>
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
                      <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>
@endsection