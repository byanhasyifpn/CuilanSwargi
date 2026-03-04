@extends('layouts.app')

@section('title', 'Article')

@section('content')

<!-- Section Wrapper -->
<section class="pt-8 sm:pt-12 md:pt-16 pb-24 bg-[#FFFFF]">

    <div class="px-4 sm:px-6 md:px-8 lg:px-12">

        <!-- Heading -->
        <div class="text-center mb-10 sm:mb-14 md:mb-16">
    <h1 class="text-3xl sm:text-4xl md:text-5xl text-primary mb-4 md:mb-6"
        style="font-family:'Crimson Text', serif;">
        Discover Our Stories
    </h1>
    <p class="max-w-3xl mx-auto text-gray-600 text-base sm:text-lg leading-relaxed">
        Explore articles that capture the beauty and calm of Cuilan Swargi 
        while sharing meaningful experiences and stories inspired by nature.
    </p>
</div>

        @if($articles->count() > 0)

        <!-- Articles Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">

            @foreach($articles as $article)
            <article class="bg-white rounded-xl sm:rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition duration-500 flex flex-col">

                <!-- Image -->
                <div class="h-[130px] sm:h-[160px] lg:h-[200px] overflow-hidden">
                    <img 
                        src="{{ asset('storage/' . $article->image) }}"
                        alt="{{ $article->title }}"
                        class="w-full h-full object-cover hover:scale-105 transition duration-700"
                    >
                </div>

                <!-- Content -->
                <div class="p-3 sm:p-4 lg:p-5 flex flex-col flex-1">

                    <div class="flex-1">
                        <h2 class="text-sm sm:text-base font-semibold text-primary mb-1.5 leading-snug line-clamp-2">
                            {{ $article->title }}
                        </h2>

                        <p class="text-gray-500 text-xs leading-relaxed line-clamp-2">
                            {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 80) }}
                        </p>
                    </div>

                    <!-- Button -->
                    <div class="mt-3">
                        <a href="{{ route('article.detail', $article->slug) }}"
                           class="inline-block bg-primary text-white px-4 py-1.5 rounded-full text-xs hover:opacity-90 transition">
                            Read More
                        </a>
                    </div>

                </div>
            </article>
            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-12 sm:mt-16">
            {{ $articles->links() }}
        </div>

        @else

        <!-- Empty State -->
        <div class="text-center py-20 sm:py-24">
            <p class="text-gray-500 text-base sm:text-lg">
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