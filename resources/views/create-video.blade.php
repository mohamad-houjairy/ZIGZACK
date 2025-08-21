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
          <select name="distribution" class="form-select">
            <option value="festival_only">Festival Only</option>
            <option value="public" selected>Public</option>
            <option value="library">Library</option>
          </select>
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
