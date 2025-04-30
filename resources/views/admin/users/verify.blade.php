<div class="card card-info collapsed-card">
    <div class="card-header">
      <h3 class="card-title">Verification Email</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-plus"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      <form action="{{ route('admin.users.verifyEmail') }}" method="POST" id="quickForm">
        @csrf
        <div class="form-group">
          <label for="verifyEmail">Email address</label>
          <input type="email" class="form-control" id="verifyEmail" name="email" placeholder="Enter email">
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-info">Verify</button>
        </div>
      </form>
    </div>
</div>