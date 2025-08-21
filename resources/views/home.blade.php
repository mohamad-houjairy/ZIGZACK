@extends('share')
@section('content')

  <!-- ======= HERO / MOVIE SLIDER ======= -->
  <div id="svHero" class="carousel slide sv-hero" data-bs-ride="carousel" data-bs-interval="6000">

    <div class="carousel-indicators">
      <button type="button" data-bs-target="#svHero" data-bs-slide-to="0" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#svHero" data-bs-slide-to="1"></button>
    </div>

    <div class="carousel-inner">
<div class="" style="z-index: 10;">
    {{-- Success message --}}
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show fixed-top m-3" role="alert" style="z-index: 1055;">
        {{ session('success') }}    Welcome, {{ Auth::user()->name }}!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
       <script>
        setTimeout(function() {
            const alert = document.querySelector('.alert');
            if(alert){
                alert.classList.remove('show');
                alert.classList.add('hide'); // optional for fade effect
            }
        }, 1500); // 1000 ms = 1 second
    </script>
@endif



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
            <a href="{{ route('video-index') }}" class="sv-btn-primary"><i class="fa-solid fa-play"></i> Play Now</a>
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
    <button class=" carousel-control-next" type="button" data-bs-target="#svHero" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<!-- Section -->
  <div class="container my-5">
    <h3 class="mb-4">Trending Movies 🔥</h3>
      <div class="row g-4">
                @foreach ($videos as $video)
                    <div class="col-md-3">
                        <div class="movie-card">
                            <img src="{{$video->video_url}}" >
                            <div class="movie-overlay">
                                <div class="movie-title">{{ $video->title }}</div>
                                <div class="movie-info">
                                    price: {{ $video->price }} . distribution: {{ $video->distribution }} <br>
                                    category: {{ optional($video->category)->name ?? 'No category' }}
                                </div>
                                <button onclick="window.location='{{ route('video.show', $video->id) }}'" class="btn btn-primary btn-custom">▶ Play Now</button>
                                <button class="btn btn-outline-light btn-custom">+ Watch Later</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
  </div>
   <div class="container my-5">
    <h3 class="mb-4"> New Releases</h3>
     <div class="row g-4">
                @foreach ($videos1 as $video)
                    <div class="col-md-3">
                        <div class="movie-card">
                            <img src="{{$video->video_url}}" >
                            <div class="movie-overlay">
                                <div class="movie-title">{{ $video->title }}</div>
                                <div class="movie-info">
                                    price: {{ $video->price }} . distribution: {{ $video->distribution }} <br>
                                    category: {{ optional($video->category)->name ?? 'No category' }}
                                </div>
                                <button onclick="window.location='{{ route('video.show', $video->id) }}'" class="btn btn-primary btn-custom">▶ Play Now</button>
      <form action="{{ route('favorite.add' , $video->id) }}" method="POST">
    @csrf
    <input type="hidden" name="video_id" value="{{ $video->id }}">
         <button  class="btn btn-outline-light btn-custom">+ Watch Later</button>
</form>
                            </div>
                        </div>
                    </div>
                @endforeach
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
