@extends('layouts.app')

@section('content')
<h1>Create New Article</h1>

<form action="{{ route('articles.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div>
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" required>
            <option value="" disabled selected>Choose a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Tags</label><br>
        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->name }}
        @endforeach
    </div>

    <div>
        <label for="full_text">Content</label>
        <textarea name="full_text" id="full_text" rows="5" required></textarea>
    </div>

    <button type="submit">Save Article</button>
</form>
@endsection
