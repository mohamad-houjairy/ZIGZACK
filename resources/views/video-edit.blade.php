@extends('share')

@section('content')

<div class="container py-5 my-5">
  <div class="card shadow-lg rounded-3">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">✏️ Edit Movie</h4>
    </div>
    <div class="card-body">

      <form action="{{ route('video.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <!-- Title -->
        <div class="mb-3">
          <label class="form-label">Movie Title</label>
          <input type="text" name="title" class="form-control" maxlength="150" value="{{ old('title', $movie->title) }}" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" rows="3">{{ old('description', $movie->description) }}</textarea>
        </div>

        <!-- Video URL -->
        <div class="mb-3">
          <label class="form-label">Video URL</label>
          <input type="url" name="video_url" class="form-control" placeholder="https://example.com/video.mp4" value="{{ old('video_url', $movie->video_url) }}" required>
        </div>

        <!-- Price -->
        <div class="mb-3">
          <label class="form-label">Price ($)</label>
          <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $movie->price) }}">
        </div>

        <!-- Distribution -->
        <div class="mb-3">
          <label class="form-label">Distribution</label>
          <select name="distribution" id="distribution" class="form-select">
              <option value="festival_only" {{ old('distribution', $movie->distribution) == 'festival_only' ? 'selected' : '' }}>Festival Only</option>
              <option value="public" {{ old('distribution', $movie->distribution) == 'public' ? 'selected' : '' }}>Public</option>
              <option value="library" {{ old('distribution', $movie->distribution) == 'library' ? 'selected' : '' }}>Library</option>
          </select>
        </div>

        <!-- Extra form for festival_only -->
        <div class="m-3" id="festival-extra" style="display: {{ old('distribution', $movie->distribution) == 'festival_only' ? 'block' : 'none' }};">
          <h5 class="mb-3">🎉 Festival Details</h5>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Festival Title</label>
              <input type="text" name="festival_title" class="form-control" value="{{ old('festival_title', $movie->festival?->title) }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Organizer Name</label>
              <input type="text" name="organizer_name" class="form-control" value="{{ old('organizer_name', $movie->festival?->organizer_name) }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Organizer Phone</label>
              <input type="tel" name="organizer_phone" class="form-control" value="{{ old('organizer_phone', $movie->festival?->organizer_phone) }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Location</label>
              <input type="text" name="location" class="form-control" value="{{ old('location', $movie->festival?->location) }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Longitude</label>
              <input type="number" step="any" name="longitude" class="form-control" value="{{ old('longitude', $movie->festival?->longitude) }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Latitude</label>
              <input type="number" step="any" name="latitude" class="form-control" value="{{ old('latitude', $movie->festival?->latitude) }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Starting Date</label>
              <input type="date" name="starting_date" class="form-control" value="{{ old('starting_date', $movie->festival?->starting_date?->format('Y-m-d')) }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Ending Date</label>
              <input type="date" name="ending_date" class="form-control" value="{{ old('ending_date', $movie->festival?->ending_date?->format('Y-m-d')) }}">
            </div>
          </div>
        </div>

        <!-- Thumbnail -->
        <div class="mb-3">
          <label class="form-label">Thumbnail (Poster)</label>
          <input type="file" name="picture" class="form-control" accept="image/*">
          @if($movie->picture)
            <img src="{{ asset('images/' . $movie->picture) }}" alt="Current Thumbnail" class="img-fluid mt-2" style="max-height:150px;">
          @endif
        </div>

        <!-- Production Year -->
        <div class="mb-3">
          <label class="form-label">Production Year</label>
          <input type="number" name="production_year" class="form-control" min="1900" max="2099" step="1" value="{{ old('production_year', $movie->production_year) }}">
        </div>

        <!-- Duration -->
        <div class="mb-3">
          <label class="form-label">Duration</label>
          <input type="text" name="duration" class="form-control" placeholder="e.g. 1h 45m or 105 min" value="{{ old('duration', $movie->duration) }}">
        </div>

        <!-- Category -->
        <div class="mb-3">
          <label class="form-label">Category</label>
          <select name="category_id" class="form-select">
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id', $movie->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Actor Autocomplete -->
        <div class="mb-3">
          <label for="actors">Actors</label>
          <input type="text" id="actors" class="form-control" placeholder="Type actor name">
          <div id="selected-actors" class="mt-2">
            @foreach($movie->actors as $actor)
              <span class="badge bg-primary me-1" data-name="{{ $actor->name }}">{{ $actor->name }} <a href="#" class="text-white remove-actor">&times;</a></span>
            @endforeach
          </div>
        </div>

        <!-- Submit -->
        <div class="d-grid">
          <button type="submit" class="btn btn-success btn-lg">💾 Update Movie</button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- jQuery & jQuery UI -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
    // Show festival fields if selected
    const distributionSelect = document.getElementById('distribution');
    const festivalExtra = document.getElementById('festival-extra');
    distributionSelect.addEventListener('change', function() {
        festivalExtra.style.display = this.value === 'festival_only' ? 'block' : 'none';
    });

    // Actors autocomplete
    $(function() {
        var availableActors = @json($actors->pluck('name'));

        $("#actors").autocomplete({
            source: availableActors,
            select: function(event, ui) {
                let name = ui.item.value;
                if (!$('#selected-actors span[data-name="'+name+'"]').length) {
                    $('#selected-actors').append('<span class="badge bg-primary me-1" data-name="'+name+'">'+name+' <a href="#" class="text-white remove-actor">&times;</a></span>');
                }
                $(this).val('');
                return false;
            }
        });

        // Remove selected actor
        $(document).on('click', '.remove-actor', function(e){
            e.preventDefault();
            $(this).parent().remove();
        });

        // Combine actors into hidden input on submit
        $('form').on('submit', function(){
            var actors = [];
            $('#selected-actors span').each(function(){
                actors.push($(this).data('name'));
            });
            $('<input>').attr({
                type: 'hidden',
                name: 'actors',
                value: actors.join(',')
            }).appendTo('form');
        });
    });
</script>

@endsection
