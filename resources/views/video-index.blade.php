@extends('share')

@section('content')
  <div class="container my-5">
    <h1 class="mb-4">ALL MOVIE</h1>
    <div class="row g-4">

      <!-- Movie Card -->
      <div class="col-md-3">
        <div class="movie-card">
          <img src="https://m.media-amazon.com/images/I/71rNJQ2g-EL._AC_SY679_.jpg" alt="John Wick 4">
          <div class="movie-overlay">
            <div class="movie-title">John Wick 4</div>
            <div class="movie-info">2023 · 170 mins · Action</div>
            <button class="btn btn-primary btn-custom">▶ Play Now</button>
            <button class="btn btn-outline-light btn-custom">+ Watch Later</button>
          </div>
        </div>
      </div>

      <!-- Movie Card -->
      <div class="col-md-3">
        <div class="movie-card">
          <img src="https://m.media-amazon.com/images/I/81Uwb5p9eNL._AC_SY679_.jpg" alt="Spider Man Memo">
          <div class="movie-overlay">
            <div class="movie-title">Spider Man: Across the Spider-Verse</div>
            <div class="movie-info">2022 · 145 mins · Animation</div>
            <button class="btn btn-primary btn-custom">▶ Play Now</button>
            <button class="btn btn-outline-light btn-custom">+ Watch Later</button>
          </div>
        </div>
      </div>

      <!-- Movie Card -->
      <div class="col-md-3">
        <div class="movie-card">
          <img src="https://m.media-amazon.com/images/I/91TqW74Hn6L._AC_SY679_.jpg" alt="The White House">
          <div class="movie-overlay">
            <div class="movie-title">White House Down</div>
            <div class="movie-info">2013 · 131 mins · Thriller</div>
            <button class="btn btn-primary btn-custom">▶ Play Now</button>
            <button class="btn btn-outline-light btn-custom">+ Watch Later</button>
          </div>
        </div>
      </div>

      <!-- Movie Card -->
      <div class="col-md-3">
        <div class="movie-card">
          <img src="https://m.media-amazon.com/images/I/81uV+UeZr6L._AC_SY679_.jpg" alt="The Post">
          <div class="movie-overlay">
            <div class="movie-title">The Post</div>
            <div class="movie-info">2017 · 116 mins · Drama</div>
            <button class="btn btn-primary btn-custom">▶ Play Now</button>
            <button class="btn btn-outline-light btn-custom">+ Watch Later</button>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
