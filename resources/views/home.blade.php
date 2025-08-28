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
        {{ session('success') }}    Welcome, {{ Auth::user()->name ?? '' }}!
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
     <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel my-5">
  <div class="carousel-inner">
    @foreach($sliders as $key => $slider)
      @php
        $video = $slider->video;
      @endphp
      <div class="carousel-item @if($key == 0) active @endif"
           style="background-image: url('{{ asset('images/' . $video->picture) }}'); background-size: cover; background-position: center;">
        <div class="sv-caption">
          <div class="sv-kicker text-uppercase">{{ $video->category?->name ?? 'No Category' }}</div>
          <h1 class="sv-title">{{ $video->title }}</h1>
          <div class="sv-meta mb-3">
            <i class="fa fa-star text-warning me-1"></i> {{ $video->rating }}
            <span class="mx-2">•</span> {{ $video->production_year }}
            <span class="mx-2">•</span> {{ $video->duration }}
            <span class="mx-2">•</span> <span class="badge">TV-MA</span>
          </div>
          <p class="text-white-50 mb-4">{{ $video->description }}</p>
          <div class="d-flex gap-2">
            <a href="{{ route('video.show', $video->id) }}" class="sv-btn-primary">
              <i class="fa-solid fa-play"></i> Play Now
            </a>
       <form action="{{ route('favorite.add', $video->id) }}" method="POST" class="d-flex justify-content-center mt-2">
    @csrf
    <input type="hidden" name="video_id" value="{{ $video->id }}">
    <button type="submit" class="btn btn-outline-secondary btn-lg w-100 d-flex align-items-center justify-content-center gap-2">
        <i class="fa-regular fa-bookmark"></i> Watch Later
    </button>
</form>

          </div>
        </div>
      </div>
    @endforeach
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
    <div class="col-md-12">
        <h3 class="mb-4">Trending Movies</h3>

        @if($videos->isEmpty())
            <p class="text-muted">No movies found in this category.</p>
        @else
            <div class="row g-4">
                @foreach ($videos as $video)
                    <div class="col-6 col-md-3">
                        <div class="movie-card">

                            <!-- Poster -->
                            <img src="{{ asset('images/' . $video->picture) }}"
                                 alt="{{ $video->title }}"
                                 class="movie-poster mb-3">

                            <!-- Overlay -->
                            <div class="movie-overlay">
                                <div class="movie-title">{{ $video->title }}</div>
                                <div class="movie-info">
                                    Price: ${{ $video->price }} <br>
                                    Distribution: {{ $video->distribution }} <br>
                                    Category: {{ optional($video->category)->name ?? 'No category' }}
                                </div>

                                <div class="d-flex flex-column gap-2 mt-2">
                                    <!-- Play Button -->
                                    <a href="{{ route('video.show', $video->id) }}" class="btn btn-primary w-100">
                                        ▶ Play Now
                                    </a>

                                    <!-- Watch Later Form -->
                                    <form action="{{ route('favorite.add', $video->id) }}" method="POST" class="w-100">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-warning w-100">
                                            + Watch Later
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif
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
