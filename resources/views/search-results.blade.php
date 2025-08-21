@extends('share')

@section('content')
<style>
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
<div class="container py-5 my-3">
    <h3>Search results for: "{{ $query }}"</h3>

    {{-- Videos --}}
    @if($videos->count())
        <h5 class="mt-4">Videos</h5>
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

    {{-- Actors --}}
    @if($actors->count())
        <h5 class="mt-4">Actors</h5>
       <div class="top-artists ">

@foreach($actors as $actor)

    <a href="{{ route('actor.show', $actor->id) }}" class="artist" >
        <img src="{{ $actor->image_url }}" alt="{{ $actor->name }}">
        <div class="name">{{ $actor->name }}</div>
    </a>

@endforeach
</div>
    @endif



    @if(!$videos->count() && !$actors->count() && !$festivals->count())
        <p>No results found.</p>
    @endif
</div>
@endsection
