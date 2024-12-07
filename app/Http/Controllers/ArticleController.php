<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // List all articles
    public function index()
    {
        $articles = Article::with('category')->paginate(10);
        return view('articles.index', compact('articles'));
    }

    // Show single article
    public function show($id)
    {
        $article = Article::with('tags', 'category')->findOrFail($id);
        return view('articles.show', compact('article'));
    }

    // Admin: Show form to create new article
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories', 'tags'));
    }

    // Store new article
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'full_text' => 'required',
            'category_id' => 'required',
            'tags' => 'array'
        ]);

        $article = Article::create($data);
        $article->tags()->sync($request->tags);

        return redirect()->route('articles.index');
    }

    // Edit article
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    // Update article
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'full_text' => 'required',
            'category_id' => 'required',
            'tags' => 'array'
        ]);

        $article = Article::findOrFail($id);
        $article->update($data);
        $article->tags()->sync($request->tags);

        return redirect()->route('articles.index');
    }

    // Delete article
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index');
    }
}
