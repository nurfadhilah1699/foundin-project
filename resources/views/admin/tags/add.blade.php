<div class="card card-info collapsed-card">
    <div class="card-header">
      <h3 class="card-title">Add Tag</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-plus"></i>
        </button>
      </div>
    </div>
    
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      <form action="{{ route('admin.tags.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Tag Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter tag name">
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-info">Add</button>
        </div>
      </form>
    </div>
</div>