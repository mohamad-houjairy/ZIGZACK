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
    .top-artists {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    padding: 20px;
}

.artist {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
    margin: 15px;
    transition: transform 0.3s;
}

.artist img {
    width: 100px; /* Initial size of the circle */
    height: 100px;
    border-radius: 50%; /* Create circle */
    transition: transform 0.3s;
}

.artist:hover img {
    transform: scale(1.2); /* Enlarge on hover */
}

.name {
    margin-top: 10px;
    text-align: center;
}
  </style>

<div class="container py-5 my-5">

  <!-- Movie Trailer -->
  <div class="video-container ">
    <iframe src="{{ $video->video_url }}" allowfullscreen></iframe>
  </div>

  <div class="row">
    <!-- Poster + Buttons -->
    <div class="col-md-3">
      <img src="{{ $video->picture }}" alt="{{ $video->title }}" class="movie-poster mb-3">

      <div class="d-flex mb-3">
        <button class="btn btn-custom"><i class="bi bi-hand-thumbs-up"></i> Like</button>
        <button class="btn btn-custom"><i class="bi bi-share"></i> Share</button>
      </div>
      <button class="btn btn-custom w-100 mb-3"><i class="bi bi-plus-circle"></i> Watchlist</button>
      <button class="btn btn-custom w-100"><i class="bi bi-download"></i> Download Video</button>
    </div>

    <!-- Movie Info -->
    <div class="col-md-9">
      <h2>{{ $video->title }}</h2>
      <p class=" py-1">
        <i class="bi bi-star-fill text-warning"></i> {{ $video->rating }}
        <span class="ms-1">{{ $video->views }} Views</span>
        <span class="ms-1">Released: {{ $video->created_at->format('F d, Y') }}</span>
      </p>
      <p class=" py-1"><span class="badge bg-secondary">{{ $video->production_year }}</span> • {{ $video->duration }} • <span class="badge bg-danger">{{ $video->distribution }}</span></p>
      <p class=" py-1"><span class="badge bg-info">Category: {{ optional($video->category)->name ?? 'No category' }}</span></p>
 <p class=" py-1"><h4><span class="badge bg-secondary">Price : {{$video->price}}$</span></h4></p>
      <p class=" py-1">
      {{$video->description  }}
      </p>


    </div>
  </div>
      <h2 class="text-center">Actors</h2>
<div class="top-artists ">
@foreach($actors as $actor)
    <a href="{{{ route('actor.show', $actor->id) }}}" class="artist" >
        <img src="{{ $actor->image_url }}" alt="{{ $actor->name }}">
        <div class="name">{{ $actor->name }}</div>
    </a>
@endforeach

</div>
  <!-- Review Form -->
<div class="row mt-5">
    <div class="col-md-12">
        <div class="review-box">

            <form action="{{ route('video.review', $video->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Comment</label>
                    <textarea name="comment" class="form-control bg-dark text-white" placeholder="Your review..." rows="4" required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label>Rating (1–5)</label>
                        <input type="number" name="rating" class="form-control bg-dark text-white" min="1" max="5" required>
                    </div>
                </div>

                {{-- Pass user_id & video_id hidden --}}
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="video_id" value="{{ $video->id }}">

                <button type="submit" class="btn btn-custom">Submit</button>
            </form>

        </div>
    </div>
</div>


  <!-- Comments -->
<div class="row mt-4">
    <div class="col-md-12">
        <h5>Reviews</h5>

      @foreach ($video->reviews as $review)
    <div class="comment">
        <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="User">
        <div class="comment-body">
            <p>
                <strong>{{ $review->user?->name ?? 'Unknown User' }}</strong>
                <small class="text-muted">{{ $review->created_at->format('F d, Y') }}</small>
            </p>

            <div class="star-rating mb-1">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="bi bi-star{{ $i <= $review->rating ? '-fill text-warning' : '' }}"></i>
                @endfor
            </div>

            <p>{{ $review->comment }}</p>
        </div>
    </div>
@endforeach

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
