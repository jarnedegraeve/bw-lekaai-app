@extends('layouts.app')

@section('content')
    <h1>Create FAQ Category</h1>

    <form action="{{ route('faq.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" required>
        <br>
        <label for="description">Description</label>
        <textarea name="description" required></textarea>
        <br>
        <button type="submit">Create FAQ Category</button>
    </form>
@endsection
