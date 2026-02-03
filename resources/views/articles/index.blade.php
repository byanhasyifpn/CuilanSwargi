@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
<!-- Header Section -->
<section class="bg-primary text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Artikel Cuilan Swargi</h1>
        <p class="text-secondary text-lg">Baca informasi menarik seputar wisata alam dan tips perjalanan</p>
    </div>
</section>

<!-- Articles Grid -->
<section class="py-16">
    <div class="container mx-auto px-4">
        @if($articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $article)
                    <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                        <div class="aspect-w-16 aspect-h-12 bg-gray-200">
                            <img src="{{ asset('storage/' . $article->image) }}" 
                                 alt="{{ $article->title }}" 
                                 class="w-full h-64 object-cover">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-500 mb-3">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $article->published_at->format('d M Y') }}
                            </div>
                            <h2 class="text-xl font-bold text-primary mb-3 line-clamp-2">
                                {{ $article->title }}
                            </h2>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $article->excerpt }}
                            </p>
                            <a href="{{ route('article.detail', $article->slug) }}" 
                               class="inline-block bg-primary text-white px-6 py-2 rounded hover:bg-primary/90 transition">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $articles->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <div class="bg-secondary/30 rounded-lg p-12 max-w-md mx-auto">
                    <svg class="w-24 h-24 text-primary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-600 text-lg">Belum ada artikel yang dipublikasikan</p>
                </div>
            </div>
        @endif
    </div>
</section>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection