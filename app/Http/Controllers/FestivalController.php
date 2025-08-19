<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FestivalController extends Controller
{
    public function index()
    {
        return view('festival-index');
    }

    public function show($id)
    {
        return view('festival');
    }
}
