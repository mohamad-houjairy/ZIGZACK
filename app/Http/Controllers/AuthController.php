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

         return redirect()->route('login')->with('success', 'Registration successful!');}
public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

      if (!Auth::attempt($credentials)) {

      return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'));
}

$user = User::where('email', $credentials['email'])->first();
$token = $user->createToken('token')->plainTextToken;


         return redirect()->route('login')->with('success', 'Login successful!');
    }
    // public function test(){
    //     return view('auth.login');
    // }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json(['message' => 'Logout successful']);
    }
    public function enter(){
        return view('Auth.login');
    }
      public function enter1(){
        return view('Auth.register');
    }
    public function enterResetPassword(){
        return view('Auth.reset_pass');
    }
}
