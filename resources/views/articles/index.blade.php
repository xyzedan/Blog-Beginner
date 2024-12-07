@extends('layouts.app')

@section('content')
<h1>Articles</h1>

<a href="{{ route('articles.create') }}" class="btn btn-primary">Create New Article</a>

<table border="1" width="100%" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->category->name ?? 'Uncategorized' }}</td>
            <td>
                <a href="{{ route('articles.show', $article->id) }}">View</a>
                <a href="{{ route('articles.edit', $article->id) }}">Edit</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
