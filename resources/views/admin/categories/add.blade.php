<div class="card card-info collapsed-card">
    <div class="card-header">
      <h3 class="card-title">Add Category</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-plus"></i>
        </button>
      </div>
    </div>
    
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Category Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name">
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-info">Add</button>
        </div>
      </form>
    </div>
</div>