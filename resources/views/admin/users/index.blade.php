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
                      <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onclick="return confirmDelete({{ $user->id }})">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
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
        @include('admin.users.add')

        <!-- Verify Email -->
        @include('admin.users.verify')
      </div>
    </div>
  </section>
@endsection

@section('modals')
    <!-- Modal Edit User -->
    @foreach ($users as $user)
      @include('admin.users.edit', ['user' => $user])
    @endforeach
@endsection

<script>
  function confirmDelete(userId) {
    return confirm('Apakah kamu yakin ingin menghapus user ini?');
}
</script>