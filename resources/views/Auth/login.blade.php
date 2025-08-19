@extends('share')
@section('content')

<style>
  body {
    background-color: #0b0c2a; /* optional dark background */
  }
  .auth-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; /* full viewport height */
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
    <h3>Login</h3>
    <form>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control bg-dark text-white" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" class="form-control bg-dark text-white" placeholder="Enter your password" required>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember Me</label>
      </div>
      <button type="submit" class="btn btn-custom">Login</button>
    </form>
    <p class="text-center mt-3">
      Don’t have an account? <a href="{{ route('register') }}">Sign Up</a><br>
      <a href="{{ route('reset-password') }}">Forgot Password?</a>
    </p>
  </div>
</div>

@endsection
