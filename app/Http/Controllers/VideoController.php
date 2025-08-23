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
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }
        $video->update($request->all());
        return response()->json($video);
    }
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }

        $video->delete();
        return response()->json(['message' => 'Video deleted successfully']);
    }
public function store(Request $request)
{
    $user = Auth::user();

    // Only admin or content creators can add movies
    if (!in_array($user->role, ['admin', 'content_creator'])) {
        return redirect()->back()->with('error', '❌ You are not authorized to add movies.');
    }

    // Convert comma-separated actors string to array
    if ($request->has('actors')) {
        $request->merge([
            'actors' => array_filter(explode(',', $request->actors)) // remove empty values
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
        'actors.*' => 'exists:actors,name', // match against name if you send names
    ]);

    // Upload picture if exists
    if ($request->hasFile('picture')) {
        $validated['picture'] = $request->file('picture')->store('thumbnails', 'public');
    }

    // Automatically set the content creator as the logged-in user
    $validated['creator_id'] = $user->contentCreator?->id ?? null;

    $movie = Video::create($validated);

    // Attach actors if provided
    if (!empty($validated['actors'])) {
        $actorIds = Actor::whereIn('name', $validated['actors'])->pluck('id')->toArray();
        $movie->actors()->sync($actorIds);
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
}

