<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Actor;
use App\Models\FestivalVideo;

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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video_url' => 'required|url',
            'creator_id' => 'required|exists:content_creators,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $video = Video::create($validatedData);

        return response()->json(['message' => 'Video created successfully', 'video' => $video], 201);
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
    $festivals = FestivalVideo::latest()->take(7)->get();
    return view('home', compact('actors', 'videos', 'videos1', 'festivals'));
}
}
