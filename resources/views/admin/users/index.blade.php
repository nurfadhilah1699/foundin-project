@extends('admin-layouts.main')

@section('title', 'Users')

@section('header-title', 'Users')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <!-- Search -->
        <form action="{{ route('admin.users.index') }}" method="GET" class="form-inline mb-3">
          <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Search user...">
          <button type="submit" class="btn btn-primary">Search</button>
          <a href="{{ route('admin.users.index') }}" class="btn btn-secondary ml-2">Reset</a>
        </form>
      </div>
    </div>

    <div class="row">
      <!-- List Users -->
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Users List</h3>
          </div>
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Profile Picture</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Bio</th>
                  <th>Verification</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $index => $user)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>
                    @if($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->title }}" height="50">
                    @else
                    <i>No image available</i>
                    @endif
                  </td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->bio }}</td>
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
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              {{-- Previous Page Link --}}
              @if ($users->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
              @else
                <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">&laquo;</a></li>
              @endif
              
              {{-- Pagination Elements --}}
              @php
                $start = max($users->currentPage() - 2, 1);
                $end = min($users->currentPage() + 2, $users->lastPage());
              @endphp

              @if($start > 1)
                <li class="page-item"><a class="page-link" href="{{ $users->url(1) }}">1</a></li>
                @if($start > 2)
                  <li class="page-item">...</li>
                @endif
              @endif
                
              @for ($page = $start; $page <= $end; $page++)
                @if ($page == $users->currentPage())
                  <li class="page-item"><a class="page-link" href="{{ $users->url($page) }}" class="active">{{ $page }}</a></li>
                @else
                  <li class="page-item"><a class="page-link" href="{{ $users->url($page) }}">{{ $page }}</a></li>
                @endif
              @endfor
              
              @if($end < $users->lastPage())
                @if($end < $users->lastPage() - 1)
                  <li class="page-item">...</li>
                @endif
                  <li class="page-item"><a class="page-link" href="{{ $users->url($users->lastPage()) }}">{{ $users->lastPage() }}</a></li>
              @endif

              {{-- Next Page Link --}}
              @if ($users->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">&raquo;</a></li>
              @else
                <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
              @endif
            </ul>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <!-- Add User -->
        @include('admin.users.add')
      </div>
      <div class="col-md-6">
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