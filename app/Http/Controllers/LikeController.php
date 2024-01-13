<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Auth;
class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($postid, Request $request)
    {

        $post = Post::findOrFail($postid);
        if ($post->user_id == Auth::user()->id) {
            return redirect()->route('index')->with('status', 'You are not allowed to like your own post!');
        }

        $like = Like::where('user_id', Auth::user()->id)->where('post_id', $postid)->first();
        if ($like != null) {
            return redirect()->route('index')->with('status', 'You already liked this post!');
        }

        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->post_id = $postid;
        $like->save();

        return redirect()->route('index')->with('status', 'Post liked!');
    }
}
