@extends('layouts.app')

@section('content')
<h1>Tags</h1>

<a href="{{ route('tags.create') }}" class="btn btn-primary">Create New Tag</a>

<table border="1" width="100%" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tags as $tag)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tag->name }}</td>
            <td>
                <a href="{{ route('tags.edit', $tag->id) }}">Edit</a>
                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
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
