<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        // Logic to return a list of subscriptions
        $subscriptions = Subscription::all();
        if ($subscriptions->isEmpty()) {
            return response()->json(['message' => 'No subscriptions found'], 404);
        }
        return response()->json(['subscriptions' => $subscriptions]);
    }
    public function show($id)
    {
        // Logic to return a specific subscription by ID
        $subscription = Subscription::findOrFail($id);
        return response()->json(['subscription' => $subscription]);
    }
public function update(Request $request, $id)
{
    $subscription = Subscription::findOrFail($id);
if (!$subscription) {
        return response()->json(['message' => 'Subscription not found'], 404);
    }
    $validatedData = $request->validate([
        'user_id' => 'sometimes|exists:users,id',
        'type' => 'sometimes|in:monthly,yearly',
        'start_date' => 'sometimes|date',
        'end_date' => 'sometimes|date|after_or_equal:start_date',
        'status' => 'sometimes|in:active,cancelled,expired',
    ]);

    $subscription->update($validatedData);

    return response()->json(['subscription' => $subscription]);
}

    public function destroy($id)
    {
        // Logic to delete a specific subscription by ID
        $subscription = Subscription::findOrFail($id);
           if (!$subscription) {
            return response()->json(['message' => 'Subscription not found'], 404);
        }
        $subscription->delete();
        return response()->json(['message' => 'Subscription deleted successfully']);
    }
  public function store(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'type' => 'required|in:monthly,yearly',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'status' => 'in:active,cancelled,expired', // optional because default is 'active'
    ]);

    $subscription = Subscription::create($validatedData);

    return response()->json(['subscription' => $subscription], 201);
}

}
