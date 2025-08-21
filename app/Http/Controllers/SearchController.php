<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Actor;
use App\Models\Festival;
use App\Models\FestivalVideo;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        // Search Videos by title
        $videos = Video::where('title', 'like', "%{$query}%")->get();

        // Search Actors by name
        $actors = Actor::where('name', 'like', "%{$query}%")->get();


        return view('search-results', compact('query', 'videos', 'actors'));
    }
}
