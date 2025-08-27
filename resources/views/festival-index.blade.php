@extends('share')

@section('content')
<style>
    body {
        background-color: #121212;
        color: #fff;
    }

    .festival-card {
        border-radius: 16px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .festival-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.7);
    }

    .festival-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .festival-location {
        font-size: 0.9rem;
        color: #bbb;
    }
</style>

<div class="container py-5 my-5">
    <h2 class="text-center mb-5 fw-bold">🎉 Upcoming Festivals</h2>

    <div class="row g-4">
        @foreach ($festivals as $festival)
            <div class="col-md-4 col-sm-6">
                <div class="card festival-card shadow-lg border-0 h-100 bg-dark text-white">

                    <!-- Festival Image -->
                    <div class="position-relative">
                        @if ($festival->video && $festival->video->picture)
                            <img src="{{ asset('images/' . $festival->video->picture) }}"
                                 alt="{{ $festival->video->title }}"
                                 class="festival-image">
                        @else
                            <img src="{{ asset('images/default-poster.jpg') }}"
                                 alt="No Poster"
                                 class="festival-image">
                        @endif

                        <span class="badge bg-primary position-absolute top-0 start-0 m-2 px-3 py-2">
                            🎬 Festival
                        </span>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">
                            {{ optional($festival->video)->title ?? 'No Title Available' }}
                        </h5>

                        <p class="festival-location mb-2">
                            <i class="bi bi-geo-alt-fill"></i> {{ $festival->location }}
                        </p>

                        <div class="mb-3">
                            <p class="mb-1"><strong>Start:</strong> {{ $festival->starting_date }}</p>
                            <p class="mb-1"><strong>End:</strong> {{ $festival->ending_date }}</p>
                        </div>

                        <!-- CTA Button -->
                        <div class="mt-auto">
                            <a href="{{ route('festival.show', $festival->id) }}"
                               class="btn btn-primary w-100 rounded-pill">
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
