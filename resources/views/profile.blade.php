@extends('share')

@section('content')
  <style>
    body {
      background-color: #121212;
      color: #fff;
    }
    .card {
      background: #1e1e1e;
      border: none;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.6);
    }
    .form-control, .form-select {
      background-color: #2c2c2c;
      color: #fff;
      border: 1px solid #444;
    }
    .form-control:focus, .form-select:focus {
      background-color: #2c2c2c;
      color: #fff;
      border-color: #0d6efd;
      box-shadow: none;
    }
    .btn-primary {
      border-radius: 8px;
      padding: 10px;
    }
  </style>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card p-4">
          <h3 class="mb-4 text-center">Edit Profile</h3>
          <form action="/user/update" method="POST">
            <!-- CSRF Token in Laravel -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- If updating -->
            <input type="hidden" name="_method" value="PUT">

            <!-- Name -->
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">New Password (leave blank if unchanged)</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="********">
            </div>

            <!-- Role (only show if admin editing) -->
            @if(auth()->user()->role === 'admin')
            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select id="role" name="role" class="form-select">
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                <option value="content_creator" {{ $user->role === 'content_creator' ? 'selected' : '' }}>Content Creator</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
              </select>
            </div>
            @endif

            <!-- Save button -->
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
