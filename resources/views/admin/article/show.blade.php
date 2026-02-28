@extends('layouts.admin')

@section('title', 'Preview Artikel')
@section('header', 'Preview Artikel')

@section('content')
<div class="mb-4 sm:mb-6 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 sm:gap-0">
    <a href="{{ route('admin.article.index') }}" class="text-primary hover:text-primary/80 font-semibold text-sm sm:text-base">
        &larr; Kembali ke Daftar Artikel
    </a>
    <div class="flex flex-wrap gap-2">
        <a href="{{ route('admin.article.edit', $article) }}" 
           class="bg-blue-500 text-white px-4 sm:px-6 py-2 rounded-lg hover:bg-blue-600 transition text-sm sm:text-base">
            Edit Artikel
        </a>
        <a href="{{ route('article.detail', $article->slug) }}" 
           target="_blank"
           class="bg-green-500 text-white px-4 sm:px-6 py-2 rounded-lg hover:bg-green-600 transition text-sm sm:text-base">
            Lihat di Website
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Article Header -->
    <div class="bg-primary text-white p-5 sm:p-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
            <div class="flex items-center text-secondary text-sm">
                <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                </svg>
                {{ $article->published_at ? $article->published_at->format('d F Y') : 'Belum dipublikasikan' }}
            </div>
            @if($article->is_published)
                <span class="self-start sm:self-auto px-4 py-2 bg-green-500 text-white rounded-full text-xs sm:text-sm font-semibold">
                    Published
                </span>
            @else
                <span class="self-start sm:self-auto px-4 py-2 bg-yellow-500 text-white rounded-full text-xs sm:text-sm font-semibold">
                    Draft
                </span>
            @endif
        </div>
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-tight">{{ $article->title }}</h1>
    </div>

    <!-- Article Content -->
    <div class="p-5 sm:p-8">
        <!-- Featured Image -->
        <div class="mb-6 sm:mb-8 rounded-lg overflow-hidden">
            <img src="{{ asset('storage/' . $article->image) }}" 
                 alt="{{ $article->title }}" 
                 class="w-full h-auto object-cover">
        </div>

        <!-- Content -->
        <div class="prose prose-lg max-w-none">
            <div class="text-gray-700 text-sm sm:text-base leading-relaxed whitespace-pre-line">
                {{ $article->content }}
            </div>
        </div>

        <!-- Meta Information -->
        <div class="mt-6 sm:mt-8 pt-6 sm:pt-8 border-t border-gray-200">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 text-xs sm:text-sm text-gray-600">
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
        font-size: 1rem;
        line-height: 1.75;
    }
    @media (min-width: 640px) {
        .prose { font-size: 1.125rem; }
    }
</style>
@endsection