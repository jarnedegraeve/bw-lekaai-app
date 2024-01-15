@extends('layouts.app')

@section('content')
    <h1>Edit FAQ Category</h1>

    <form action="{{ route('faq.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $category->name }}" required>
        <br>
        <label for="description">Description</label>
        <textarea name="description" required>{{ $category->description }}</textarea>
        <br>
        <button type="submit">Update FAQ Category</button>
    </form>
@endsection
