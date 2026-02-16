@extends('layouts.app')

@section('title', 'Article')

@section('content')

<!-- Section Wrapper -->
<section class="py-24 bg-[#FFFFF]">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Heading -->
        <div class="text-center mb-20">
            <h1 class="text-5xl font-semibold text-primary mb-6">
                Discover Our Stories
            </h1>
            <p class="max-w-3xl mx-auto text-gray-600 text-lg leading-relaxed">
                Explore articles that capture the beauty and calm of Cuilan Swargi 
                while sharing meaningful experiences and stories inspired by nature.
            </p>
        </div>

        @if($articles->count() > 0)

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($articles as $article)
            <article class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition duration-500">

                <!-- Image -->
                <div class="h-[180px] overflow-hidden">
                    <img 
                        src="{{ asset('storage/' . $article->image) }}"
                        alt="{{ $article->title }}"
                        class="w-full h-full object-cover hover:scale-105 transition duration-700"
                    >
                </div>

                <!-- Content -->
                <div class="p-8 flex flex-col justify-between h-[260px]">

                    <div>
                        <h2 class="text-2xl font-semibold text-primary mb-4 leading-snug line-clamp-2">
                            {{ $article->title }}
                        </h2>

                        <p class="text-gray-600 leading-relaxed line-clamp-3">
                            {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}
                        </p>
                    </div>

                    <!-- Button -->
                    <div class="mt-6">
                        <a href="{{ route('article.detail', $article->slug) }}"
                           class="inline-block bg-primary text-white px-6 py-3 rounded-full text-sm hover:opacity-90 transition">
                            Read More
                        </a>
                    </div>

                </div>
            </article>
            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-16">
            {{ $articles->links() }}
        </div>

        @else

        <!-- Empty State -->
        <div class="text-center py-24">
            <p class="text-gray-500 text-lg">
                No articles available yet.
            </p>
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
