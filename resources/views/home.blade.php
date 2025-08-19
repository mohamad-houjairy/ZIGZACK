@extends('share')
@section('content')
  <!-- ======= HERO / MOVIE SLIDER ======= -->
  <div id="svHero" class="carousel slide sv-hero" data-bs-ride="carousel" data-bs-interval="6000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#svHero" data-bs-slide-to="0" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#svHero" data-bs-slide-to="1"></button>
    </div>

    <div class="carousel-inner">

      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image:url('https://image.tmdb.org/t/p/original/vZloFAK7NmvMGKE7VkF5UHaz0I.jpg');">
        <div class="sv-caption">
          <div class="sv-kicker text-uppercase">Action, Crime, Thriller</div>
          <h1 class="sv-title">John Wick 4</h1>
          <div class="sv-meta mb-3">
            <i class="fa fa-star text-warning me-1"></i> 8.2
            <span class="mx-2">•</span> 2023
            <span class="mx-2">•</span> 170 mins
            <span class="mx-2">•</span> <span class="badge">TV-MA</span>
          </div>
          <p class="text-white-50 mb-4">Enjoy exclusive Amazon Originals as well as popular movies and TV shows for USD 12.0/month. Watch now, cancel anytime.</p>
          <div class="d-flex gap-2">
            <a href="{{ route('video_info') }}" class="sv-btn-primary"><i class="fa-solid fa-play"></i> Play Now</a>
            <a href="#" class="sv-btn-ghost"><i class="fa-regular fa-bookmark"></i> Watch Later</a>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item" style="background-image:url('https://image.tmdb.org/t/p/original/t6HIqrRAclMCA60NsSmeqe9RmNV.jpg');">
        <div class="sv-caption">
          <div class="sv-kicker text-uppercase">Sci-Fi, Adventure</div>
          <h1 class="sv-title">Avatar: The Way of Water</h1>
          <div class="sv-meta mb-3">
            <i class="fa fa-star text-warning me-1"></i> 7.8
            <span class="mx-2">•</span> 2022
            <span class="mx-2">•</span> 190 mins
            <span class="mx-2">•</span> <span class="badge">PG-13</span>
          </div>
          <p class="text-white-50 mb-4">Return to Pandora and dive into an ocean of adventure. Watch in UHD and immerse yourself in the world of the Metkayina clan.</p>
          <div class="d-flex gap-2">
            <a href="#" class="sv-btn-primary"><i class="fa-solid fa-play"></i> Play Now</a>
            <a href="#" class="sv-btn-ghost"><i class="fa-regular fa-bookmark"></i> Watch Later</a>
          </div>
        </div>
      </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#svHero" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#svHero" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<!-- Section -->
  <div class="container my-5">
    <h3 class="mb-4">Trending Movies 🔥</h3>
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
   <div class="container my-5">
    <h3 class="mb-4"> New Releases</h3>
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
  @include('home2')
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Navbar Scroll Hide/Show -->
  <script>
    let lastScrollTop = 0;
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function () {
      let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      if (scrollTop > lastScrollTop) {
        navbar.style.top = "-80px"; // hide
      } else {
        navbar.style.top = "0"; // show
      }
      lastScrollTop = scrollTop;
    });
  </script>
@endsection
