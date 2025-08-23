<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Streamvid – Movie Page</title>

  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>

  <style>
    :root{
      --bg:#0b0b1a;
      --card:#12122a;
      --text:#ffffff;
      --muted:#b9b9c7;
      --brand:#7c5cff;   /* purple used for borders/brand */
      --brand-2:#a585ff; /* lighter for gradient */
    }

    body{ background:var(--bg); color:var(--text); }

    /* ======= NAVBAR ======= */
.navbar.sv-navbar {
  background:rgba(0, 0, 0, 0.388) !important;
  backdrop-filter: none !important;
  box-shadow: none !important;
  border: none !important;
}

    .sv-brand{
      display:flex; align-items:center; gap:.6rem;
      font-weight:800; letter-spacing:.2px; text-decoration:none;
      color:#7c5cff;
    }
    .sv-logo{
      width:34px;height:34px; display:grid; place-items:center;
      background: radial-gradient(100% 100% at 30% 20%, var(--brand-2), var(--brand));
      border-radius:10px; color:#fff; font-weight:900;
    }
    .navbar-nav .nav-link{
      color:#fff!important; opacity:.9; font-weight:500; padding:10px 12px;
      font-style: Bold; font-size: 16px; !important

    }
    .navbar-nav .nav-link:hover{ opacity:1;
    color:#7c5cff !important; }
    .dropdown-toggle::after{ margin-left:.35rem; }

    /* show dropdown on hover (desktop) */
    @media (min-width: 992px){
      .dropdown:hover>.dropdown-menu{ display:block; }
    }

    /* dropdown menu styling with colored border */
    .dropdown-menu{
      background: rgba(18,18,42,.96);
      border: 1.5px solid var(--brand);
      border-radius: 14px;
      padding: .35rem;
      min-width: 230px;
      box-shadow: 0 10px 30px rgba(0,0,0,.35), 0 0 0 1px rgba(124,92,255,.15) inset;
    }
    .dropdown-item{
      border-radius: 10px;
      color:#e9e7ff;
      padding:.65rem .85rem;
      font-weight:500;
    }
    .dropdown-item:not(:last-child){
      border-bottom: 1px dashed rgba(124,92,255,.25);
    }
    .dropdown-item:hover{
      background: rgba(124,92,255,.15);
      color:#fff;
    }

    /* search bar */
    .sv-search{
      min-width: 340px;
      border-radius: 999px;
      background: rgba(255,255,255,.08);
      border: 1px solid rgba(255,255,255,.12);
      color:#fff;
      padding-left:42px;
      height:42px;
    }
    .sv-search::placeholder{ color:#cfd0ff; opacity:.65; }
    .sv-search:focus{
      outline:none;
      border-color: var(--brand);
      box-shadow: 0 0 0 .15rem rgba(124,92,255,.25);
      background: rgba(255,255,255,.12);
      color:#fff;
    }
    .sv-search-wrap{ position:relative; }
    .sv-search-wrap .fa-magnifying-glass{
      position:absolute; left:14px; top: 50%; transform: translateY(-50%); opacity:.9;
    }

    .sv-subscribe{
      background: linear-gradient(90deg, var(--brand), var(--brand-2));
      color:#fff; border:none; border-radius:999px; padding:8px 16px; font-weight:700;
    }
    .sv-subscribe:hover{ filter:brightness(1.05); transform: translateY(-1px); }

    /* ======= HERO / SLIDER ======= */
    .sv-hero .carousel-item{
      height: min(100vh, 600px);
      position:relative;
      background-size:cover; background-position:center;
    }
    /* dark gradient overlay from left */
    .sv-hero .carousel-item::after{
      content:""; position:absolute; inset:0;
      background:
        linear-gradient(90deg, rgba(11,11,26,.9) 0%, rgba(11,11,26,.7) 35%, rgba(11,11,26,.25) 60%, rgba(11,11,26,0) 100%);
    }
    .sv-caption{
      position:absolute; z-index:5; left:6vw; bottom: 18vh; max-width: 640px;
    }
    .sv-kicker{
      color:#bfa9ff; font-weight:800; letter-spacing:.8px; font-size:.85rem;
    }
    .sv-title{ font-size: clamp(34px, 5vw, 62px); font-weight:800; margin:.35rem 0 1rem; }
    .sv-meta{ color: var(--muted); font-weight:600; }
    .sv-meta .badge{ background:#2a2844; border:1px solid rgba(255,255,255,.14); }

    /* buttons */
    .sv-btn-primary{
      background: linear-gradient(90deg, var(--brand), var(--brand-2));
      border:none; color:#fff; border-radius:14px; padding:12px 18px; font-weight:800;
      display:inline-flex; align-items:center; gap:.6rem;
      box-shadow: 0 10px 25px rgba(124,92,255,.35);
      transition: transform .18s ease, filter .18s ease;
    }
    .sv-btn-primary:hover{ transform: translateY(-2px); filter:brightness(1.06); }

    .sv-btn-ghost{
      border-radius:14px; padding:12px 16px; font-weight:800;
      background: transparent; color:#fff; border: 1.5px solid rgba(255,255,255,.35);
      display:inline-flex; align-items:center; gap:.55rem;
      transition: all .18s ease;
    }
    .sv-btn-ghost:hover{
      border-color: var(--brand);
      box-shadow: 0 0 0 .15rem rgba(124,92,255,.25);
      transform: translateY(-2px);
    }

    /* carousel controls & indicators */
    .carousel-control-prev-icon,
    .carousel-control-next-icon{ filter: invert(1) grayscale(1); }
    .carousel-control-prev, .carousel-control-next{
      width:9%; opacity:.75;
    }
    .carousel-indicators [data-bs-target]{

      width:36px;
      height:4px;
       border-radius:999px;
        background:#3d3b59;
    }
        .carousel-indicators{
        position: absolute;
    top: 550px;
        }
    .carousel-indicators .active{ background: linear-gradient(90deg, var(--brand), var(--brand-2)); }



    /* spacing under fixed-top header */
     .footer {
      background-color: #0b0f29;
      color: #fff;
      padding: 50px 20px 20px;
      position: relative;
    }
    .footer h6 {
      font-weight: 600;
      margin-bottom: 20px;
    }
    .footer a {
      display: block;
      color: #ddd;
      text-decoration: none;
      margin-bottom: 10px;
      transition: 0.3s;
    }
    .footer a:hover {
      color: #fff;
    }
    .footer .social-icons a {
      font-size: 18px;
      margin-right: 15px;
      color: #fff;
      transition: 0.3s;
    }
    .footer .social-icons a:hover {
      color: #0dcaf0;
    }
    .app-buttons img {
      height: 50px;
      margin-right: 10px;
      margin-top: 15px;
    }
    .footer-bottom {
      border-top: 1px solid #333;
      margin-top: 30px;
      padding-top: 15px;
      font-size: 14px;
      color: #aaa;
      text-align: center;
    }
    .footer-bottom a {
      margin-left: 15px;
      color: #aaa;
    }
    .footer-bottom a:hover {
      color: #fff;
    }
    /* Scroll to top button */
    #scrollTopBtn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #fff;
      color: #000;
      border: none;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      box-shadow: 0 2px 10px rgba(0,0,0,0.3);
      cursor: pointer;
      display: none;
      justify-content: center;
      align-items: center;
      font-size: 18px;
    }
.movie-card {
      position: relative;
      overflow: hidden;
      border-radius: 10px;
      transition: transform 0.3s ease-in-out;
      cursor: pointer;
    }
    .movie-card img {
      width: 100%;
      height: 280px;
      object-fit: cover;
      border-radius: 10px;
    }
    .movie-card:hover {
      transform: scale(1.05);
    }
    .movie-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(11, 11, 29, 0.95);
      color: white;
      opacity: 0;
      transition: opacity 0.4s ease-in-out;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      border-radius: 10px;
    }
    .movie-card:hover .movie-overlay {
      opacity: 1;
    }
    .movie-title {
      font-size: 18px;
      font-weight: bold;
    }
    .movie-info {
      font-size: 14px;
      margin: 5px 0;
    }
    .btn-custom {
      margin-top: 10px;
      font-size: 14px;
      border-radius: 20px;
    }
  </style>
</head>
<body>

  <!-- ======= NAVBAR ======= -->
  <nav class="navbar navbar-expand-lg sv-navbar fixed-top ">
    <div class="container-fluid">
      <a class="sv-brand" href="#">
        <span class="sv-logo">▶</span>
        <span>Streamvid</span>
        <small class="ms-1 opacity-75">TV</small>
      </a>
      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#svNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="svNav">
        <ul class="navbar-nav ms-3 me-auto">
          <!-- Home (simple) -->
          <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
            <a class="nav-link " href="{{ route('video-index') }}" >Movies</a>
            <a class="nav-link " href="{{ route('festival-index') }}" >Festivals</a>
             <a class="nav-link " href="{{ route('favorite') }}" >Favorites</a>
             <a class="nav-link " href="{{ route('actor.index') }}" >Actors</a>
        </ul>
        <!-- Search, locale, user, subscribe -->
        <div class="d-flex align-items-center gap-3">
          <div class="sv-search-wrap d-none d-lg-block">
            <i class="fa-solid fa-magnifying-glass"></i>
          <form action="{{ route('video-search') }}" method="GET" class="d-flex">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="text" name="q" class="form-control sv-search" placeholder="Find movies, TV shows and more">
</form>
          </div>
          <a class="text-white-50 d-none d-lg-inline" href="#" title="Language"><i class="fa-solid fa-globe"></i> EN</a>
          <a class="text-white-50 d-none d-lg-inline" href="{{ route('profile.edit') }}" title="Account"><i class="fa-regular fa-user"></i></a>
<button onclick="location.href='{{ route('plan') }}'" class="sv-subscribe">Subscribe</button>
   @if(Auth::check())
                    {{-- User is logged in --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">
                                Log Out
                            </button>
                        </form>
@if (Auth::user()->role === 'content_creator')
                            {{-- Admin user --}}
                            <a href="{{ route('video.create') }}" class="btn btn-outline-light">Add Movies</a>

@endif
                @else
                    {{-- User is not logged in --}}
                        <a href="{{ route('login') }}" class="btn btn-outline-light">
                            Log In
                        </a>
                @endif
        </div>
      </div>
    </div>
  </nav>
  <div class="sv-spacer"></div>
@yield('content')
<footer class="footer">
    <div class="container">
      <div class="row">
        <!-- Logo + Social -->
        <div class="col-md-3 mb-4">
          <h4 class="fw-bold">
            <i class="fas fa-play-circle text-primary"></i> Streamvid <sup>TV</sup>
          </h4>
          <p class="mt-3">Connect with us</p>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-github"></i></a>
          </div>
          <p class="mt-3">Download Streamvid mobile app</p>
          <div class="app-buttons">
            <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play">
          </div>
        </div>

        <!-- Must Watch Movies -->
        <div class="col-md-2 mb-4">
          <h6>Must Watch Movies</h6>
          <a href="#">DJ Tillu</a>
          <a href="#">The Great Empire</a>
          <a href="#">Love Story</a>
          <a href="#">The Reckless</a>
          <a href="#">Zombie World</a>
        </div>

        <!-- Genres -->
        <div class="col-md-3 mb-4">
          <h6>Genres</h6>
          <div class="row">
            <div class="col-6">
              <a href="#">Romance</a>
              <a href="#">Drama</a>
              <a href="#">Family</a>
              <a href="#">Comedy</a>
              <a href="#">Actions</a>
              <a href="#">Adventure</a>
            </div>
            <div class="col-6">
              <a href="#">Horror</a>
              <a href="#">Anime</a>
              <a href="#">Thriller</a>
              <a href="#">History</a>
              <a href="#">Sci-Fi</a>
            </div>
          </div>
        </div>

        <!-- Help -->
        <div class="col-md-2 mb-4">
          <h6>Help</h6>
          <a href="#">My Account</a>
          <a href="#">Customer Support</a>
          <a href="#">Contact Us</a>
          <a href="#">Advertise</a>
          <a href="#">Jobs</a>
        </div>

        <!-- Jobs -->
        <div class="col-md-2 mb-4">
          <h6>Jobs</h6>
          <a href="#">View Plans</a>
          <a href="#">Blog</a>
          <a href="#">Devices</a>
          <a href="#">About Us</a>
        </div>

      </div>

      <!-- Bottom -->
      <div class="footer-bottom">
        <p>Copyright © 2025 StreamVid. All rights reserved.
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Service</a>
        </p>
      </div>
    </div>
  </footer>

  <!-- Scroll to top button -->
  <button id="scrollTopBtn"><i class="fas fa-arrow-up"></i></button>

  <script>
    // Show scroll button on scroll
    let scrollBtn = document.getElementById("scrollTopBtn");
    window.onscroll = function() {
      if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        scrollBtn.style.display = "flex";
      } else {
        scrollBtn.style.display = "none";
      }
    };

    // Scroll to top smoothly
    scrollBtn.onclick = function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    };
  </script>
 <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Optional: open dropdown on hover for keyboard users as well
    // (Bootstrap already handles click; CSS handles hover. This keeps focus accessible.)
    document.querySelectorAll('.nav-item.dropdown').forEach(function (el) {
      el.addEventListener('mouseenter', () => {
        if (window.innerWidth >= 992) el.querySelector('.dropdown-toggle').setAttribute('aria-expanded','true');
      });
      el.addEventListener('mouseleave', () => {
        if (window.innerWidth >= 992) el.querySelector('.dropdown-toggle').setAttribute('aria-expanded','false');
      });
    });
  </script>
</body>
</html>
