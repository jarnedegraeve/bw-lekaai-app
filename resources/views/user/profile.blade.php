@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profiel van {{$user-> name}}</div>

                <div class="card-body">
                
              
                <div class="card">
                    <div class="card-body">
                        <h3>About</h3>
                        <p>{{$user->about}}</p>
                    </div>
                
              
                <div class="card">
                    <div class="card-body">
                        <h3>liked events</h3>
                        @foreach($posts as $post)
                        <div class="card">
                            <div class="card-body">
                                <h3>{{$post->title}}</h3>
                            </div>
                            <div >
                                <p>{{$post->message}}</p>
                            </div>
                            <br>
                                <small>Posted by: {{$post->user->name}} op {{$post->created_at->format('d/m/Y \o\m H:i') }} </small>
                                @auth
                                @if(Auth::user()->id == $post->user_id)
                                <a href="{{route('post.edit',$post->id) }}">edit post</a>
                                @else
                                <a href="{{ route('like',$post_id)}}">Like post</a>
                                @endif
                                
                                @endauth
                                post heeft {{$post->likes()->count()}} likes
                            </div>
                        @endforeach
                    </div>

                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
