@extends('share')

@section('content')

<div class="container py-5 my-5">
  <div class="card shadow-lg rounded-3">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">🎬 Add New Movie</h4>
    </div>
    <div class="card-body">

      <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

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
          <input type="text" name="title" class="form-control" maxlength="150" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <!-- Video URL -->
        <div class="mb-3">
          <label class="form-label">Video URL</label>
          <input type="url" name="video_url" class="form-control" placeholder="https://example.com/video.mp4" required>
        </div>

        <!-- Price -->
        <div class="mb-3">
          <label class="form-label">Price ($)</label>
          <input type="number" step="0.01" name="price" class="form-control" value="0">
        </div>

        <!-- Distribution -->
   <div class="mb-3">
    <label class="form-label">Distribution</label>
    <select name="distribution" id="distribution" class="form-select">
        <option value="festival_only">Festival Only</option>
        <option value="public" selected>Public</option>
        <option value="library">Library</option>
    </select>
</div>

<!-- Extra form for festival_only -->
<!-- Festival Details (hidden by default) -->
<div class="m-3" id="festival-extra" style="display: none;">
  <h5 class="mb-3">🎉 Festival Details</h5>

  <div class="row g-3">
    <!-- Title -->
    <div class="col-md-6">
      <label for="festival_title" class="form-label">Festival Title</label>
      <input type="text" name="festival_title" id="festival_title" class="form-control" placeholder="Enter festival title">
    </div>

    <!-- Organizer Name -->
    <div class="col-md-6">
      <label for="organizer_name" class="form-label">Organizer Name</label>
      <input type="text" name="organizer_name" id="organizer_name" class="form-control" placeholder="Enter organizer name">
    </div>

    <!-- Organizer Phone -->
    <div class="col-md-6">
      <label for="organizer_phone" class="form-label">Organizer Phone</label>
      <input type="tel" name="organizer_phone" id="organizer_phone" class="form-control" placeholder="+961 71 234 567">
    </div>

    <!-- Location -->
    <div class="col-md-6">
      <label for="location" class="form-label">Location</label>
      <input type="text" name="location" id="location" class="form-control" placeholder="Enter festival location">
    </div>

    <!-- Coordinates -->
    <div class="col-md-6">
      <label for="longitude" class="form-label">Longitude</label>
      <input type="number" step="any" name="longitude" id="longitude" class="form-control" placeholder="e.g. 35.5131">
    </div>

    <div class="col-md-6">
      <label for="latitude" class="form-label">Latitude</label>
      <input type="number" step="any" name="latitude" id="latitude" class="form-control" placeholder="e.g. 33.8938">
    </div>

    <!-- Dates -->
    <div class="col-md-6">
      <label for="starting_date" class="form-label">Starting Date</label>
      <input type="date" name="starting_date" id="starting_date" class="form-control">
    </div>

    <div class="col-md-6">
      <label for="ending_date" class="form-label">Ending Date</label>
      <input type="date" name="ending_date" id="ending_date" class="form-control">
    </div>
  </div>
</div>

        <!-- Thumbnail -->
        <div class="mb-3">
          <label class="form-label">Thumbnail (Poster)</label>
          <input type="file" name="picture" class="form-control" accept="image/*">
        </div>

        <!-- Production Year -->
        <div class="mb-3">
          <label class="form-label">Production Year</label>
          <input type="number" name="production_year" class="form-control" min="1900" max="2099" step="1">
        </div>

        <!-- Duration -->
        <div class="mb-3">
          <label class="form-label">Duration</label>
          <input type="text" name="duration" class="form-control" placeholder="e.g. 1h 45m or 105 min">
        </div>

        <!-- Category -->
        <div class="mb-3">
          <label class="form-label">Category</label>
          <select name="category_id" class="form-select">
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <!-- Actor Autocomplete -->
        <div class="mb-3">
          <label for="actors">Actors</label>
          <input type="text" id="actors" class="form-control" placeholder="Type actor name">
          <div id="selected-actors" class="mt-2"></div>
        </div>

        <!-- Submit -->
        <div class="d-grid">
          <button type="submit" class="btn btn-success btn-lg">💾 Save Movie</button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    const distributionSelect = document.getElementById('distribution');
    const festivalExtra = document.getElementById('festival-extra');

    distributionSelect.addEventListener('change', function() {
        if (this.value === 'festival_only') {
            festivalExtra.style.display = 'block';
        } else {
            festivalExtra.style.display = 'none';
        }
    });
</script>

<script>
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
