@extends('layouts.app')

@section('title', $article->title)

@section('content')

<section class="bg-[#F4F4F2] py-14 sm:py-16 md:py-20">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

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
        <div class="grid md:grid-cols-2 gap-10 md:gap-16 items-start mb-12 md:mb-16">

            <!-- Left: Title -->
            <div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl leading-tight font-semibold text-primary mb-6 md:mb-8">
                    {{ $article->title }}
                </h1>

                <!-- Author -->
                <div class="flex items-center gap-3 sm:gap-4">
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

        <!-- Article Content -->
        <div class="max-w-3xl md:max-w-4xl">

            <div class="text-base sm:text-lg text-primary leading-relaxed sm:leading-loose space-y-6 sm:space-y-8 whitespace-pre-line">
                {{ $article->content }}
            </div>

        </div>

    </div>

</section>

@endsection