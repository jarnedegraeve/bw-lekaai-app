@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('News') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
    <div class="card">
        <div class="card-body">
            <h3>{{$post->title}}</h3>
        </div>
        
        <div class="card-body">
            <img src="{{ asset('storage/'.$post->cover_image) }}" alt="image" style="width:100%;height:100%;">
        </div>
        <div>
            <p>{{$post->message}}</p>
        </div>
        <br>
        <small>Posted by: <a href="{{route('profile',$post->user->name) }}"> {{$post->user->name}}</a> op {{$post->created_at->format('d/m/Y \o\m H:i') }} </small>
        
        @auth
            @if(Auth::user()->id == $post->user_id)
                <a href="{{route('post.edit',$post->id) }}">edit post</a>
                <!-- Form for deleting a post -->
                <form method="post" action="{{ route('post.destroy', $post->id) }}" style="display:inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-link">Delete post</button>
                </form>
            @else
                <a href="{{ route('like',$post->id)}}">Like post</a>
            @endif
        @endauth
        post heeft {{$post->likes()->count()}} likes
    </div>
    

    <div class="container mt-4">
    <h4>Comments:</h4>

    @foreach ($post->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">{{ $comment->message }}</p>
                <small class="text-muted">
                    Commented by:
                    <a href="{{ route('profile', $comment->user->name) }}">{{ $comment->user->name }}</a>
                    on {{ $comment->created_at->format('d/m/Y \o\m H:i') }}
                </small>
            </div>
        </div>
    @endforeach

    @auth
        <div class="card mt-4">
            <div class="card-body">
                <form method="post" action="{{ route('comments.store', $post->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="message">Add a Comment:</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
        </div>
    @else
        <div class="card mt-4">
            <div class="card-body">
                <p class="card-text">Login to leave a comment.</p>
            </div>
        </div>
    @endauth
</div>



@endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
