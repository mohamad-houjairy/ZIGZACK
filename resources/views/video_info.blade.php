@extends('share')
@section('content')
  <style>
    body {
      background-color: #0b0c2a;
      color: #fff;
      font-family: Arial, sans-serif;
    }
    .video-container {
      width: 100%;
      height: 400px;
      background: black;
      margin-bottom: 20px;
    }
    .video-container iframe {
      width: 100%;
      height: 100%;
      border: none;
    }
    .movie-poster {
      border-radius: 10px;
      width: 100%;
    }
    .btn-custom {
      background-color: #2d2f68;
      border: none;
      color: #fff;
      margin-right: 10px;
    }
    .btn-custom:hover {
      background-color: #ff0077;
    }
    .review-box {
      background: #14163d;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 20px;
    }
    .star-rating i {
      color: gold;
      cursor: pointer;
    }
    .comment {
      display: flex;
      align-items: flex-start;
      margin-top: 20px;
    }
    .comment img {
      border-radius: 50%;
      width: 50px;
      height: 50px;
      margin-right: 15px;
    }
    .comment-body {
      background: #14163d;
      border-radius: 10px;
      padding: 10px 15px;
      width: 100%;
    }
  </style>

<div class="container py-5 my-5">

  <!-- Movie Trailer -->
  <div class="video-container ">
    <iframe src="https://www.youtube.com/embed/qEVUtrk8_B4" allowfullscreen></iframe>
  </div>

  <div class="row">
    <!-- Poster + Buttons -->
    <div class="col-md-3">
      <img src="https://m.media-amazon.com/images/I/71niXI3lxlL._AC_SY679_.jpg" alt="John Wick 4" class="movie-poster mb-3">

      <div class="d-flex mb-3">
        <button class="btn btn-custom"><i class="bi bi-hand-thumbs-up"></i> Like</button>
        <button class="btn btn-custom"><i class="bi bi-share"></i> Share</button>
      </div>
      <button class="btn btn-custom w-100 mb-3"><i class="bi bi-plus-circle"></i> Watchlist</button>
      <button class="btn btn-custom w-100"><i class="bi bi-download"></i> Download Video</button>
    </div>

    <!-- Movie Info -->
    <div class="col-md-9">
      <h2>John Wick 4</h2>
      <p>
        <i class="bi bi-star-fill text-warning"></i> 8.2
        <span class="ms-3">6266 Views</span>
        <span class="ms-3"><i class="bi bi-chat"></i> 1</span>
      </p>
      <p><span class="badge bg-secondary">2023</span> • 170 min • <span class="badge bg-danger">TV-MA</span></p>
      <p><span class="badge bg-info">Action</span> <span class="badge bg-info">Crime</span> <span class="badge bg-info">Thriller</span></p>
      <p>
        Suspendisse eu porta quam, sit amet tristique sem. Maecenas tincidunt finibus ipsum, eget aliquet elit scelerisque non.
        In aliquet dapibus odio, ut gravida mauris elementum sit amet. Nulla viverra magna eget rutrum ultricies.
      </p>
      <p><strong>Cast:</strong> Brooke Mulford</p>
      <p><strong>Crew:</strong> Alaya Pacheco, Ricky Aleman, Sarah Neal</p>
    </div>
  </div>

  <!-- Review Form -->
  <div class="row mt-5">
    <div class="col-md-12">
      <div class="review-box">
        <h5>Leave a Review</h5>
        <div class="star-rating mb-2">
          <i class="bi bi-star"></i>
          <i class="bi bi-star"></i>
          <i class="bi bi-star"></i>
          <i class="bi bi-star"></i>
          <i class="bi bi-star"></i>
        </div>
        <form>
          <div class="mb-3">
            <textarea class="form-control bg-dark text-white" placeholder="Your review..." rows="4"></textarea>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <input type="text" class="form-control bg-dark text-white" placeholder="Name *">
            </div>
            <div class="col-md-6 mb-3">
              <input type="email" class="form-control bg-dark text-white" placeholder="Email *">
            </div>
          </div>
          <button class="btn btn-custom">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Comments -->
  <div class="row mt-4">
    <div class="col-md-12">
      <h5>Reviews</h5>
      <div class="comment">
        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User">
        <div class="comment-body">
          <p><strong>Jane Doe</strong> <small class="text-muted">September 20, 2024</small></p>
          <div class="star-rating mb-1">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
          <p>
            John Wick: Chapter 4 is a non-stop thrill ride, packed with jaw-dropping action, breathtaking visuals, and Keanu Reeves in peak form.
            Pure adrenaline from start to finish!
          </p>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Interactive star rating
  const stars = document.querySelectorAll(".star-rating i");
  stars.forEach((star, index) => {
    star.addEventListener("click", () => {
      stars.forEach((s, i) => {
        if (i <= index) {
          s.classList.remove("bi-star");
          s.classList.add("bi-star-fill", "text-warning");
        } else {
          s.classList.remove("bi-star-fill", "text-warning");
          s.classList.add("bi-star");
        }
      });
    });
  });
</script>

@endsection
