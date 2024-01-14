<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function editProfile(User $user)
    {
        // Check if the user exists
        if (!$user) {
            return redirect()->route('profile', $user->name)->with('error', 'User not found!');
        }
    
        // Only allow the user or an admin to edit the profile
        if ($user->id !== auth()->user()->id && !auth()->user()->is_admin) {
            return redirect()->route('profile', $user->name)->with('error', 'You are not allowed to edit this profile!');
        }
    
        return view('user.edit', compact('user'));
    }
    


    public function updateProfile(Request $request, User $user)
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

    if (!auth()->user()->is_admin || !$request->has('user_id')) {
        // Admin is updating another user's profile, validate and update the profile data
        // ...
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->about = $request->input('about');
    
        return redirect()->route('admin.edit_profile', $user)->with('success', 'Profile updated successfully!');
    }

    // If the authenticated user is not an admin or trying to update their own profile,
    // perform the update based on the authenticated user's ID
    $user = User::findOrFail(auth()->user()->id);
    $user->fill($request->except(['_token', '_method']));
    // Update other fields as needed

    $user->save();

    return redirect()->route('admin.edit_profile', $user)->with('success', 'Profile updated successfully!');
}


}
