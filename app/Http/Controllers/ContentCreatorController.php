<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentCreator;

class ContentCreatorController extends Controller
{
    public function index()
    {
        $contentCreators = ContentCreator::all();
        if ($contentCreators->isEmpty()) {
            return response()->json(['message' => 'No content creators found'], 404);
        }
        return response()->json($contentCreators);
    }

    public function show($id)
    {
        $contentCreator = ContentCreator::find($id);
        if ($contentCreator) {
            return response()->json($contentCreator);
        }
        return response()->json(['message' => 'Content Creator not found'], 404);
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'bio' => 'required|string|max:255',
            'profile_image' => 'nullable|image|max:2048', // Optional image validation
        ]);
        // Create a new content creator
        $contentCreator = ContentCreator::create($validatedData);
        return response()->json($contentCreator, 201);
    }

    public function update(Request $request, $id)
    {
        $contentCreator = ContentCreator::find($id);
        if (!$contentCreator) {
            return response()->json(['message' => 'Content Creator not found'], 404);
        }

        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'bio' => 'required|string|max:255',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $contentCreator->update($validatedData);
        return response()->json($contentCreator);
    }

    public function destroy($id)
    {
        $contentCreator = ContentCreator::find($id);
        if (!$contentCreator) {
            return response()->json(['message' => 'Content Creator not found'], 404);
        }

        $contentCreator->delete();
        return response()->json(['message' => 'Content Creator deleted successfully']);
    }
    }

