
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>StreamVid - Movie Page</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoYz1H5rZbKytz5rZ5Skvm4q2Kv9KFiNDv4QF6N9e6Zh6jI"
    crossorigin="anonymous"
  />
  <style>
    body {
      background-color: #070827;
      color: white;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .tv-series-section {
      padding: 2rem 3rem 3rem 3rem;
    }
    .tv-series-header {
      font-weight: 700;
      font-size: 1.25rem;
      margin-bottom: 1rem;
    }
    .series-filter {
      font-weight: 600;
      font-size: 0.85rem;
    }
    .series-filter span {
      cursor: pointer;
      margin-left: 1.25rem;
      color: white;
      user-select: none;
      transition: color 0.3s;
    }
    .series-filter span.active,
    .series-filter span:hover {
      color: #3f3fd1;
      font-weight: 700;
    }
    .series-cards {
      display: grid;
      grid-template-columns: 2.7fr repeat(5, 1fr);
      gap: 1rem;
    }
    .card-series {
      background: #1a1a4d;
      border-radius: 0.4rem;
      overflow: hidden;
      height: 100%;
      position: relative;
      cursor: pointer;
      transition: transform 0.3s ease;
      box-shadow: inset 0 0 90px rgb(0 0 0 / 0.7);
    }
    .card-series.large {
      border-radius: 0.5rem;
    }
    .card-series:hover {
      transform: scale(1.05);
      z-index: 5;
    }
    .card-img-container {
      aspect-ratio: 16/9;
      overflow: hidden;
      position: relative;
    }
    .card-img-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      filter: brightness(0.75);
      transition: filter 0.3s ease;
    }
    .card-series:hover .card-img-container img {
      filter: brightness(0.9);
    }
    .card-content {
      position: absolute;
      bottom: 10px;
      left: 10px;
      color: white;
      text-shadow: 0 0 8px rgba(0,0,0,0.7);
    }
    .card-content h6 {
      font-weight: 700;
      font-size: 0.95rem;
      margin: 0 0 3px 0;
    }
    .card-content p {
      font-weight: 400;
      font-size: 0.75rem;
      margin: 0;
    }
    /* Main banner below */
    .main-banner {
      margin: 3rem 0 0 0;
      position: relative;
      width: 100%;
      aspect-ratio: 16/7;
      overflow: hidden;
      border-radius: 0.5rem;
      box-shadow: inset 0 0 80px rgb(0 0 0 / 0.8);
    }
    .main-banner img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: brightness(0.4);
      user-select: none;
    }
    .main-banner-content {
      position: absolute;
      top: 50%;
      left: 10%;
      transform: translateY(-50%);
      color: white;
    }
    .main-banner-content small {
      letter-spacing: 0.15em;
      font-weight: 300;
      font-size: 0.9rem;
      opacity: 0.8;
      margin-bottom: 0.3rem;
      display: block;
    }
    .main-banner-content h1 {
      font-weight: 600;
      font-size: 2.8rem;
      letter-spacing: 0.35em;
      margin-bottom: 0.4rem;
      user-select: none;
    }
    .main-banner-content .release-date {
      font-weight: 400;
      font-size: 0.95rem;
      letter-spacing: 0.1em;
      margin-bottom: 1rem;
      opacity: 0.8;
    }
    .main-banner-content .netflix-red {
      color: #e50914;
      font-weight: 700;
      margin-left: 0.25rem;
      user-select: none;
    }
    .btn-watch {
      background-color: white !important;
      color: black !important;
      font-weight: 700;
      border-radius: 0.4rem;
      padding: 0.55rem 1.3rem;
      font-size: 1rem;
      user-select: none;
      box-shadow: 0 4px 10px rgb(255 255 255 / 0.3);
      transition: background-color 0.25s ease;
    }
    .btn-watch:hover {
      background-color: #ddd !important;
      color: #000 !important;
      text-decoration: none;
    }
    /* Scroll to top button */
    #scrollTopBtn {
      position: fixed;
      bottom: 25px;
      right: 25px;
      background-color: #1a1a4d;
      color: white;
      border: none;
      border-radius: 50%;
      width: 42px;
      height: 42px;
      font-size: 1.5rem;
      cursor: pointer;
      box-shadow: 0 0 10px rgb(0 0 0 / 0.5);
      transition: background-color 0.3s ease;
      display: none;
      z-index: 10;
      user-select: none;
    }
    #scrollTopBtn:hover {
      background-color: #3f3fd1;
    }
    body {
    background-color: #0D1117; /* Dark background */
    color: white; /* Text color */
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
</head>
<body>
  <section class="tv-series-section container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="tv-series-header " style="font-size: xx-large">Festivals</div>
        <div class="series-filter">
            <a href="{{ route('festival-index') }}" data-filter="months">View All ></a>
        </div>
    </div>

    <div class="row g-4">
        @foreach ($festivals as $index => $festival)
            <div class="
                @if ($index == 0) col-12 col-md-6 col-lg-6 @else col-6 col-md-4 col-lg-3 @endif
            ">
                <a href="{{ route('festival.show', $festival->id) }}" class="text-decoration-none text-white">
                    <div class="card-series h-100 {{ $index == 0 ? 'featured-card' : '' }}">
                        <div class="card-img-container mb-2">
                            <img src="{{ optional($festival->video)->video_url ?? 'https://via.placeholder.com/400x400' }}"
                                 alt="{{ optional($festival->video)->title ?? 'No category' }}"
                                 class="img-fluid rounded">
                        </div>
                        <div class="card-content">
                            <h6>{{ optional($festival->video)->title ?? 'No category' }}</h6>
                            <p>Start on {{ $festival->starting_date }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>



  <button id="scrollTopBtn" aria-label="Scroll to top">&#8679;</button>
      <div class="py-3"> <h2 class="text-center">Top Artists</h2></div>
<div class="container py-4">
    <div class="row g-4">
        @foreach($actors as $actor)
            <div class="col-6 col-md-3 col-lg-2">
                <a href="{{ route('actor.show', $actor->id) }}" class="artist text-center d-block">
                   <img src="{{ $actor->profile_image ? asset('storage/' . $actor->profile_image) : 'https://via.placeholder.com/150x150?text=No+Image' }}"
     class="card-img-top"
     alt="{{ $actor->name }}">
                    <div class="name">{{ $actor->name }}</div>
                </a>
            </div>
        @endforeach
    </div>
</div>


<script>
  // Scroll to top button behavior
  const scrollTopBtn = document.getElementById('scrollTopBtn');
  window.onscroll = () => {
    if (window.scrollY > 300) {
      scrollTopBtn.style.display = 'block';
    } else {
      scrollTopBtn.style.display = 'none';
    }
  };
  scrollTopBtn.onclick = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  // Filter toggle logic (for demonstration, currently no actual filtering takes place)
  const filterSpans = document.querySelectorAll('.series-filter span');
  filterSpans.forEach(span => {
    span.addEventListener('click', () => {
      filterSpans.forEach(s => s.classList.remove('active'));
      span.classList.add('active');
      // Insert dynamic filtering functionality here if desired
    });
  });
</script>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoYz1H5rZbKytz5rZ5Skvm4q2Kv9KFiNDv4QF6N9e6Zh6jI"
  crossorigin="anonymous"
></script>
</body>
</html>
