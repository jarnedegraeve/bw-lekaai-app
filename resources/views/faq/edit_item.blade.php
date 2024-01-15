@extends('layouts.app')

@section('content')
    <h1>Edit FAQ Item</h1>

    <form action="{{ route('faq.update_item', [$category, $item]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="question">Question</label>
        <input type="text" name="question" value="{{ $item->question }}" required>
        <br>
        <label for="answer">Answer</label>
        <textarea name="answer" required>{{ $item->answer }}</textarea>
        <br>
        <button type="submit">Update FAQ Item</button>
    </form>
@endsection
