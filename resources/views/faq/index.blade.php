@extends('layouts.app')

@section('content')

    <h1>FAQ Categories</h1>

    @auth
        @if(auth()->user()->is_admin)
            <a href="{{ route('faq.create') }}">Add FAQ Category</a>
        @endif
    @endauth

    @if ($categories !== null && count($categories) > 0)
        @foreach ($categories as $category)
            <div>
                <h2>{{ $category->name }}</h2>
                <p>{{ $category->description }}</p>
                <a href="{{ route('faq.edit', $category) }}">Edit</a>

                <form action="{{ route('faq.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>

                <h3>FAQ Items</h3>


                @if ($category->items !== null && count($category->items) > 0)
    @foreach ($category->items as $item)

    <p>{{ $item->question }}</p>
    <p>{{ $item->answer }}</p>
    <a href="{{ route('faq.edit_item', [$category, $item]) }}">Edit</a>

    <form action="{{ route('faq.destroy_item', [$category, $item]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endforeach

                @else
                    <p>No FAQ items found for this category.</p>
                @endif

                <a href="{{ route('faq.create_item', $category) }}">Add FAQ Item</a>
            </div>
        @endforeach
    @else
        <p>No FAQ categories found.</p>
    @endif

@endsection
