@extends('layouts.admin')

@section('title', 'Preview Artikel')
@section('header', 'Preview Artikel')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('admin.article.index') }}" class="text-primary hover:text-primary/80 font-semibold">
        &larr; Kembali ke Daftar Artikel
    </a>
    <div class="flex space-x-2">
        <a href="{{ route('admin.article.edit', $article) }}" 
           class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
            Edit Artikel
        </a>
        <a href="{{ route('article.detail', $article->slug) }}" 
           target="_blank"
           class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">
            Lihat di Website
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Article Header -->
    <div class="bg-primary text-white p-8">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center text-secondary">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                </svg>
                {{ $article->published_at ? $article->published_at->format('d F Y') : 'Belum dipublikasikan' }}
            </div>
            @if($article->is_published)
                <span class="px-4 py-2 bg-green-500 text-white rounded-full text-sm font-semibold">
                    Published
                </span>
            @else
                <span class="px-4 py-2 bg-yellow-500 text-white rounded-full text-sm font-semibold">
                    Draft
                </span>
            @endif
        </div>
        <h1 class="text-4xl font-bold">{{ $article->title }}</h1>
    </div>

    <!-- Article Content -->
    <div class="p-8">
        <!-- Featured Image -->
        <div class="mb-8 rounded-lg overflow-hidden">
            <img src="{{ asset('storage/' . $article->image) }}" 
                 alt="{{ $article->title }}" 
                 class="w-full h-auto object-cover">
        </div>

        <!-- Excerpt -->
        @if($article->excerpt)
        <div class="mb-8 p-6 bg-secondary/20 rounded-lg border-l-4 border-primary">
            <p class="text-lg text-gray-700 italic">{{ $article->excerpt }}</p>
        </div>
        @endif

        <!-- Content -->
        <div class="prose prose-lg max-w-none">
            <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                {{ $article->content }}
            </div>
        </div>

        <!-- Meta Information -->
        <div class="mt-8 pt-8 border-t border-gray-200">
            <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                <div>
                    <strong>Slug:</strong> {{ $article->slug }}
                </div>
                <div>
                    <strong>Dibuat:</strong> {{ $article->created_at->format('d M Y H:i') }}
                </div>
                <div>
                    <strong>Terakhir Update:</strong> {{ $article->updated_at->format('d M Y H:i') }}
                </div>
                @if($article->published_at)
                <div>
                    <strong>Dipublikasikan:</strong> {{ $article->published_at->format('d M Y H:i') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .prose {
        font-size: 1.125rem;
        line-height: 1.75;
    }
</style>
@endsection