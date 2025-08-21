@extends('share')

@section('content')
<div class="row py-5 my-5">
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
                            <img src="{{$video->video_url}}" >
                            <div class="movie-overlay">
                                <div class="movie-title">{{ $video->title }}</div>
                                <div class="movie-info">
                                    price: {{ $video->price }} . distribution: {{ $video->distribution }} <br>
                                    category: {{ optional($video->category)->name ?? 'No category' }}
                                </div>
                                <button onclick="window.location='{{ route('video.show', $video->id) }}'" class="btn btn-primary btn-custom">▶ Play Now</button>
                                <button class="btn btn-outline-light btn-custom">+ Watch Later</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
</div>
@endsection
