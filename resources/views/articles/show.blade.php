@extends('layouts.app')

@section('title', $article->title)

@section('content')

<section class="bg-[#F4F4F2] pt-8 sm:pt-10 md:pt-12 pb-16 sm:pb-20">

    <div class="px-4 sm:px-6 md:px-8 lg:px-12">

        <!-- Back Button -->
        <div class="mb-8 sm:mb-10">
            <a href="{{ route('articles') }}" 
               class="inline-flex items-center gap-2 text-primary hover:opacity-70 transition text-sm sm:text-base">
                
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="w-5 h-5 sm:w-6 sm:h-6" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>

                Back to Articles
            </a>
        </div>

        <!-- Header Layout -->
        <div class="grid md:grid-cols-2 gap-10 md:gap-16 items-stretch mb-12 md:mb-16">

    <!-- Left: Title + Author -->
    <div class="flex flex-col justify-between">

        <!-- Title (Top Aligned) -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl leading-tight font-semibold text-primary">
            {{ $article->title }}
        </h1>

        <!-- Author (Bottom Aligned on Desktop) -->
        <div class="flex items-center gap-3 sm:gap-4 mt-8 md:mt-0">
            <img src="{{ asset('images/logo-navbar.jpg') }}" 
                 class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover"
                 alt="Author">

            <span class="text-base sm:text-lg text-primary font-medium">
                Cuilan Swargi
            </span>
        </div>

    </div>

    <!-- Right: Image -->
    <div class="rounded-2xl sm:rounded-3xl overflow-hidden shadow-md">
        <img src="{{ asset('storage/' . $article->image) }}"
             alt="{{ $article->title }}"
             class="w-full h-[260px] sm:h-[320px] md:h-[420px] object-cover">
    </div>

</div>

        <!-- Content -->
        <div class="text-base sm:text-lg text-primary leading-relaxed sm:leading-loose whitespace-pre-line">
            {{ $article->content }}
        </div>

    </div>

</section>

@endsection