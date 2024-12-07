@extends('layouts.app')

@section('content')
<h1>{{ $article->title }}</h1>
<p>{{ $article->full_text }}</p>
<p>Category: {{ $article->category->name }}</p>
<p>Tags:
    @foreach($article->tags as $tag)
        {{ $tag->name }}
    @endforeach
</p>
<a href="{{ route('articles.index') }}">Back</a>
@endsection
