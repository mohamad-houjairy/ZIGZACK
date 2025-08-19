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
      <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Actor" class="profile-img mb-3">
      <div class="social-icons">
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-google"></i></a>
        <a href="#"><i class="bi bi-twitter"></i></a>
        <a href="#"><i class="bi bi-linkedin"></i></a>
        <a href="#"><i class="bi bi-pinterest"></i></a>
      </div>

      <div class="personal-info mt-4">
        <p><span>Known for</span> Acting</p>
        <p><span>Gender</span> Female</p>
        <p><span>Birthday</span> June 15, 1995</p>
        <p><span>Place of Birth</span> Japan</p>
        <p><span>Also Known As</span> Jhon Witch</p>
      </div>
    </div>

    <!-- Biography & Movies -->
    <div class="col-md-9">
      <h3>David Horovitch</h3>
      <p>
        Amet luctus venenatis lectus magna fringilla urna porttitor. Massa sed elementum tempus egestas.
        Sit amet volutpat consequat mauris nunc. Imperdiet sed euismod nisi porta lorem.
        <span id="dots">...</span><span id="more" style="display: none;"> Pellentesque elit eget gravida cum.
        Arou euismod quis viverra nibh cras pulvinar mattis nunc. Sed elementum tempus egestas sed sed risus pretium quam vulputate.</span>
        <button onclick="toggleReadMore()" class="btn btn-link text-decoration-none p-0">Show More</button>
      </p>

      <h5 class="mt-4">Known for</h5>
      <div class="d-flex flex-wrap">
        <div class="movie-card me-3 mb-3">
          <img src="https://m.media-amazon.com/images/I/71niXI3lxlL._AC_SY679_.jpg" width="120" alt="Day Dreamers">
          <p class="mt-2">Day Dreamers</p>
        </div>
        <div class="movie-card me-3 mb-3">
          <img src="https://m.media-amazon.com/images/I/81niIXK1c+L._AC_SY679_.jpg" width="120" alt="True Blood">
          <p class="mt-2">True Blood</p>
        </div>
        <div class="movie-card me-3 mb-3">
          <img src="https://m.media-amazon.com/images/I/71nHhaZ-V6L._AC_SY679_.jpg" width="120" alt="Family of Five">
          <p class="mt-2">Family of Five</p>
        </div>
        <div class="movie-card me-3 mb-3">
          <img src="https://m.media-amazon.com/images/I/71Zz2efCq8L._AC_SY679_.jpg" width="120" alt="The Baker">
          <p class="mt-2">The Baker</p>
        </div>
        <div class="movie-card me-3 mb-3">
          <img src="https://m.media-amazon.com/images/I/81Zz8bQk1CL._AC_SY679_.jpg" width="120" alt="Fireworks">
          <p class="mt-2">Fireworks Wednesday</p>
        </div>
      </div>

      <!-- Category Tabs -->
      <div class="mt-4">
        <span class="badge-custom active">All</span>
        <span class="badge-custom">TV Shows</span>
        <span class="badge-custom">Movies</span>
      </div>

      <!-- Accordion -->
      <div class="accordion mt-3" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
              2022 - The Baker (Editing)
            </button>
          </h2>

        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
              2017 - Killer Design (Editing)
            </button>
          </h2>

        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
              2022 - My Faithful Dog (Costume & Make-Up)
            </button>
          </h2>
        
        </div>
      </div>

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
