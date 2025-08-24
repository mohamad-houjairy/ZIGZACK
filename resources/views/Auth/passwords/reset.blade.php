@extends('share')

@section('content')

<style>
  .auth-bg {
    background-color: #0b0c2a;
  }
  .auth-box {
    background: #14163d;
    padding: 30px;
    border-radius: 12px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0px 0px 20px rgba(0,0,0,0.6);
    color: #fff;
    font-family: Arial, sans-serif;
  }
  .auth-box h3 {
    text-align: center;
    margin-bottom: 15px;
  }
  .auth-box p {
    font-size: 14px;
    text-align: center;
    margin-bottom: 20px;
    color: #ccc;
  }
  .btn-custom {
    background-color: #ff0077;
    border: none;
    width: 100%;
  }
  .btn-custom:hover {
    background-color: #d60063;
  }
  .form-control.bg-dark {
    background-color: #1f1f3d;
    color: #fff;
    border: 1px solid #444;
  }
  .invalid-feedback {
    color: #ff7777;
  }
  a { color: #ff0077; text-decoration: none; }
  a:hover { text-decoration: underline; }
</style>

<div class="auth-bg min-vh-100 d-flex align-items-center justify-content-center py-5">
  <div class="auth-box">
    <h3>Reset Password</h3>
    <p>Set a new password for your account.</p>

    <form method="POST" action="{{ route('password.update') }}">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">

      <!-- Email -->
      <div class="mb-3">
        <label>Email Address</label>
        <input type="email"
               name="email"
               value="{{ $email ?? old('email') }}"
               class="form-control bg-dark @error('email') is-invalid @enderror"
               required
               autofocus>
        @error('email')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label>New Password</label>
        <input type="password"
               name="password"
               class="form-control bg-dark @error('password') is-invalid @enderror"
               required>
        @error('password')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <!-- Confirm Password -->
      <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password"
               name="password_confirmation"
               class="form-control bg-dark"
               required>
      </div>

      <!-- Submit -->
      <div class="d-grid">
        <button type="submit" class="btn btn-custom">Reset Password</button>
      </div>
    </form>

    <p class="mt-3 text-center">
      <a href="{{ route('login') }}">Back to Login</a>
    </p>
  </div>
</div>

@endsection
