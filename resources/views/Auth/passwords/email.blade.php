@extends('share')

@section('content')

<style>
  .auth-bg {
    background-color: #0b0c2a; /* optional, keeps dark bg on this section */
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
  a { color: #ff0077; text-decoration: none; }
  a:hover { text-decoration: underline; }
</style>

<!-- Full-viewport flex wrapper to center the box -->
<div class="auth-bg min-vh-100 d-flex align-items-center justify-content-center py-5">
  <div class="auth-box">
    <h3>Forgot Password</h3>
    <p>Enter your email and we’ll send you a reset link.</p>

    <!-- Display success message -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control bg-dark text-white @error('email') is-invalid @enderror" placeholder="Enter your email" value="{{ old('email') }}" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <button type="submit" class="btn btn-custom">Send Reset Link</button>
    </form>

    <p class="mt-3 text-center">
      <a href="{{ route('login') }}">Back to Login</a>
    </p>
  </div>
</div>

@endsection
