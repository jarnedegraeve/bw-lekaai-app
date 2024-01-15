<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile($name)
    {
        $user = User::where('name', $name)->firstOrFail();
        $posts = $user->likes->pluck('post_id')->toArray();

        return view('user.profile', compact('user', 'posts'));
    }

    public function editProfile($name, $user_id)
    {
        $user = User::where('name', $name)->find($user_id);
    
        // Check if the user exists
        if (!$user) {
            return redirect()->route('profile', $name)->with('error', 'User not found!');
        }
    
        // Only allow the user or an admin to edit the profile
        if ($user->id !== auth()->user()->id && !auth()->user()->is_admin) {
            return redirect()->route('profile', $name)->with('error', 'You are not allowed to edit this profile!');
        }
    
        return view('user.edit', compact('user'));
    }
    
    

    public function updateProfile(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . auth()->user()->id,
        'date_of_birth' => 'required|date',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'about' => 'nullable|string',
        'user_id' => 'nullable|exists:users,id',
        'is_admin' => 'nullable|boolean',
    ]);

    // Retrieve the user to be updated
    $user = User::findOrFail(auth()->user()->id);

    // Check authorization
    if (auth()->user()->is_admin && $request->has('user_id')) {
        // Admin is updating another user's profile
        $user = User::findOrFail($request->input('user_id'));
    }

    // Update user data
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->date_of_birth = $request->input('date_of_birth');
    $user->about = $request->input('about');

    // Check if the user uploaded a new profile image
    if ($request->hasFile('profile_image')) {
        // Delete the old profile image if exists
        if ($user->profile_image) {
            Storage::delete($user->profile_image);
        }

        // Store the new profile image
        $profileImage = $request->file('profile_image')->store('public/images');
        $user->profile_image = str_replace('public/', '', $profileImage);
    }

    // Set is_admin based on the presence of 'is_admin' in the request
    $user->is_admin = $request->has('is_admin') && $request->input('is_admin') == 1;

    // Save the changes
    $user->save();

    // Redirect back to the profile page with a success message
    return redirect()->route('profile', $user->name)->with('success', 'Profile updated successfully!');
}

public function toggleAdmin($user_id)
{
    $user = User::findOrFail($user_id);

    // Check if the authenticated user is an admin
    if (auth()->user()->is_admin) {
        // Toggle the admin status
        $user->is_admin = !$user->is_admin;
        $user->save();

        return redirect()->route('profile', $user->name)->with('status', 'Admin status updated successfully!');
    } else {
        return redirect()->route('profile', $user->name)->with('status', 'You are not allowed to update admin status!');
    }
}


    
    
}

