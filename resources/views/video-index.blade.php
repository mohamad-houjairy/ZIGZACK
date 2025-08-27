
@extends('share')

@section('content')


<div class="row py-5 my-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show my-5" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show my-5" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="col-md-3 ">

        <!-- Sidebar -->
        <!-- Sidebar Filters -->

            <div class="card">
                <div class="card-header">
                    <h5>Filters:</h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Categories</h6>
                    <div class="list-group">
                          <a href="{{ route('video-index') }}"
                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center
               ">
              ALL
 <span class="badge bg-primary rounded-pill">
                {{ $count }}
                  </span>
                      </a>
                    @foreach($categories as $category)
             <a href="{{ route('videosbyCategory', $category->id) }}"
                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center
                {{ request()->segment(3) == $category->id ? 'active' : '' }}">
              {{ $category->name }}
                <span class="badge bg-primary rounded-pill">
                {{ $categoryCounts[$category->id] ?? 0 }}
                  </span>
                      </a>

               @endforeach

              </div>
            </div>
        </div>
  </div>
   <!-- Videos -->
    <div class="col-md-9">
        <h3>Movies</h3>
        @if($videos->isEmpty())
            <p>No movies found in this category.</p>
        @else
            <div class="row g-4">
                @foreach ($videos as $video)
                    <div class="col-md-3">
                        <div class="movie-card">
                     
    <img src="{{ asset('images/' . $video->picture) }}"
         alt="{{ $video->title }}"
         class="movie-poster mb-3">

                            <div class="movie-overlay">
                                <div class="movie-title">{{ $video->title }}</div>
                                <div class="movie-info">
                                    price: {{ $video->price }} . distribution: {{ $video->distribution }} <br>
                                    category: {{ optional($video->category)->name ?? 'No category' }}
                                </div>

<div class="d-flex flex-column align-items-start gap-2">
    <!-- Play Button -->
    <a href="{{ route('video.show', $video->id) }}" class="btn btn-primary btn-custom w-100">
        ▶ Play Now
    </a>

    <!-- Add to Favorites Form -->
    <form action="{{ route('favorite.add', $video->id) }}" method="POST" class="w-100">
        @csrf
        <input type="hidden" name="video_id" value="{{ $video->id }}">
        <button type="submit" class="btn btn-outline-warning btn-custom w-100">
            + Watch Later
        </button>
    </form>
</div>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
</div>
<script>
    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }, 3000); // 3 seconds
</script>

@endsection
