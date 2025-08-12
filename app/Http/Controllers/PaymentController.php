<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        // Logic to list payments
        return response()->json(Payment::all());
    }

    public function show($id)
    {
        // Logic to show a specific payment
        $payment = Payment::findOrFail($id);
        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }
        return response()->json($payment);
    }

    public function store(Request $request)
    {
        // Logic to create a new payment
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'video_id' => 'required|integer|exists:videos,id',
            'subscription_id' => 'required|integer|exists:subscriptions,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:255',
            'status' => 'required|string|in:pending,completed,failed',
        ]);
        $payment = Payment::create($request->all());
        return response()->json($payment, 201);
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing payment
        $payment = Payment::findOrFail($id);
        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }
        $request->validate([
            'user_id' => 'sometimes|required|integer|exists:users,id',
            'video_id' => 'sometimes|required|integer|exists:videos,id',
            'subscription_id' => 'sometimes|required|integer|exists:subscriptions,id',
            'amount' => 'sometimes|required|numeric|min:0',
            'payment_method' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|string|in:pending,completed,failed',
        ]);
        $payment->update($request->all());
        return response()->json($payment);
    }

    public function destroy($id)
    {
        // Logic to delete an existing payment
        $payment = Payment::findOrFail($id);
        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }
        $payment->delete();
        return response()->json(['message' => 'Payment deleted successfully']);
    }
}
