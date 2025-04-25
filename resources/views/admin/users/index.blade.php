@extends('admin-layouts.main')

@section('title', 'Users')

@section('header-title', 'Users')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Users List</h3>

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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Verification</th>
                  <th>User Type</th>
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
                      <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </div>
                  </td>
                <tr>
                @endforeach
              </tbody>
            </table>
            @if($users->isEmpty())
                <p>No users found.</p>
            @endif
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>
@endsection