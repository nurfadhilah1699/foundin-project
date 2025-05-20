@extends('layouts.main')

@section('hero')
<!-- Page Title -->
<div class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Create Post</h1>
            <p class="mb-0">Tambah Informasi Kursus dan Pelatihan Baru</p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="/">Home</a></li>
          <li class="current">Create Post</li>
        </ol>
      </div>
    </nav>
</div><!-- End Page Title -->

@endsection

@section('content')
<section id="contact" class="contact section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
    <h2>Create Post</h2>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">
    @if (!auth()->check())
      <div class="alert alert-warning">
          You need to be logged in to create a post. Please <a href="{{ route('login') }}">log in</a>.
      </div>
    @endif

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <div class="row gx-lg-0 gy-4">

      <div class="col-lg-12">
          <form action="{{ route('posts.store') }}" method="POST" class="php-email-form" data-aos="fade" data-aos-delay="100" enctype="multipart/form-data" @if (!auth()->check()) style="display:none;" @endif>

              @csrf
              <div class="row gy-4">
                
              <div class="col-md-12">
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-12">
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                  @error('title')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="col-md-12">
                  <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter description" required></textarea>
                  @error('description')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="col-md-12">
                  <label for="categories">Category</label>
                  <select class="form-control" id="categories" name="category_id" required>
                      <option value="">Select a category</option>
                      @foreach(\App\Models\Category::all() as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                  </select>
                  @error('category_id')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="col-md-12">
                  <label for="tags">Tags</label>
                  <input type="text" class="form-control" id="tags" name="tags" placeholder="Add tags separated by commas">
                  @error('tags')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="col-md-12 text-center">
                <div id="form-loading" style="display:none">Loading</div>
                <div id="form-success" style="display:none" class="sent-message">Post created!</div>
                <div id="form-error" style="display:none" class="error-message">Something went wrong!</div>

                <button type="submit">Post</button>
              </div>
          </form>
      </div><!-- End Post Form -->

    </div>

</div>

</section>
<!-- /Post Section -->
@endsection

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('.php-email-form');

    if (form) {
      form.addEventListener('submit', function () {
        document.getElementById('form-loading').style.display = 'block';
        document.getElementById('form-success').style.display = 'none';
        document.getElementById('form-error').style.display = 'none';
      });
    }
  });
</script>
@endpush

