@extends('share')
@section('content')

  <style>
    body {
      background-color: #0b0c2a;
      color: #fff;
      font-family: Arial, sans-serif;
    }
    .festival-card {
      background: #14163d;
      border-radius: 12px;
      padding: 30px;
      max-width: 700px;
      margin: 70px auto;
      box-shadow: 0px 0px 25px rgba(0,0,0,0.7);
    }
    .festival-title {
      font-size: 26px;
      font-weight: bold;
      color: #6C52EE;
      margin-bottom: 15px;
      text-align: center;
    }
    .festival-info {
      font-size: 15px;
      margin-bottom: 12px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      padding-bottom: 8px;
    }
    .festival-info strong {
      color: #6C52EE;
    }
    .btn-custom {
      background-color: #6C52EE;
      border: none;
      padding: 8px 18px;
      border-radius: 6px;
      transition: 0.3s;
      color: #fff;
      text-decoration: none;
    }
    .btn-custom:hover {
      background-color: #fffcfe;
      color: #000000;
    }
    video {
      border-radius: 10px;
      margin-top: 10px;
    }
  </style>


  <div class="festival-card ">
    <!-- Festival Title -->
    <h2 class="festival-title">🎉 Summer Music Festival 2025</h2>

    <!-- Festival Info -->
    <div class="festival-info"><strong>📅 Dates:</strong> {{ $festival->starting_date }} – {{ $festival->ending_date }}</div>
    <div class="festival-info"><strong>📍 Location:</strong> {{ $festival->location }}</div>
    <div class="festival-info"><strong>🌍 Coordinates:</strong> {{ $festival->latitude }}, {{ $festival->longitude }}</div>
    <div class="festival-info"><strong>👤 Organizer:</strong> {{ $festival->organizer_name }}</div>
    <div class="festival-info"><strong>📞 Phone:</strong> {{ $festival->organizer_phone }}</div>

    <!-- Example Video -->
    <div class="festival-info text-center">
      <strong >🎬 Featured Video:</strong><br>
     @php
function convertYouTubeUrlToEmbed($url) {
    $parsedUrl = parse_url($url);

    if (isset($parsedUrl['host']) && (strpos($parsedUrl['host'], 'youtube.com') !== false || strpos($parsedUrl['host'], 'youtu.be') !== false)) {
        if (strpos($parsedUrl['host'], 'youtube.com') !== false) {
            parse_str($parsedUrl['query'] ?? '', $queryParams);
            if (isset($queryParams['v'])) {
                return 'https://www.youtube.com/embed/' . $queryParams['v'];
            }
        } elseif (strpos($parsedUrl['host'], 'youtu.be') !== false) {
            $videoId = ltrim($parsedUrl['path'], '/');
            return 'https://www.youtube.com/embed/' . $videoId;
        }
    }

    return $url;
}

// Use the Blade variable directly
$embedUrl = convertYouTubeUrlToEmbed($festival->video->video_url);
@endphp

<iframe class="mt-3" width="100%" height="300"
        src="{{ $embedUrl }}"
        title="YouTube video player"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>
</iframe>
    </div>

    <div class="text-center mt-4">
      <a href="{{ route('festival-index') }}" class="btn-custom">⬅ Back to Festivals</a>
    </div>
  </div>

</body>
</html>
@endsection
