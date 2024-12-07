<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('articles.index') }}">Articles</a>
        <a href="{{ route('categories.index') }}">Categories</a>
        <a href="{{ route('tags.index') }}">Tags</a>
        <a href="{{ route('about') }}">About</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
