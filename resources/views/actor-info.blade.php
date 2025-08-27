@extends('share')

@section('content')
  <style>
    body {
      background-color: #0b0c2a;
      color: #fff;
      font-family: Arial, sans-serif;
    }
    .profile-img {
      border-radius: 10px;
      width: 100%;
    }
    .social-icons a {
      color: white;
      margin-right: 10px;
      font-size: 18px;
    }
    .movie-card img {
      border-radius: 8px;
      transition: transform 0.3s ease-in-out;
      cursor: pointer;
    }
    .movie-card img:hover {
      transform: scale(1.08);
    }
    .accordion-button {
      background-color: #1c1f4a !important;
      color: #fff !important;
    }
    .accordion-item {
      background-color: #14163d;
      border: none;
    }
    .accordion-body {
      color: #ccc;
    }
    .badge-custom {
      background-color: #2d2f68;
      color: #fff;
      border-radius: 20px;
      padding: 5px 15px;
      margin-right: 5px;
      cursor: pointer;
    }
    .badge-custom.active {
      background-color: #ff0077;
    }
    .personal-info span {
      font-weight: bold;
      display: block;
      color: #999;
    }
    .personal-info p {
      margin-bottom: 12px;
    }
  </style>
<div class="container py-5 my-5">
  <div class="row">
    <!-- Profile Image & Info -->
    <div class="col-md-3">
<img src="{{ asset('images/' . $actor->profile_image) }}" alt="{{ $actor->name }}">







      <div class="personal-info mt-4">
        <p><span>Name</span>{{ $actor->name }}</p>
        <p><span>Birthday</span> {{ $actor->birth_date }}</p>
      </div>
            <div class="social-icons">
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-google"></i></a>
        <a href="#"><i class="bi bi-twitter"></i></a>
        <a href="#"><i class="bi bi-linkedin"></i></a>
        <a href="#"><i class="bi bi-pinterest"></i></a>
      </div>
    </div>

    <!-- Biography & Movies -->
    <div class="col-md-9">
      <h3>{{ $actor->name }}</h3>



      <div class="d-flex flex-wrap">

      <p>
        {{ $actor->bio }}
        <span id="dots">...</span><span id="more" style="display: none;"> Pellentesque elit eget gravida cum.
        Arou euismod quis viverra nibh cras pulvinar mattis nunc. Sed elementum tempus egestas sed sed risus pretium quam vulputate.</span>
        <button onclick="toggleReadMore()" class="btn btn-link text-decoration-none p-0">Show More</button>
      </p>


</div>

      <!-- Category Tabs -->


      <!-- Accordion -->
      <div class="accordion mt-3" id="accordionExample">
<h4 class=" text-center p-2">Movies</h4>

        @foreach ($actor->videos as $video)
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $video->id }}">
              <button onclick="location.href='{{ route('video.show', $video->id) }}'"  class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $video->id }}">
                 {{ $video->title }} - {{ $video->distribution }}
              </button>
          </h2>

        </div>

@endforeach
      </div>


  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function toggleReadMore() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btn = event.target;
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btn.innerHTML = "Show More";
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btn.innerHTML = "Show Less";
      moreText.style.display = "inline";
    }
  }
</script>
@endsection
