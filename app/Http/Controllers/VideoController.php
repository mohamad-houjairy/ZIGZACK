<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        if ($videos->isEmpty()) {
            return response()->json(['message' => 'No videos found'], 404);
        }
        return response()->json($videos);
    }
    public function show($id)
    {
        $video = Video::findOrFail($id);
        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }
        return response()->json($video);
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

    public function info()
    {
        // Logic to show video information
        return view('video_info');
    }
    public function watchLater()
    {
        // Logic to show watch later videos
        return view('watch_later');
    }
}
