<div class="card card-info collapsed-card">
    <div class="card-header">
      <h3 class="card-title">Add User</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-plus"></i>
        </button>
      </div>
    </div>
    
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="role">Role</label>
          <select class="form-control select2" style="width: 100%;" name="role" id="role" name="role">
            <option value="user" selected="selected">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-info">Add</button>
        </div>
      </form>
    </div>
</div>