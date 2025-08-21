<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {

        // Code to display a list of reviews
        $reviews = Review::all();
        if ($reviews->isEmpty()) {
            return response()->json(['message' => 'No reviews found'], 404);
        }
        return response()->json($reviews);
    }



 public function storeReview(Request $request, $id)
{
    $validatedData = $request->validate([
        'comment' => 'required|string',
        'rating'  => 'required|integer|between:1,5',
    ]);

    // Save review with current user and video id
    $review = Review::create([
        'user_id'  => auth()->id(),
        'video_id' => $id,
        'comment'  => $validatedData['comment'],
        'rating'   => $validatedData['rating'],
    ]);

    return redirect()->back()->with('success', 'Review added successfully!');
}

public function destroy($id)
{
    // Code to delete a review
    $review = Review::find($id);
    if (!$review) {
        return response()->json(['message' => 'Review not found'], 404);
    }
    $review->delete();
    return response()->json(['message' => 'Review deleted successfully']);
}
public function show($id)
{
    // Code to display a single review
    $review = Review::find($id);
    if ($review) {
        return response()->json($review);
    }
    return response()->json(['message' => 'Review not found'], 404);
}
public function update(Request $request, $id)
{
    // Code to update a review
    $review = Review::find($id);
    if (!$review) {
        return response()->json(['message' => 'Review not found'], 404);
    }

    $validatedData = $request->validate([
        'user_id' => 'required|integer|exists:users,id',
        'video_id' => 'required|integer|exists:videos,id',
        'comment' => 'required|string',
        'rating' => 'required|integer|between:1,5',
    ]);

    $review->update($validatedData);
    return response()->json($review);
}
}
