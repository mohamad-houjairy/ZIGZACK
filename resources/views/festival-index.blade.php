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
@foreach ($festivals as $festival)
      <!-- Festival 1 -->
  <div class="col-md-4 mb-4">
  <div class="card festival-card shadow-lg border-0 rounded-3 overflow-hidden h-100">
    <!-- Festival Image -->
    <div class="position-relative">
      <img src="{{ optional($festival->video)->video_url ?? 'default-poster.jpg' }}"
           class="card-img-top festival-img"
           alt="{{ optional($festival->video)->title ?? 'No Title' }}">
      <span class="badge bg-primary position-absolute top-0 start-0 m-2 px-3 py-2">
        🎬 Festival
      </span>
    </div>

    <!-- Card Body -->
    <div class="card-body bg-dark text-white d-flex flex-column">
      <h5 class="card-title fw-bold">
        {{ optional($festival->video)->title ?? 'No Title Available' }}
      </h5>
      <p class="text-muted small mb-2">
        <i class="bi bi-geo-alt-fill"></i> {{ $festival->location }}
      </p>

      <div class="mb-3">
        <p class="mb-1"><strong>Start:</strong> {{ $festival->starting_date }}</p>
        <p class="mb-1"><strong>End:</strong> {{ $festival->ending_date }}</p>
      </div>

      <!-- CTA Button -->
      <div class="mt-auto text-center">
        <a href="{{ route('festival.show', $festival->id) }}" class="btn btn-primary w-100 rounded-pill">
          ▶ View Details
        </a>
      </div>
    </div>
  </div>
</div>


@endforeach

    </div>
  </div>
@endsection
