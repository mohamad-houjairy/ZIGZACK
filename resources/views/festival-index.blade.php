@extends('share')
@section('content')
<style>
    body {
      background-color: #121212;
      color: #fff;
    }
    .festival-card {
      border-radius: 12px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }
    .festival-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.6);
    }
    .festival-img {
      height: 200px;
      object-fit: cover;
    }
    .festival-location {
      font-size: 0.9rem;
      color: #bbb;
    }
  </style>
</head>
<body>
  <div class="container py-5 my-5">
    <h2 class="text-center mb-4">🎉 Upcoming Festivals</h2>
    <div class="row g-4">

      <!-- Festival 1 -->
      <div class="col-md-4">
        <a href="festival-details.html" class="text-decoration-none text-white">
          <div class="card festival-card bg-dark">
            <img src="https://placehold.co/600x400?text=Music+Festival" class="festival-img card-img-top" alt="Music Festival">
            <div class="card-body">
              <h5 class="card-title">Summer Beats Festival</h5>
              <p class="festival-location"><i class="bi bi-geo-alt-fill"></i> Los Angeles, USA</p>
              <p class="mb-1"><strong>Start:</strong> 2025-08-22</p>
              <p class="mb-1"><strong>End:</strong> 2025-08-24</p>
              <p><strong>Organizer:</strong> John Smith (📞 +1 555-123-456)</p>
            </div>
          </div>
        </a>
      </div>

      <!-- Festival 2 -->
      <div class="col-md-4">
        <a href="festival-details.html" class="text-decoration-none text-white">
          <div class="card festival-card bg-dark">
            <img src="https://placehold.co/600x400?text=Film+Festival" class="festival-img card-img-top" alt="Film Festival">
            <div class="card-body">
              <h5 class="card-title">Cannes Film Festival</h5>
              <p class="festival-location"><i class="bi bi-geo-alt-fill"></i> Cannes, France</p>
              <p class="mb-1"><strong>Start:</strong> 2025-09-10</p>
              <p class="mb-1"><strong>End:</strong> 2025-09-18</p>
              <p><strong>Organizer:</strong> Festival Org (📞 +33 555-888-222)</p>
            </div>
          </div>
        </a>
      </div>

      <!-- Festival 3 -->
      <div class="col-md-4">
        <a href="festival-details.html" class="text-decoration-none text-white">
          <div class="card festival-card bg-dark">
            <img src="https://placehold.co/600x400?text=Food+Festival" class="festival-img card-img-top" alt="Food Festival">
            <div class="card-body">
              <h5 class="card-title">World Food Carnival</h5>
              <p class="festival-location"><i class="bi bi-geo-alt-fill"></i> Tokyo, Japan</p>
              <p class="mb-1"><strong>Start:</strong> 2025-10-05</p>
              <p class="mb-1"><strong>End:</strong> 2025-10-08</p>
              <p><strong>Organizer:</strong> Yuki Tanaka (📞 +81 90-1234-5678)</p>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>
@endsection
