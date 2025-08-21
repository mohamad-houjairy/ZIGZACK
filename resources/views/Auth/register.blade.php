@extends('share')
@section('content')

<style>
  body {
    background: #0d0d2b;
    min-height: 100vh;
  }
  .auth-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 90vh;
  }
  .auth-box {
    background: #14163d;
    padding: 30px;
    border-radius: 12px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0px 0px 20px rgba(0,0,0,0.6);
  }
  .auth-box h3 {
    text-align: center;
    margin-bottom: 20px;
  }
  .btn-custom {
    background-color: #ff0077;
    border: none;
    width: 100%;
  }
  .btn-custom:hover {
    background-color: #d60063;
  }
  a {
    color: #ff0077;
    text-decoration: none;
  }
  a:hover {
    text-decoration: underline;
  }
</style>

<div class="auth-container">
  <div class="auth-box">
    <h3>Sign Up</h3>
        {{-- Success / Error Messages --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('register1') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label>Full Name</label>
        <input type="text" class="form-control bg-dark text-white" name="name" placeholder="Enter your name" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control bg-dark text-white" name="email" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" class="form-control bg-dark text-white" name="password" placeholder="Enter your password" required>
      </div>
      <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" class="form-control bg-dark text-white" name="password_confirmation" placeholder="Confirm your password" required>
      </div>
      <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="user">user</option>
                <option value="content_creator"> content_creator</option>
            </select>
        </div>
      <button type="submit" class="btn btn-custom">Sign Up</button>
    </form>
    <p class="text-center mt-3">Already have an account?
      <a href="{{ route('login') }}">Login</a>
    </p>
  </div>
</div>

@endsection
