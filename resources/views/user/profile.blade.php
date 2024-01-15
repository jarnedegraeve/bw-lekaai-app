@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

  
                <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="{{ asset('storage/'.$user->profile_image) }}"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
         
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
              <h5>{{$user-> name}}</h5>
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted">{{$user-> email}}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>birthday</h6>
                    <p class="text-muted">{{$user->date_of_birth}}</p>
                  </div>
                </div>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>about me</h6>
                    <p class="text-muted">{{$user->about}}</p>
                  </div>

                  <br>
                  @if (auth()->check() && (auth()->user()->id == $user->id || auth()->user()->is_admin))
                  <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#editProfileModal">
                  <a href="{{ route('edit_profile', ['name' => $user->name, 'user_id' => $user->id]) }}">Edit Profile</a>


                 </button>
                 @if (auth()->check() && auth()->user()->is_admin)
    <!-- Button to toggle admin status -->
    <form method="post" action="{{ route('toggle_admin', $user->id) }}">
        @csrf
        @method('put')
        <button type="submit" class="btn btn-primary">
            {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}
        </button>
    </form>
@endif
                    @endif

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



                
              
               

                </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
