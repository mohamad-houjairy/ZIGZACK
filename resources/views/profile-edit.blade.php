@extends('share')

@section('content')
<div class="container my-5 py-5">
    <h2 class="mb-4">👤 My Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Profile Image with Circle + Edit Button -->
        <div class="mb-3 text-center position-relative" style="width:150px; margin:auto;">
            <div class="position-relative">
                <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://via.placeholder.com/150' }}"
                     alt="Profile"
                     class="rounded-circle border shadow"
                     width="150" height="150"
                     id="profilePreview">

                <!-- Edit button -->
                <label for="image" class="btn btn-sm btn-primary rounded-circle position-absolute bottom-0 end-0" style="transform: translate(30%, -30%); cursor:pointer;">
                    <i class="bi bi-pencil"></i>
                </label>
                <input type="file" name="image" id="image" class="d-none" onchange="previewImage(event)">
            </div>
            @error('image') <small class="text-danger d-block mt-2">{{ $message }}</small> @enderror
        </div>

        <!-- Name -->
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
<!-- Content Creator Extra Info -->
    @if($user->role === 'content_creator')
        <hr>
        <h3>🎬 Content Creator Info</h3>

        <div class="mb-3">
            <label>Bio</label>
            <textarea  class="form-control" name="bio">{{ old('bio', $user->contentCreator->bio ?? '') }}</textarea>
        </div>

    @endif
        <button type="submit" class="btn btn-primary">💾 Save Changes</button>
    </form>
</div>

<!-- Preview Image Script -->
<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('profilePreview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
