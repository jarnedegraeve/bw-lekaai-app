<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function profile($name)
    {
        $user = User::where('name', $name)->firstOrFail();
        //a variable with posts that the user has liked
        $posts = $user->likes->pluck('post_id')->toArray();

        return view('user.profile', compact('user', 'posts'));
    }
}
