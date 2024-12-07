@extends('layouts.app')

@section('title', 'Create Tag')

@section('content')
<h1>Create Tag</h1>

<form action="{{ route('tags.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Tag Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
