@extends('layouts.app')

@section('title', $article->title)

@section('content')
<!-- Article Header -->
<section class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center text-secondary mb-4">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                </svg>
                {{ $article->published_at->format('d F Y') }}
            </div>
            <h1 class="text-4xl font-bold mb-4">{{ $article->title }}</h1>
        </div>
    </div>
</section>

<!-- Article Content -->
<article class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Featured Image -->
            <div class="mb-8 rounded-lg overflow-hidden shadow-lg">
                <img src="{{ asset('storage/' . $article->image) }}" 
                     alt="{{ $article->title }}" 
                     class="w-full h-auto object-cover">
            </div>

            <!-- Content -->
            <div class="prose prose-lg max-w-none">
                <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $article->content }}
                </div>
            </div>

            <!-- Share Section -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <a href="{{ route('articles') }}" class="inline-flex items-center text-primary hover:text-primary/80 font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali ke Artikel
                </a>
            </div>
        </div>
    </div>
</article>

<!-- Related Articles -->
@if($relatedArticles->count() > 0)
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-primary mb-8">Artikel Terkait</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedArticles as $related)
                    <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                        <div class="aspect-w-16 aspect-h-12 bg-gray-200">
                            <img src="{{ asset('storage/' . $related->image) }}" 
                                 alt="{{ $related->title }}" 
                                 class="w-full h-48 object-cover">
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-gray-500 mb-2">
                                {{ $related->published_at->format('d M Y') }}
                            </div>
                            <h3 class="text-lg font-bold text-primary mb-3 line-clamp-2">
                                {{ $related->title }}
                            </h3>
                            <a href="{{ route('article.detail', $related->slug) }}" 
                               class="inline-block text-primary hover:text-primary/80 font-semibold">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .prose {
        font-size: 1.125rem;
        line-height: 1.75;
    }
</style>
@endsection