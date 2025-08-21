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
      <div class="py-5"> <h1 class="text-center"> Artists</h1>
    </div>
<div class="top-artists ">

@foreach($actors as $actor)

    <a href="{{ route('actor.show', $actor->id) }}" class="artist" >
        <img src="{{ $actor->image_url }}" alt="{{ $actor->name }}">
        <div class="name">{{ $actor->name }}</div>
    </a>

@endforeach
</div>
@endsection
