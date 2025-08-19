
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
  <section class="tv-series-section container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="tv-series-header">TV Series</h2>
      <div class="series-filter">
        <span class="active" data-filter="today">Today</span>
        <span data-filter="week">This week</span>
        <span data-filter="month">This month</span>
        <a href="{{ route('festivals.index') }}" data-filter="months">View All ></a>
      </div>
    </div>
  <div class="series-cards">

  <a href="details1.html" class="text-decoration-none text-white">
    <div class="card-series large" role="img" aria-label="Water drop creating ripples in water">
      <div class="card-img-container">
        <img src="https://placehold.co/600x338?text=Water+Ripple+Closeup&font=roboto"
             alt="Closeup photo of water drop creating circular ripples on a dark background" />
      </div>
      <div class="card-content">
        <h6>Falling Water</h6>
        <p>2 Seasons</p>
      </div>
    </div>
  </a>

  <a href="details2.html" class="text-decoration-none text-white">
    <div class="card-series" role="img" aria-label="Collage of soldier scenes with focus frames">
      <div class="card-img-container">
        <img src="https://placehold.co/280x158?text=Unstoppable+Soldier&font=roboto"
             alt="Collage image of soldiers and military equipment with highlight frames" />
      </div>
      <div class="card-content">
        <h6>The Unstoppable Soldier</h6>
        <p>1 Season</p>
      </div>
    </div>
  </a>

  <a href="details3.html" class="text-decoration-none text-white">
    <div class="card-series" role="img" aria-label="Black and white portrait of a woman and a man">
      <div class="card-img-container">
        <img src="https://placehold.co/280x158?text=Political+Animal&font=roboto"
             alt="Black and white photo of a woman and a man looking serious" />
      </div>
      <div class="card-content">
        <h6>Political Animal</h6>
        <p>3 Seasons</p>
      </div>
    </div>
  </a>

  <a href="details4.html" class="text-decoration-none text-white">
    <div class="card-series" role="img" aria-label="Blurred train station clock with fast motion">
      <div class="card-img-container">
        <img src="https://placehold.co/280x158?text=The+Wasted+Times&font=roboto"
             alt="Blurred image of a train station platform with a clock in focus" />
      </div>
      <div class="card-content">
        <h6>The Wasted Times</h6>
        <p>2 Seasons</p>
      </div>
    </div>
  </a>

  <a href="details5.html" class="text-decoration-none text-white">
    <div class="card-series" role="img" aria-label="Bright fireworks exploding in the night sky">
      <div class="card-img-container">
        <img src="https://placehold.co/280x158?text=Fireworks+Wednesday&font=roboto"
             alt="Colorful fireworks exploding luminously against dark night sky" />
      </div>
      <div class="card-content">
        <h6>Fireworks Wednesday</h6>
        <p>1 Season</p>
      </div>
    </div>
  </a>

  <a href="{{ route('festivals.index') }}" class="text-decoration-none text-white">
    <div class="card-series" role="img" aria-label="Person gripping a tree in a dark forest">
      <div class="card-img-container">
        <img src="https://placehold.co/280x158?text=Zoombies+Game&font=roboto"
             alt="A person gripping a tree trunk in a dark, wooded forest" />
      </div>
      <div class="card-content">
        <h6>Zoombies Game</h6>
        <p>1 Season</p>
      </div>
    </div>
  </a>

  <a href="details7.html" class="text-decoration-none text-white">
    <div class="card-series" role="img" aria-label="Yellow caution sign with shark silhouette in dark environment">
      <div class="card-img-container">
        <img src="https://placehold.co/280x158?text=Shark+Hunters&font=roboto"
             alt="Yellow triangular warning sign with shark silhouette on a dark background" />
      </div>
      <div class="card-content">
        <h6>Shark Hunters</h6>
        <p>1 Season</p>
      </div>
    </div>
  </a>

  <a href="details8.html" class="text-decoration-none text-white">
    <div class="card-series" role="img" aria-label="Yellow caution sign with shark silhouette in dark environment">
      <div class="card-img-container">
        <img src="https://placehold.co/280x158?text=Shark+Hunters&font=roboto"
             alt="Yellow triangular warning sign with shark silhouette on a dark background" />
      </div>
      <div class="card-content">
        <h6>Shark Hunters</h6>
        <p>1 Season</p>
      </div>
    </div>
  </a>

</div>


  </section>

  <section class="main-banner container-fluid">
    <img
      src="https://placehold.co/1600x700?text=Pieces+of+Her+Netflix+Series+Banner&font=roboto"
      alt="Promo banner for Pieces of Her: Close-up of serious woman and dimly lit characters on the side, dark moody background"
    />
    <div class="main-banner-content">
      <small>A NETFLIX SERIES</small>
      <h1>PIECES OF HER</h1>
      <div class="d-flex align-items-center">
        <span class="release-date">MARCH 4</span>
        <span class="netflix-red">NETFLIX</span>
      </div>
      <a href="#!" class="btn btn-watch mt-3">Watch Trailer</a>
    </div>
  </section>

  <button id="scrollTopBtn" aria-label="Scroll to top">&#8679;</button>
<div class="top-artists ">
    <a href="{{{ route('actor-info' )}}}" class="artist" >
        <img src="alaya-pacheco.jpg" alt="Alaya Pacheco">
        <div class="name">Alaya Pacheco</div>
    </a>
    <a href="actor-info.html" class="artist">
        <img src="sarah-neal.jpg" alt="Sarah Neal">
        <div class="name">Sarah Neal</div>
    </a>
    <a href="actor-info.html" class="artist">
        <img src="emma-narburgh.jpg" alt="Emma Narburgh">
        <div class="name">Emma Narburgh</div>
    </a>
    <a href="actor-info.html" class="artist">
        <img src="richard-cant.jpg" alt="Richard Cant">
        <div class="name">Richard Cant</div>
    </a>
    <a href="actor-info.html" class="artist">
        <img src="david-horovitch.jpg" alt="David Horovitch">
        <div class="name">David Horovitch</div>
    </a>
    <a href="actor-info.html" class="artist">
        <img src="emily-carey.jpg" alt="Emily Carey">
        <div class="name">Emily Carey</div>
    </a>
    <a href="actor-info.html" class="artist">
        <img src="harry-styles.jpg" alt="Harry Styles">
        <div class="name">Harry Styles</div>
    </a>
    <a href="actor-info.html" class="artist">
        <img src="jefferson-hall.jpg" alt="Jefferson Hall">
        <div class="name">Jefferson Hall</div>
    </a>
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
