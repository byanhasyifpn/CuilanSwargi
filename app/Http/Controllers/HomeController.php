<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Accommodation;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->get();
        return view('gallery', compact('galleries'));
    }

    public function accommodation()
    {
        $accommodations = Accommodation::with('images')->get();
        return view('accommodation', compact('accommodations'));
    }

    public function articles()
    {
        $articles = Article::published()
            ->latest('published_at')
            ->paginate(9);
        return view('articles.index', compact('articles'));
    }

    public function articleDetail($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        
        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}