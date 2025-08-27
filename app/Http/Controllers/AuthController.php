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
        'role' => 'required|string|in:content_creator,user',
    ]);

    // Create user
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'role' => $validatedData['role'],
    ]);

    // If role is content_creator -> also insert in content_creators table
    if ($validatedData['role'] === 'content_creator') {
        \App\Models\ContentCreator::create([
            'user_id' => $user->id,
            'bio' => null, // default values
            'profile_image' => null,
        ]);
    }

    Auth::login($user);

    return redirect()->route('home')->with('success', 'Registration successful!');
}


public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

      if (!Auth::attempt($credentials)) {

      return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
}

$user = User::where('email', $credentials['email'])->first();
$token = $user->createToken('token')->plainTextToken;


         return redirect()->route('home')->with('success', 'Login successful!');
    }
    // public function test(){
    //     return view('auth.login');
    // }
    public function logout(Request $request)
    {Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'Logged out successfully!');
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
