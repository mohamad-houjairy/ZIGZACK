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
    @foreach($favorites as $video)
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm h-100 border-0 rounded-3">

                <!-- Poster -->
                <img src="{{ $video->picture ?? asset('images/default.jpg') }}"
                     class="card-img-top rounded-top-3"
                     alt="{{ $video->title }}"
                     style="height: 220px; object-fit: cover;">

                <!-- Card Body -->
                <div class="card-body text-center d-flex flex-column justify-content-between">
                    <h6 class="card-title text-truncate">{{ $video->title }}</h6>
                </div>

                <!-- Card Footer (Buttons) -->
                <div class="card-footer bg-white border-0 d-flex justify-content-between gap-2">
                    <!-- Play -->
                    <a href="{{ route('video.show', $video->id) }}"
                       class="btn btn-primary btn-sm flex-fill">
                        ▶ Play Now
                    </a>

                    <!-- Remove -->
                    <form method="POST"
                          action="{{ route('favorite.destroy', $video->id) }}"
                          onsubmit="return confirm('Are you sure you want to remove this from favorites?');"
                          class="flex-fill">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm w-100">
                            ✖ Remove
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

    </div>
  </div>
</div>

@endsection
