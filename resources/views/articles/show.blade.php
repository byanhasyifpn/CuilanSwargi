@extends('layouts.app')

@section('title', $article->title)

@section('content')

<section class="bg-[#F4F4F2] py-20">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Back Button -->
        <div class="mb-10">
            <a href="{{ route('articles') }}" class="text-primary hover:opacity-70 transition">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="w-7 h-7" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
        </div>

        <!-- Header Layout -->
        <div class="grid md:grid-cols-2 gap-16 items-start mb-16">

            <!-- Left: Title -->
            <div>
                <h1 class="text-5xl leading-tight font-semibold text-primary mb-8">
                    {{ $article->title }}
                </h1>

                <!-- Author -->
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/logo-navbar.jpg') }}" 
                         class="w-12 h-12 rounded-full"
                         alt="Author">

                    <span class="text-xl text-primary font-medium">
                        Cuilan Swargi
                    </span>
                </div>
            </div>

            <!-- Right: Image -->
            <div class="rounded-3xl overflow-hidden shadow-md">
                <img src="{{ asset('storage/' . $article->image) }}"
                     alt="{{ $article->title }}"
                     class="w-full h-[420px] object-cover">
            </div>

        </div>

        <!-- Article Content -->
        <div class="max-w-4xl">

            <div class="text-lg text-primary leading-loose space-y-8 whitespace-pre-line">
                {{ $article->content }}
            </div>

        </div>

    </div>

</section>

@endsection
