@foreach ($posts as $post)
<div class="modal fade" id="editModal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel-{{ $post->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel-{{ $post->id }}">Edit Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="title-{{ $post->id }}">Title</label>
          <input type="text" class="form-control" id="title-{{ $post->id }}" name="title" value="{{ old('title', $post->title) }}" required>
        </div>
        <div class="form-group">
          <label for="description-{{ $post->id }}">Description</label>
          <textarea class="form-control" id="description-{{ $post->id }}" name="description" rows="3" required>{{ old('description', $post->description) }}</textarea>
        </div>
        <div class="form-group">
          <label for="image-{{ $post->id }}">Image</label>
          <input type="file" class="form-control-file" id="image-{{ $post->id }}" name="image" accept="image/*">
          @if($post->image)
          <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" height="80" class="mt-2">
          @endif
        </div>
        <div class="form-group">
          <label for="category_id-{{ $post->id }}">Category</label>
          <select class="form-control" id="category_id-{{ $post->id }}" name="category_id" required>
            @foreach(\App\Models\Category::all() as $category)
              <option value="{{ $category->id }}" {{ $post->categories->contains($category->id) ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="tags-{{ $post->id }}">Tags (comma separated)</label>
          <input type="text" class="form-control" id="tags-{{ $post->id }}" name="tags" value="{{ old('tags', $post->tags->pluck('name')->implode(', ')) }}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update Post</button>
      </div>
    </form>
  </div>
</div>
@endforeach
