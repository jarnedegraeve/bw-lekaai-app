@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<form method="POST" action="{{ route('update_profile') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Include user_id as a hidden field in your form -->
<input type="hidden" name="user_id" value="{{ $user->id }}">

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
    </div>

    <!-- Date of Birth -->
    <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $user->date_of_birth }}">
    </div>

    <!-- Profile Image -->
    <div class="mb-3">
        <label for="profile_image" class="form-label">Profile Image</label>
        <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*">
        @if ($user->profile_image)
            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Current Profile Image" style="max-width: 100px; margin-top: 10px;">
        @endif
    </div>

    <!-- About (optional) -->
    <div class="mb-3">
        <label for="about" class="form-label">About Me</label>
        <textarea class="form-control" id="about" name="about">{{ $user->about }}</textarea>
    </div>

<!-- Is Admin (only visible to administrators) -->
@if (auth()->user()->is_admin)
    <div class="mb-3">
        <label for="is_admin" class="form-check-label">
            <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" {{ $user->is_admin ? 'checked' : '' }}>
            Is Admin
        </label>
    </div>
@endif



    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection