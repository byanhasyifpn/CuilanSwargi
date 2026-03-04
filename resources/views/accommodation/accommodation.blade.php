@extends('layouts.app')

@section('title', 'Accommodation')

@section('content')

<!-- Header Section -->
<section class="py-6 sm:py-10 md:py-16 text-center bg-[#ffffff]">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <h1 class="text-2xl sm:text-3xl md:text-5xl text-primary mb-3 md:mb-5"
            style="font-family:'Crimson Text', serif;">
            Our Accommodation
        </h1>
        <p class="text-sm sm:text-base text-primary opacity-80 leading-relaxed">
            Find stories and experiences about staying at Cuilan Swargi and enjoying
            moments of rest in a calm natural setting.
        </p>
    </div>
</section>

<!-- Accommodation Cards -->
<section class="pb-16 sm:pb-20 bg-[#ffffff]">
    <div class="px-4 sm:px-6 md:px-8">

        @if($accommodations->count() > 0)

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">

            @foreach($accommodations as $accommodation)

            <div class="relative group rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition duration-500">

                @php
                    $firstImage = $accommodation->images->first();
                @endphp

                <!-- Image -->
                @if($firstImage)
                    <img src="{{ asset('storage/' . $firstImage->image) }}"
                         class="w-full h-[200px] sm:h-[260px] md:h-[320px] object-cover group-hover:scale-105 transition duration-700">
                @else
                    <div class="w-full h-[200px] sm:h-[260px] md:h-[320px] bg-gray-300"></div>
                @endif

                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                <!-- Content -->
                <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-4 text-white">

                    <!-- Title -->
                    <h2 class="text-sm sm:text-lg font-semibold mb-1 sm:mb-2 leading-snug">
                        {{ $accommodation->name }}
                    </h2>

                    @php
                        $prices = $accommodation->services->pluck('price');
                        $minPrice = $prices->min();
                        $maxPrice = $prices->max();
                    @endphp

                    <!-- Capacity (ICON ORANG) -->
                    <div class="flex items-center gap-1 text-[11px] sm:text-xs mb-1 opacity-95">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 24 24" 
                            fill="currentColor" 
                            class="w-4 h-4 sm:w-5 sm:h-5">
                            <path d="M12 12c2.761 0 5-2.686 5-6s-2.239-6-5-6-5 2.686-5 6 2.239 6 5 6z"/>
                            <path d="M2 22c0-4.418 4.477-8 10-8s10 3.582 10 8H2z"/>
                        </svg>
                        <span>{{ $accommodation->capacity }} Guests</span>
                    </div>

                    <!-- Services -->
                    <div class="text-[10px] sm:text-xs mb-1 opacity-80 line-clamp-1">
                        {{ $accommodation->services->pluck('name')->implode(' | ') }}
                    </div>

                    <!-- Price -->
                    @if($accommodation->services->count() > 0)
                    <div class="text-xs sm:text-sm mb-2 opacity-90">
                        IDR {{ number_format($minPrice, 0, ',', '.') }}
                        @if($minPrice != $maxPrice)
                            - {{ number_format($maxPrice, 0, ',', '.') }}
                        @endif
                    </div>
                    @endif

                    <!-- Button -->
                    <a href="{{ route('accommodation.detail', $accommodation->id) }}"
                       class="inline-block border border-white text-white px-3 py-2 text-[10px] sm:text-xs rounded-full backdrop-blur-sm hover:bg-white hover:text-primary transition">
                        View Details
                    </a>

                </div>
            </div>

            @endforeach

        </div>

        @else

        <div class="text-center py-20">
            <p class="text-primary text-lg opacity-70">
                No accommodation available yet.
            </p>
        </div>

        @endif

    </div>
</section>

@endsection