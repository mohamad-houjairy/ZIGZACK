<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {

       $validatedData = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users',
           'password' => 'required|string|min:8|confirmed',
       ]);

       $user = User::create([
           'name' => $validatedData['name'],
           'email' => $validatedData['email'],
           'password' => Hash::make($validatedData['password']),
       ]);
       $token = $user->createToken('token')->plainTextToken;

       return response()->json(['message' => 'User registered successfully', 'user' => $user, 'token' => $token], 201);
    }
public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

      if (!Auth::attempt($credentials)) {
    return response()->json(['message' => 'email or password is incorrect'], 401);
}

$user = User::where('email', $credentials['email'])->first();
$token = $user->createToken('token')->plainTextToken;


        return response()->json(['message' => 'Login successful', 'user' => $user, 'token' => $token]);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json(['message' => 'Logout successful']);
    }
}
