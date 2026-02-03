<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'is_published' => 'boolean',
        ]);

        $imagePath = $request->file('image')->store('articles', 'public');

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $imagePath,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') ? now() : null,
        ]);

        return redirect()->route('admin.article.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'is_published' => 'boolean',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
        ];

        // Update published_at when changing published status
        if ($request->has('is_published') && !$article->is_published) {
            $data['published_at'] = now();
        } elseif (!$request->has('is_published')) {
            $data['published_at'] = null;
        }

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.article.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('admin.article.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }

    // Toggle publish status
    public function togglePublish(Article $article)
    {
        $article->update([
            'is_published' => !$article->is_published,
            'published_at' => !$article->is_published ? now() : null,
        ]);

        $status = $article->is_published ? 'dipublikasikan' : 'diunpublish';
        return back()->with('success', "Artikel berhasil {$status}!");
    }
}