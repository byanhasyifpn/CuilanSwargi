@extends('layouts.app')

@section('title', 'Accommodation')

@section('content')

<!-- Header Section -->
<section class="py-20 text-center bg-[#ffffff]">
    <div class="max-w-3xl mx-auto px-6">
        <h1 class="text-5xl text-primary mb-6" style="font-family:'Crimson Text', serif;">
            Our Accommodation
        </h1>
        <p class="text-primary text-lg opacity-80">
            Find stories and experiences about staying at Cuilan Swargi and enjoying
            moments of rest in a calm natural setting.
        </p>
    </div>
</section>

<!-- Accommodation Cards -->
<section class="pb-24 bg-[#fffff]">
    <div class="max-w-7xl mx-auto px-6">

        @if($accommodations->count() > 0)

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($accommodations as $accommodation)

            <div class="relative group rounded-3xl overflow-hidden shadow-md hover:shadow-xl transition duration-500">

                <!-- Main Image -->
                @php
                    $firstImage = $accommodation->images->first();
                @endphp

                @if($firstImage)
                    <img src="{{ asset('storage/' . $firstImage->image) }}"
                         class="w-full h-[420px] md:h-[380px] lg:h-[360px] object-cover group-hover:scale-105 transition duration-700">
                @else
                    <div class="w-full h-[420px] md:h-[380px] lg:h-[360px] bg-gray-300"></div>
                @endif

                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                <!-- Content -->
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">

                    <!-- Title -->
                    <h2 class="text-2xl font-semibold mb-3">
                        {{ $accommodation->name }}
                    </h2>

                    <!-- information -->
                    @php
                        $prices = $accommodation->services->pluck('price');
                        $minPrice = $prices->min();
                        $maxPrice = $prices->max();
                    @endphp

                    <div class="flex items-center gap-4 text-sm mb-2 opacity-90">
                        <div class="flex items-center gap-1">
                            👤 {{ $accommodation->capacity }} Guests
                        </div>
                    </div>

                    {{-- Service Names --}}
                    <div class="text-sm mb-2 opacity-90">
                        {{ $accommodation->services->pluck('name')->implode(' | ') }}
                    </div>

                    {{-- Price Range --}}
                    @if($accommodation->services->count() > 0)
                    <div class="text-sm mb-6 opacity-90">
                        IDR {{ number_format($minPrice, 0, ',', '.') }}
                        @if($minPrice != $maxPrice)
                            - {{ number_format($maxPrice, 0, ',', '.') }}
                        @endif
                        / night
                    </div>
                    @endif

                    <!-- Button -->
                    <a href="{{ route('accommodation.detail', $accommodation->id) }}"
                       class="inline-block border border-white text-white px-6 py-2 rounded-full backdrop-blur-sm hover:bg-white hover:text-primary transition">
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
