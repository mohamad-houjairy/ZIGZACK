<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Actor;
use App\Models\FestivalVideo;
use Illuminate\Support\Facades\Auth;
use App\Models\ContentCreator;
use App\Models\Slider;

class VideoController extends Controller
{

   public function index()
{
  $videos = Video::whereNotNull('category_id')->get();
$count = $videos->count();
    if ($videos->isEmpty()) {
        return response()->json(['message' => 'No videos found'], 404);
    }

    $categories = Category::all();

    // Count videos per category
    $categoryCounts = Video::groupBy('category_id')
        ->selectRaw('category_id, COUNT(*) as count')
        ->pluck('count', 'category_id'); // returns [category_id => count]

    return view('video-index', compact('videos', 'categories', 'categoryCounts', 'count'));
}

    public function show($id)
    {
        $video = Video::findOrFail($id);
        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }
        $actors = $video->actors; // Get the actors for the video
        return view('video_info',compact('video', 'actors'));
    }
public function update(Request $request, Video $video)
{
    $user = Auth::user();

    // Only admin or the movie creator can update
    if ($user->role !== 'admin' && $video->creator_id !== $user->contentCreator?->id) {
        return redirect()->back()->with('error', '❌ You are not authorized to edit this movie.');
    }

    // Convert comma-separated actors string to array
    if ($request->has('actors')) {
        $request->merge([
            'actors' => array_filter(explode(',', $request->actors))
        ]);
    }

    $validated = $request->validate([
        'title' => 'required|string|max:150',
        'description' => 'nullable|string',
        'video_url' => 'required|url',
        'price' => 'nullable|numeric|min:0',
        'distribution' => 'required|in:festival_only,public,library',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'production_year' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
        'duration' => 'nullable|string|max:50',
        'category_id' => 'nullable|exists:categories,id',
        'actors' => 'nullable|array',
        'actors.*' => 'exists:actors,name',
    ]);

    // Handle picture upload if exists
    if ($request->hasFile('picture')) {
        $image = $request->file('picture');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $validated['picture'] = $imageName;

        // Optionally delete old picture
        if ($video->picture && file_exists(public_path('images/' . $video->picture))) {
            unlink(public_path('images/' . $video->picture));
        }
    }

    $video->update($validated);

    // Sync actors if provided
    if (!empty($validated['actors'])) {
        $actorIds = Actor::whereIn('name', $validated['actors'])->pluck('id')->toArray();
        $video->actors()->sync($actorIds);
    } else {
        $video->actors()->detach(); // remove all actors if none provided
    }

    return redirect()->route('user.movies', $user->id)->with('success', '✅ Movie updated successfully!');
}
public function edit($id){
    $movie = Video::findOrFail($id);
    $categories = Category::all();
    $actors = Actor::all();
    if (!$movie) {
        return response()->json(['message' => 'Video not found'], 404);
    }
    return view('video-edit', compact('movie', 'categories', 'actors'));
}
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }

        $video->delete();
        return redirect()->back()->with('success', '✅ Movie deleted successfully!');
    }
public function store(Request $request)
{
    $user = Auth::user();

    if (!in_array($user->role, ['admin', 'content_creator'])) {
        return redirect()->back()->with('error', '❌ You are not authorized to add movies.');
    }

    // Convert actors string to array
    if ($request->has('actors')) {
        $request->merge([
            'actors' => array_filter(explode(',', $request->actors))
        ]);
    }

    $validated = $request->validate([
        'title' => 'required|string|max:150',
        'description' => 'nullable|string',
        'video_url' => 'required|url',
        'price' => 'nullable|numeric|min:0',
        'distribution' => 'required|in:festival_only,public,library',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'production_year' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
        'duration' => 'nullable|string|max:50',
        'category_id' => 'nullable|exists:categories,id',
        'actors' => 'nullable|array',
        'actors.*' => 'exists:actors,name',

        // Festival validation only if selected
        'festival_title' => 'required_if:distribution,festival_only|string|max:255',
        'organizer_name' => 'nullable|string|max:255',
        'organizer_phone' => 'nullable|string|max:50',
        'location' => 'nullable|string|max:255',
        'longitude' => 'nullable|numeric',
        'latitude' => 'nullable|numeric',
        'starting_date' => 'nullable|date',
        'ending_date' => 'nullable|date|after_or_equal:starting_date',
    ]);

    // Handle picture upload
    if ($request->hasFile('picture')) {
        $image = $request->file('picture');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $validated['picture'] = $imageName;
    }

    // Set content creator
    $validated['creator_id'] = $user->contentCreator?->id ?? null;

    // Save video
    $movie = Video::create($validated);

    // Attach actors
    if (!empty($validated['actors'])) {
        $actorIds = Actor::whereIn('name', $validated['actors'])->pluck('id')->toArray();
        $movie->actors()->sync($actorIds);
    }

    // Save festival if distribution is "festival_only"
    if ($request->distribution === 'festival_only') {
        FestivalVideo::create([
            'video_id' => $movie->id,
            'title' => $request->festival_title,
            'organizer_name' => $request->organizer_name,
            'organizer_phone' => $request->organizer_phone,
            'location' => $request->location,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'starting_date' => $request->starting_date,
            'ending_date' => $request->ending_date,
        ]);
    }

    return redirect()->route('video-index')->with('success', '🎬 Movie added successfully!');
}



    public function watchLater()
    {
        // Logic to show watch later videos
        return view('watch_later');
    }
public function videosByCategory($id)
{  $videosall = Video::whereNotNull('category_id')->get();
$count = $videosall->count();
    $categories = Category::all();

    // Count videos per category
    $categoryCounts = Video::groupBy('category_id')
        ->selectRaw('category_id, COUNT(*) as count')
        ->pluck('count', 'category_id');

    // Get videos for selected category
    $videos = Video::where('category_id', $id)->get();

    return view('video-index', compact('categories', 'videos', 'categoryCounts', 'count'));
}
public function home()
{
    $actors = Actor::all()->take(6);
    $videos = Video::latest()->take(4)->get();
    $videos1 = Video::latest()->take(4)->get();
    $festivals = FestivalVideo::latest()->take(3)->get();
   $sliders = Slider::with('video')
                     ->orderBy('position', 'asc')
                     ->get();
    return view('home', compact('actors', 'videos', 'videos1', 'festivals', 'sliders'));
}
public function create()
{
    $categories = Category::all();
    $actors = Actor::all();
    return view('create-video', compact('categories', 'actors'));
}

function convertYouTubeUrlToEmbed($url) {
    $parts = parse_url($url);

    // Check for standard YouTube URLs
    if (isset($parts['host']) && (strpos($parts['host'], 'youtube.com') !== false)) {
        parse_str($parts['query'], $query);
        if (isset($query['v'])) {
            return 'https://www.youtube.com/embed/' . $query['v'];
        }
    }

    // Check for shortened youtu.be URLs
    if (isset($parts['host']) && strpos($parts['host'], 'youtu.be') !== false) {
        $videoId = ltrim($parts['path'], '/');
        return 'https://www.youtube.com/embed/' . $videoId;
    }

    // fallback: return original URL (not embeddable)
    return $url;
}

}

