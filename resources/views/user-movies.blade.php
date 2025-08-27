@extends('share')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif
<div class="container py-5 my-5">
    <h2 class="text-center mb-4">🎬 My Movies</h2>

    <!-- Navigation Links -->
    <ul class="nav nav-pills justify-content-center mb-4" id="movieTabs">
        <li class="nav-item">
            <a class="nav-link active" href="#" data-target="festival">🌟 Festival Only</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-target="public">🌍 Public</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-target="library">📚 Library</a>
        </li>
    </ul>

    <!-- Festival Section -->
    <div id="festival" class="movie-section">
        <h3 class="mb-3">🌟 Festival Only</h3>
        <div class="row g-4">
            @forelse ($movies['festival_only'] ?? [] as $movie)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if($movie->picture)
                            <img src="{{ asset('images/' . $movie->picture) }}" class="card-img-top" alt="{{ $movie->title }}">
                        @else
                            <img src="https://via.placeholder.com/300x180?text=No+Image" class="card-img-top" alt="No image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="text-muted mb-1">🎞 {{ $movie->production_year ?? 'N/A' }}</p>
                            <p class="mb-1">⭐ Rating: {{ $movie->rating }}</p>
                            <p class="mb-1">👀 Views: {{ $movie->views_count }}</p>
                            <p class="small text-truncate">{{ $movie->description }}</p>
                        </div>
                        <div class="card-footer bg-light text-center d-flex gap-2 justify-content-center">
                            <a href="{{ route('video.show', $movie->id) }}" target="_blank" class="btn btn-primary btn-sm">▶ Watch</a>
                            <a href="{{ route('video.edit', $movie->id) }}" class="btn btn-warning btn-sm">✏ Edit</a>
                            <form action="{{ route('video.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>No festival movies yet.</p>
            @endforelse
        </div>
    </div>

    <!-- Public Section -->
    <div id="public" class="movie-section d-none">
        <h3 class="mb-3">🌍 Public</h3>
        <div class="row g-4">
            @forelse ($movies['public'] ?? [] as $movie)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if($movie->picture)
                            <img src="{{ asset('images/' . $movie->picture) }}" class="card-img-top" alt="{{ $movie->title }}">
                        @else
                            <img src="https://via.placeholder.com/300x180?text=No+Image" class="card-img-top" alt="No image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="text-muted mb-1">🎞 {{ $movie->production_year ?? 'N/A' }}</p>
                            <p class="mb-1">⭐ Rating: {{ $movie->rating }}</p>
                            <p class="mb-1">👀 Views: {{ $movie->views_count }}</p>
                            <p class="small text-truncate">{{ $movie->description }}</p>
                        </div>
                        <div class="card-footer bg-light text-center d-flex gap-2 justify-content-center">
                            <a href="{{ route('video.show', $movie->id) }}" target="_blank" class="btn btn-primary btn-sm">▶ Watch</a>
                            <a href="{{ route('video.edit', $movie->id) }}" class="btn btn-warning btn-sm">✏ Edit</a>
                            <form action="{{ route('video.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>No public movies yet.</p>
            @endforelse
        </div>
    </div>

    <!-- Library Section -->
    <div id="library" class="movie-section d-none">
        <h3 class="mb-3">📚 Library</h3>
        <div class="row g-4">
            @forelse ($movies['library'] ?? [] as $movie)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if($movie->picture)
                            <img src="{{ asset('images/' . $movie->picture) }}" class="card-img-top" alt="{{ $movie->title }}">
                        @else
                            <img src="https://via.placeholder.com/300x180?text=No+Image" class="card-img-top" alt="No image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="text-muted mb-1">🎞 {{ $movie->production_year ?? 'N/A' }}</p>
                            <p class="mb-1">⭐ Rating: {{ $movie->rating }}</p>
                            <p class="mb-1">👀 Views: {{ $movie->views_count }}</p>
                            <p class="small text-truncate">{{ $movie->description }}</p>
                        </div>
                        <div class="card-footer bg-light text-center d-flex gap-2 justify-content-center">
                            <a href="{{ route('video.show', $movie->id) }}" target="_blank" class="btn btn-primary btn-sm">▶ Watch</a>
                            <a href="{{ route('video.edit', $movie->id) }}" class="btn btn-warning btn-sm">✏ Edit</a>
                            <form action="{{ route('video.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>No library movies yet.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Script to switch tabs -->
<script>
    document.querySelectorAll('#movieTabs a').forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();

            // remove active from all
            document.querySelectorAll('#movieTabs a').forEach(link => link.classList.remove('active'));
            this.classList.add('active');

            // hide all sections
            document.querySelectorAll('.movie-section').forEach(sec => sec.classList.add('d-none'));

            // show the selected one
            const target = this.getAttribute('data-target');
            document.getElementById(target).classList.remove('d-none');
        });
    });
</script>
@endsection
