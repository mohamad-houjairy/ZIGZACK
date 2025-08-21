<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FestivalVideo;

class FestivalController extends Controller
{
    public function index()
    {
        $festivals = FestivalVideo::all();
        return view('festival-index', compact('festivals'));
    }

    public function show($id)
    {
        // Fetch the festival by ID
        $festival = FestivalVideo::findOrFail($id);
        return view('festival', compact('festival'));
    }
}
