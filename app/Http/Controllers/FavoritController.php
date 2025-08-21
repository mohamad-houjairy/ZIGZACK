<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Favorite;

class FavoritController extends Controller
{
    public function index()
    {
            if (!auth()->check()) {
        return redirect()->route('login')
                         ->with('error', 'You must be logged in to add favorites.');
    }
         $userId = auth()->id();

    $favorites = Video::whereHas('favorites', function ($query) use ($userId) {
        $query->where('user_id', $userId);
    })->with('festival')->get();

        return view('watch_later', compact('favorites'));
    }
 public function store(Request $request, $videoId)
{
    $exists = Favorite::where('user_id', auth()->id())
                      ->where('video_id', $videoId)
                      ->exists();

    if ($exists) {
        return back()->with('error', 'This video is already in your favorites!');
    }

    $favorite = new Favorite();
    $favorite->user_id = auth()->id();
    $favorite->video_id = $videoId;
    $favorite->save();

    return back()->with('success', 'Added to favorites!');
}

public function destroy($id)
{
    $favorite = Favorite::where('user_id', auth()->id())
                        ->where('video_id', $id)
                        ->firstOrFail();

    $favorite->delete();

    return back()->with('success', 'Removed from favorites!');
}

}

