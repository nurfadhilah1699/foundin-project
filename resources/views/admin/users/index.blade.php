@extends('admin-layouts.main')

@section('title', 'Users')

@section('header-title', 'Users')

@section('content')
  <section class="content">
    <div class="row">
      <!-- List Users -->
      <div class="col-md-8">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Users List</h3>
          </div>
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Verification</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $index => $user)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  @if ($user->email_verified_at == null)
                    <td><i class="fas fa-times text-danger"></i></td> 
                    @else
                    <td><i class="fas fa-check text-success"></i></td>   
                  @endif
                  @if ($user->role == 'user')
                    <td class="text-olive">{{ ucfirst($user->role) }}</td> 
                    @else
                    <td class="text-info">{{ ucfirst($user->role) }}</td>   
                  @endif
                  <td>
                    <div class="btn-group btn-group-sm">
                      <button type="button" class="btn btn-info btn-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" data-toggle="modal" data-target="#editModal-{{ $user->id }}">
                        <i class="fas fa-edit"></i>
                      </button>
                      <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" onclick="confirmDelete({{ $user->id }})">
                          <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    </div>
                  </td>
                <tr>
                @endforeach
              </tbody>
            </table>

            @if($users->isEmpty())
                <p class="p-3">No users found.</p>
            @endif

            <div class="p-3">
              {{ $users->links() }}
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <!-- Add User -->
      <div class="col-md-4">
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

        <!-- Verify Email -->
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
      </div>
    </div>

    <!-- Modal Edit User -->
    @foreach ($users as $user)
      @include('admin.users.edit', ['user' => $user])
    @endforeach
  </section>
@endsection

<script>
  function confirmDelete(userId) {
      // Tampilkan alert konfirmasi
      if (confirm('Apakah kamu yakin ingin menghapus user ini?')) {
          // Jika ya, kirimkan form untuk menghapus data
          document.getElementById('delete-form-' + userId).submit();
      }
  }
</script>