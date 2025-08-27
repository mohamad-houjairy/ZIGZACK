<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContentCreator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        if ($users->isEmpty()) {
            return response()->json(['message' => 'No users found'], 404);
        }
        return response()->json($users);
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }
public function update(Request $request)
{
    $user = Auth::user(); // Authenticated user (Eloquent model)

    $validated = $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }
        // Store new image
        $validated['image'] = $request->file('image')->store('profile_images', 'public');
    }


/** @var \App\Models\User $user */
$user = Auth::user();

$user->update($validated);
if ($user->role === 'content_creator') {
        $validatedCreator = $request->validate([
            'bio' => 'nullable|string|max:1000',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle creator profile image
        if ($request->hasFile('profile_image')) {
            if ($user->contentCreator && $user->contentCreator->profile_image) {
                Storage::disk('public')->delete($user->contentCreator->profile_image);
            }
            $validatedCreator['profile_image'] = $request->file('profile_image')->store('creator_profiles', 'public');
        }

        ContentCreator::updateOrCreate(
            ['user_id' => $user->id],
            $validatedCreator
        );
    }

    return redirect()
        ->route('profile.edit')
        ->with('success', '✅ Profile updated successfully.');
}
    public function destroy($id)
    {
        $user = User::findOrFail($id);
           if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|image|max:2048',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }
    public function edit()
    {
        $user = auth()->user();
        return view('profile-edit', compact('user'));
    }
public function userMovies($userId)
{
    // Get movies created by the given user and eager load category if needed
    $movies = \App\Models\Video::where('creator_id', $userId)
                ->orderBy('created_at', 'desc')
                ->get()
                ->groupBy('distribution'); // group by type

    return view('user-movies', compact('movies'));
}

}
