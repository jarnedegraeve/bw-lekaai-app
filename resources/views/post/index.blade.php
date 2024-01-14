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
                        <div >
                            <p>{{$post->message}}</p>
                        </div>
                        <br>
                            <small>Posted by: <a href="{{route('profile',$post->user->name) }}"> {{$post->user->name}}</a> op {{$post->created_at->format('d/m/Y \o\m H:i') }} </small>
                            @auth
                            @if(Auth::user()->id == $post->user_id)
                            <a href="{{route('post.edit',$post->id) }}">edit post</a>
                            @else
                            <a href="{{ route('like',$post->id)}}">Like post</a>
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
@endsection
