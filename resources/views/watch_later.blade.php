@extends('share')
@section('content')

<style>
  .watchlater-bg {
    background-color: #0b0c2a;
    min-height: 100vh;
    padding: 50px 0;
    color: #fff;
    font-family: Arial, sans-serif;
  }
  .watchlater-box {
    background: #14163d;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 0px 20px rgba(0,0,0,0.6);
  }
  .movie-card {
    background: #1c1e4d;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease;
    box-shadow: 0px 5px 15px rgba(0,0,0,0.5);
  }
  .movie-card:hover {
    transform: translateY(-8px);
  }
  .movie-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
  }
  .movie-info {
    padding: 10px;
    text-align: center;
  }
  .movie-info h6 {
    font-size: 16px;
    margin-bottom: 8px;
  }
  .btn-remove {
    background-color: #ff0077;
    border: none;
    font-size: 14px;
    padding: 5px 15px;
    border-radius: 6px;
    transition: 0.3s;
  }
  .btn-remove:hover {
    background-color: #d60063;
  }
</style>

<div class="watchlater-bg">
  <div class="container">
    <div class="watchlater-box">
      <h3 class="text-center mb-4">📺 Watch Later</h3>

      <div class="row g-4">
        <!-- Example movie card -->
        <div class="col-md-3 col-sm-6">
          <div class="movie-card">
            <img src="https://image.tmdb.org/t/p/w500/8uO0gUM8aNqYLs1OsTBQiXu0fEv.jpg" alt="Movie Poster">
            <div class="movie-info">
              <h6>Inception</h6>
              <form method="POST" action="#">
                @csrf
                <button type="submit" class="btn btn-remove">Remove</button>
              </form>
            </div>
          </div>
        </div>

        <!-- Repeat dynamically for each saved movie -->

          <div class="col-md-3 col-sm-6">
            <div class="movie-card">
              <img src="" alt="Movie Poster">
              <div class="movie-info">
                <h6>title</h6>
                <form method="POST" action="">
                  @csrf
                  <button type="submit" class="btn btn-remove">Remove</button>
                </form>
              </div>
            </div>
          </div>


      </div>
    </div>
  </div>
</div>

@endsection
