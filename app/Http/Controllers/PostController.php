<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index()
    {
        $posts = Post::latest()->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Handle image upload
        $imagePath = $request->file('image')->store('public/images');
    
        // Create a new Post instance
        $post = new Post();
        $post->title = $validated['title'];
        $post->message = $validated['content'];
        $post->user_id = auth::user()->id;
    
        // Store image path in the database
        $post->cover_image = str_replace('public/', '', $imagePath);
        $post->save();
    
        return redirect()->route('index')->with('status', 'Post created!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if (Auth::user()->id == $post->user_id) {
            return view('post.edit', compact('post'));
        } else {
            return redirect()->route('index')->with('status', 'You are not allowed to edit this post!');
        }

    }

    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
        ]);

        
        if (Auth::user()->id == $post->user_id) {
            $post->title = $validated['title'];
            $post->message = $validated['content'];
            $post->save();
            return redirect()->route('index')->with('status', 'Post updated!');
        } else {
            return redirect()->route('index')->with('status', 'You are not allowed to edit this post!');
        }

    }


}
