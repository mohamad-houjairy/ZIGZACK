<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Video;

class ActorController extends Controller
{
    public function index()
    {
        // Logic to list actors
        // This could be a paginated list or a simple list of actors
        $actors= Actor::all();
        return view('actor-index', compact('actors'));
    }
 public function show($id)
    {
        $actor = Actor::findOrFail($id);
        if (!$actor) {
            return response()->json(['error' => 'Actor not found'], 404);
        }

        return view('actor-info', compact('actor' ));
    }
    public function store(Request $request)
    {
        // Logic to create a new actor
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'birthdate' => 'nullable|date',
        ]);
        $actor = Actor::create($request->all());
        return response()->json($actor, 201);
    }
    public function update(Request $request, $id)
    {
        // Logic to update an existing actor
        $actor = Actor::findOrFail($id);
        if (!$actor) {
            return response()->json(['error' => 'Actor not found'], 404);
        }
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'bio' => 'nullable|string',
            'birthdate' => 'nullable|date',
        ]);
        $actor->update($request->all());
        return response()->json($actor);
    }
    public function destroy($id)
    {
        // Logic to delete an existing actor
        $actor = Actor::findOrFail($id);
        if (!$actor) {
            return response()->json(['error' => 'Actor not found'], 404);
        }
        $actor->delete();
        return response()->json(['message' => 'Actor deleted successfully']);
    }

}
