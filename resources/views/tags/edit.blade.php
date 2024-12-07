@extends('layouts.app')

@section('title', 'Edit Tag')

@section('content')
<h1>Edit Tag</h1>

<form action="{{ route('tags.update', $tag) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Tag Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $tag->name }}" required>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
