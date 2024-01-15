@extends('layouts.app')

@section('content')
    <h1>Create FAQ Item</h1>

    <form action="{{ route('faq.store_item', $category) }}" method="POST">
        @csrf
        <label for="question">Question</label>
        <input type="text" name="question" required>
        <br>
        <label for="answer">Answer</label>
        <textarea name="answer" required></textarea>
        <br>
        <button type="submit">Create FAQ Item</button>
    </form>
@endsection
