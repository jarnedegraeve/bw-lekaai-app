<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Change the base class

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller // Fix the class name
{
    // Controller method
    public function show($postId)
    {
        $post = Post::with('comments.user')->find($postId);

        return view('posts.show', compact('post'));
    }

    public function storeComment(CommentRequest $request, $postId)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add a comment.');
        }
    
        $post = Post::findOrFail($postId);
    

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->post_id = $post->id;
        $comment->message = $request->input('message');
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
