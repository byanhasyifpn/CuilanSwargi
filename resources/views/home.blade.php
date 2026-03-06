@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400&family=Newsreader:ital,opsz,wght@0,6..72,300;0,6..72,400;0,6..72,500;1,6..72,300;1,6..72,400&display=swap');
    
    body {
        font-family: 'Newsreader', serif;
        /* Cegah overflow horizontal di semua browser */
        overflow-x: hidden;
    }
    
    .font-crimson {
        font-family: 'Crimson Text', serif;
    }

    /* Fix vh Safari — gunakan -webkit-fill-available */
    .hero-mobile {
        height: 100vh;
        height: -webkit-fill-available;
    }

    /* Pastikan semua section tidak overflow */
    section {
        max-width: 100%;
        box-sizing: border-box;
    }
</style>

<!-- Hero Section -->
<section>

  <!-- ========================= -->
  <!-- MOBILE VERSION (≤735px) -->
  <!-- ========================= -->
  <div class="block md:hidden relative w-full h-screen overflow-hidden">

    <img
        src="{{ asset('images/hero.png') }}"
        alt="Cuilan Swargi"
        class="absolute inset-0 w-full h-full object-cover"
    >

    <!-- Overlay lebih ringan -->
    <div class="absolute inset-0 bg-black/35"></div>

    <div class="relative z-10 flex flex-col justify-center items-center text-center h-full px-6 text-white">

        <h1 class="font-crimson text-4xl font-semibold leading-tight mb-4">
            Cuilan Swargi
        </h1>

        <p class="text-lg italic mb-3">
            Be Present, Be Authentic, Live Slow
        </p>

        <p class="text-sm text-white/80 max-w-xs mb-8">
            A peaceful sanctuary where nature and comfort meet.
        </p>

        <a href="#penginapan"
           class="px-8 py-3 rounded-full border border-white text-sm tracking-wide hover:bg-white hover:text-black transition duration-300">
            Discover More
        </a>

    </div>
  </div>


  <!-- ========================= -->
  <!-- DESKTOP VERSION -->
  <!-- ========================= -->
  <div class="hidden md:block mt-8 px-6 py-6 max-w-[1300px] mx-auto">
    <div class="relative min-h-[750px] rounded-3xl overflow-hidden shadow-2xl">

        <!-- Background -->
        <img
            src="{{ asset('images/hero.png') }}"
            alt="Cuilan Swargi"
            class="absolute inset-0 w-full h-full object-cover scale-110 object-center"
        >

        <!-- Overlay dibuat lebih soft -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-black/25 to-black/60"></div>

        <!-- Text -->
        <div class="relative z-10 pt-32 px-16 text-[#FCF5C8]">
            <h1 class="font-crimson text-7xl xl:text-8xl font-semibold mb-6">
                Cuilan Swargi
            </h1>

            <p class="text-4xl italic mb-4 text-white">
                Be Present, Be Authentic, Live Slow
            </p>

            <p class="text-2xl text-white/85">
                A Tiny Piece of Heaven
            </p>
        </div>

        <!-- Glass Cards (Versi Lebih Kecil & Proporsional) -->
<div class="absolute bottom-20 left-1/2 -translate-x-1/2 w-[88%] z-20">
  <div class="grid md:grid-cols-3 gap-6">

    <!-- Card 1 -->
    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-white border border-white/20">

        <div class="w-12 h-12 flex items-center justify-center rounded-lg border border-white/30 mb-4">
            <!-- Home Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9l9-7 9 7v11a2 2 0 01-2 2h-4V12H9v9H5a2 2 0 01-2-2V9z"/>
            </svg>
        </div>

        <h3 class="text-xl font-medium mb-2">Stay Experience</h3>
        <p class="text-sm text-white/80 leading-relaxed">
            Enjoy cozy cabins surrounded by nature,
            perfect for escaping the busy city life and relaxing.
        </p>
    </div>

    <!-- Card 2 -->
    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-white border border-white/20">

        <div class="w-12 h-12 flex items-center justify-center rounded-lg border border-white/30 mb-4">
            <!-- Food Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 3v10M8 3v10M6 13v8m8-18v18m4-18v6a4 4 0 01-4 4"/>
            </svg>
        </div>

        <h3 class="text-xl font-medium mb-2">Food & Beverages</h3>
        <p class="text-sm text-white/80 leading-relaxed">
            Healthy and natural food made from
            fresh local ingredients.
        </p>
    </div>

    <!-- Card 3 -->
    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-white border border-white/20">

        <div class="w-12 h-12 flex items-center justify-center rounded-lg border border-white/30 mb-4">
            <!-- Heart Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21 4.318 12.682a4.5 4.5 0 010-6.364z"/>
            </svg>
        </div>

        <h3 class="text-xl font-medium mb-2">Moments & Memories</h3>
        <p class="text-sm text-white/80 leading-relaxed">
            Perfect place to spend quality time
            with people you love.
        </p>
    </div>

  </div>
</div>

    </div>
  </div>

</section>


<!-- Penginapan -->
{{--
    FIX: Hilangkan negative margin (-mx-*) yang tidak konsisten di Safari.
    Ganti dengan pendekatan overflow-hidden pada wrapper + padding konsisten.
--}}
<section id="penginapan" 
         class="py-6 sm:py-8 md:py-10 w-full px-4 sm:px-6 md:px-8 lg:px-20">

    <!-- Header — padding konsisten kiri-kanan -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 sm:mb-8 px-4 sm:px-6 md:px-8">
        <div>
            <h2 class="font-crimson text-2xl sm:text-3xl md:text-4xl font-semibold text-primary mb-2">
                A place to stay, a place to breathe.
            </h2>
            <p class="text-gray-600 text-xs sm:text-sm md:text-base max-w-xl">
                Thoughtfully designed spaces surrounded by nature.
            </p>
        </div>

        <a href="{{ route('accommodation') }}"
           class="mt-3 sm:mt-4 md:mt-0 inline-flex items-center gap-2 border border-primary text-primary px-4 sm:px-5 py-2 sm:py-2.5 text-xs sm:text-sm rounded-full hover:bg-primary/5 transition">
            View All
            <span class="text-sm sm:text-base">↗</span>
        </a>
    </div>

    {{--
        FIX: Ganti -mx + px dengan padding hanya di sisi kiri,
        biarkan scroll ke kanan natural. Gunakan overflow-hidden
        pada wrapper luar, bukan negative margin.
    --}}
    <div class="overflow-hidden">
        <div class="overflow-x-auto pb-4 px-4 sm:px-6 md:px-8"
             style="scrollbar-width: thin; scrollbar-color: #2f5d50 transparent; -webkit-overflow-scrolling: touch;">
            <div class="flex gap-4 sm:gap-5" style="width: max-content;">
            @foreach($accommodations as $item)
            <div class="relative group rounded-xl sm:rounded-2xl overflow-hidden flex-shrink-0 w-[280px] sm:w-[320px] md:w-[340px]">
                <img 
                    src="{{ $item->images->first() 
                            ? asset('storage/'.$item->images->first()->image) 
                            : asset('images/placeholder.jpg') }}"
                    class="w-full h-[280px] sm:h-[320px] md:h-[340px] object-cover group-hover:scale-110 transition duration-700"
                    alt="{{ $item->name }}">

                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-5 text-white">
                    <h3 class="font-crimson text-lg sm:text-xl font-semibold mb-1 sm:mb-1.5">
                        {{ $item->name }}
                    </h3>

                    <div class="flex items-center gap-2 text-xs sm:text-sm mb-1 sm:mb-1.5 opacity-90">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
                        </svg>
                        <span>{{ $item->capacity }} Guests</span>
                    </div>

                    @php
                        $prices = $item->services->pluck('price');
                        $minPrice = $prices->min();
                        $maxPrice = $prices->max();
                    @endphp

                    <div class="text-xs sm:text-sm mb-1 opacity-90">
                        {{ $item->services->pluck('name')->implode(', ') }}
                    </div>

                    <p class="text-xs sm:text-sm mb-2.5 sm:mb-3 opacity-90">
                        @if($minPrice && $maxPrice)
                            IDR {{ number_format($minPrice, 0, ',', '.') }}
                            @if($minPrice != $maxPrice)
                                - {{ number_format($maxPrice, 0, ',', '.') }}
                            @endif
                            / night
                        @endif
                    </p>

                    <a href="{{ route('accommodation') }}"
                       class="inline-block w-full text-center text-xs sm:text-sm border border-white/40 py-1.5 sm:py-2 rounded-full hover:bg-white hover:text-primary transition">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>

</section>


<!-- Moments Section -->
{{-- FIX: Gunakan w-full box-border alih-alih biarkan browser masing-masing kalkulasi --}}
<section class="bg-[#2E514B] py-8 sm:py-10 md:py-12 px-4 sm:px-6 md:px-8 w-full box-border">
    <div class="max-w-[1200px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-10 lg:gap-14 items-center">
        
        <div>
            <img src="{{ asset('images/moments.png') }}" 
                 alt="Moments at Cuilan Swargi" 
                 class="w-full h-[300px] sm:h-[360px] md:h-[420px] lg:h-[480px] object-cover rounded-xl sm:rounded-2xl">
        </div>
        
        <div class="text-white">
            
            <h2 class="font-crimson text-2xl sm:text-3xl md:text-4xl font-medium mb-1.5 sm:mb-2">
                Moments That
            </h2>

            <h3 class="font-crimson text-3xl sm:text-4xl md:text-5xl italic font-semibold mb-4 sm:mb-5">
                Brought Us Together
            </h3>

            <div class="text-white text-lg sm:text-xl mb-4 sm:mb-5">✺</div>
            
            <p class="text-sm sm:text-base md:text-lg text-white/80 leading-relaxed max-w-xl">
                Thank you for being part of this journey. May what we started here 
                continue to grow into meaningful experiences, deeper connections, 
                and shared moments that inspire us all. May every step forward open 
                new opportunities, strengthen our sense of togetherness, and lead 
                us toward many good things in the days ahead.
            </p>

        </div>
    </div>
</section>


<!-- Impact Section -->
<section class="bg-white py-8 sm:py-10 md:py-12 px-4 sm:px-6 md:px-8 w-full box-border">

    <div class="max-w-[1200px] mx-auto">

        <div class="flex flex-col lg:flex-row justify-between gap-6 sm:gap-8 mb-8 sm:mb-10 md:mb-12">
            
            <div class="max-w-2xl">
                <span class="inline-block border border-primary text-primary px-3.5 sm:px-4 py-1.5 rounded-full text-xs sm:text-sm font-medium mb-4 sm:mb-5">
                    Our Impact
                </span>

                <h2 class="font-crimson text-2xl sm:text-3xl md:text-4xl text-primary leading-tight">
                    Creating spaces for moments that matter
                </h2>
            </div>

            <div class="max-w-xl text-primary/80 text-sm sm:text-base leading-relaxed">
                Cuilan Swargi is a place where nature, community, and experience come together.
                We thoughtfully design each moment to inspire connection and lasting memories.
            </div>
        </div>

        <div class="space-y-3 sm:space-y-4">

            <div class="accordion-item bg-[#F5F5F5] rounded-xl sm:rounded-2xl overflow-hidden transition-all duration-500">
                <div class="accordion-header cursor-pointer px-4 sm:px-6 md:px-8 py-4 sm:py-5 md:py-6 flex justify-between items-center text-primary text-base sm:text-lg md:text-xl">
                    <span>Creating Meaningful Experiences Rooted in Nature</span>
                    <span class="accordion-icon text-lg sm:text-xl transition-transform duration-300 flex-shrink-0 ml-2">↘</span>
                </div>
                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-500">
                    <div class="bg-[#2f5d50] text-white px-4 sm:px-6 md:px-8 py-6 sm:py-7 md:py-8">
                        <div class="border-l border-white/40 pl-4 sm:pl-5 text-white/80 text-sm sm:text-base leading-relaxed">
                            We design immersive nature-based experiences that reconnect people with the environment. 
                            Each visit is crafted to encourage reflection, appreciation, and meaningful shared moments.
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item bg-[#F5F5F5] rounded-xl sm:rounded-2xl overflow-hidden transition-all duration-500">
                <div class="accordion-header cursor-pointer px-4 sm:px-6 md:px-8 py-4 sm:py-5 md:py-6 flex justify-between items-center text-primary text-base sm:text-lg md:text-xl">
                    <span>Visitors & Experiences Shared</span>
                    <span class="accordion-icon text-lg sm:text-xl transition-transform duration-300 flex-shrink-0 ml-2">↘</span>
                </div>
                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-500">
                    <div class="bg-[#2f5d50] text-white px-4 sm:px-6 md:px-8 py-6 sm:py-7 md:py-8">
                        <div class="border-l border-white/40 pl-4 sm:pl-5 text-white/80 text-sm sm:text-base leading-relaxed">
                            Thousands of guests have created stories here — from family retreats to 
                            community gatherings. Each experience strengthens bonds and builds lasting memories.
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item bg-[#F5F5F5] rounded-xl sm:rounded-2xl overflow-hidden transition-all duration-500">
                <div class="accordion-header cursor-pointer px-4 sm:px-6 md:px-8 py-4 sm:py-5 md:py-6 flex justify-between items-center text-primary text-base sm:text-lg md:text-xl">
                    <span>Community & Cultural Connection</span>
                    <span class="accordion-icon text-lg sm:text-xl transition-transform duration-300 flex-shrink-0 ml-2">↘</span>
                </div>
                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-500">
                    <div class="bg-[#2f5d50] text-white px-4 sm:px-6 md:px-8 py-6 sm:py-7 md:py-8">
                        <div class="border-l border-white/40 pl-4 sm:pl-5 text-white/80 text-sm sm:text-base leading-relaxed">
                            We collaborate with local artisans and communities to celebrate cultural heritage, 
                            support livelihoods, and foster meaningful connections between visitors and locals.
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item bg-[#F5F5F5] rounded-xl sm:rounded-2xl overflow-hidden transition-all duration-500">
                <div class="accordion-header cursor-pointer px-4 sm:px-6 md:px-8 py-4 sm:py-5 md:py-6 flex justify-between items-center text-primary text-base sm:text-lg md:text-xl">
                    <span>Committed to Sustainable Growth</span>
                    <span class="accordion-icon text-lg sm:text-xl transition-transform duration-300 flex-shrink-0 ml-2">↘</span>
                </div>
                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-500">
                    <div class="bg-[#2f5d50] text-white px-4 sm:px-6 md:px-8 py-6 sm:py-7 md:py-8">
                        <div class="border-l border-white/40 pl-4 sm:pl-5 text-white/80 text-sm sm:text-base leading-relaxed">
                            Sustainability guides our development — from eco-friendly design to 
                            responsible tourism practices that protect nature for future generations.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- How To Get There -->
<section class="relative w-full flex items-center px-4 sm:px-6 md:px-8 py-10 sm:py-12 text-white box-border"
         style="min-height: 500px;">

    <div class="absolute inset-0">
        <img src="{{ asset('images/bg-accommodation.png') }}"
             class="w-full h-full object-cover" 
             alt="Background">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>

    <div class="relative z-10 w-full max-w-6xl mx-auto">

        <div class="mb-8 sm:mb-10 md:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-light">
                How To Get To
            </h2>
            <h3 class="text-3xl sm:text-4xl md:text-5xl italic font-semibold mt-1.5 sm:mt-2 font-serif">
                Purwokerto
            </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6 md:gap-8">

    <!-- TRAIN -->
    <div class="backdrop-blur-md bg-white/5 border border-white/10 rounded-xl sm:rounded-2xl p-6 sm:p-7 md:p-8 shadow-xl">
        <div class="flex items-center gap-4 mb-6">
            
            <!-- Background Icon -->
            <div class="w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center 
                        bg-white/10 backdrop-blur-md rounded-xl">
                <img src="{{ asset('images/material-symbols-light_train-outline.svg') }}" 
                     class="w-9 h-9 sm:w-10 sm:h-10 object-contain" 
                     alt="Train">
            </div>

            <h4 class="text-xl sm:text-2xl font-light">Train</h4>
        </div>

        <div class="space-y-2 sm:space-y-2.5 md:space-y-3 text-sm sm:text-base text-white/90 leading-relaxed">
            <p>YOGYAKARTA - PURWOKERTO (2 HOURS)</p>
            <p>YOGYAKARTA (LEMPUYANGAN) - PURWOKERTO (2.5 HOURS)</p>
            <p>SEMARANG (TAWANG) - PURWOKERTO (4 HOURS)</p>
            <p>SEMARANG (PONCOL) - PURWOKERTO (4 HOURS)</p>
            <p>JAKARTA (GAMBIR) - PURWOKERTO (5 HOURS)</p>
            <p>JAKARTA (PASAR SENEN) - PURWOKERTO (5.5 HOURS)</p>
            <p>SURABAYA (PASAR TURI) - PURWOKERTO (8 HOURS)</p>
            <p>SURABAYA (GUBENG) - PURWOKERTO (8 HOURS)</p>
            <p>BANDUNG (KIARA CONDONG) - PURWOKERTO (7 HOURS)</p>
        </div>
    </div>


    <!-- BUS -->
    <div class="backdrop-blur-md bg-white/5 border border-white/10 rounded-xl sm:rounded-2xl p-6 sm:p-7 md:p-8 shadow-xl">
        <div class="flex items-center gap-4 mb-6">
            
            <!-- Background Icon -->
            <div class="w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center 
                        bg-white/10 backdrop-blur-md rounded-xl">
                <!-- Lebih kecil dari train -->
                <img src="{{ asset('images/ion_bus-outline.svg') }}" 
                     class="w-6 h-6 sm:w-7 sm:h-7 object-contain" 
                     alt="Bus">
            </div>

            <h4 class="text-xl sm:text-2xl font-light">Bus</h4>
        </div>

        <div class="space-y-2 sm:space-y-2.5 md:space-y-3 text-sm sm:text-base text-white/90 leading-relaxed">
            <p>YOGYAKARTA - PURWOKERTO (6 HOURS)</p>
            <p>SEMARANG - PURWOKERTO (7 HOURS)</p>
            <p>JAKARTA - PURWOKERTO (7 HOURS)</p>
            <p>SURABAYA - PURWOKERTO (11 HOURS)</p>
            <p>BANDUNG - PURWOKERTO (8 HOURS)</p>
        </div>
    </div>

</div>
    </div>
</section>


<!-- Map -->
<section class="py-10 sm:py-12 md:py-14 lg:py-16 bg-white w-full box-border">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-7 sm:mb-8 md:mb-10">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-primary mb-2 sm:mb-3">
                Find Us On The Map
            </h2>
            <p class="text-gray-500 text-xs sm:text-sm md:text-base">
                Visit Cuilan Swargi and experience nature at its finest.
            </p>
        </div>

        <div class="rounded-xl sm:rounded-2xl overflow-hidden shadow-xl border border-gray-200">
            <iframe 
                src="https://www.google.com/maps?q=Cuilan+Swargi+Baturraden&output=embed"
                width="100%" 
                height="350" 
                style="border:0; display:block;" 
                allowfullscreen="" 
                loading="lazy"
                class="w-full h-[300px] sm:h-[350px] md:h-[400px]">
            </iframe>
        </div>

        <div class="text-center mt-6 sm:mt-7 md:mt-8">
            <a href="https://maps.google.com/?q=Cuilan+Swargi+Baturraden"
               target="_blank"
               class="inline-block bg-primary text-white text-xs sm:text-sm px-5 sm:px-6 py-2 sm:py-2.5 rounded-full hover:bg-[#24423d] transition duration-300 shadow-lg">
                View on Google Maps
            </a>
        </div>

    </div>
</section>


<!-- Ratings Section -->
<section class="py-10 sm:py-12 md:py-14 px-4 sm:px-6 md:px-8 bg-white w-full box-border">
    <div class="max-w-[1200px] mx-auto">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 sm:gap-0 mb-7 sm:mb-8 md:mb-10">
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-semibold text-primary leading-snug">
                What People Say About Their Experience <br class="hidden md:block">
                at Cuilan Swargi
            </h2>

            <div class="flex gap-2.5 sm:gap-3">
                <button id="prevBtn" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-primary text-primary hover:bg-primary hover:text-white transition flex items-center justify-center flex-shrink-0">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <button id="nextBtn" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-primary text-primary hover:bg-primary hover:text-white transition flex items-center justify-center flex-shrink-0">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="overflow-hidden">
            <div id="ratingsSlider" class="flex gap-4 sm:gap-5 md:gap-6 transition-transform duration-500 ease-in-out">

                <div class="rating-card min-w-full md:min-w-[calc(50%-12px)] bg-[#F5F5F5] rounded-xl sm:rounded-2xl p-6 sm:p-7 md:p-8">
                    <p class="text-lg sm:text-xl md:text-2xl text-primary leading-relaxed mb-6 sm:mb-7 md:mb-8">
                        "Such a peaceful and beautiful place. The view is absolutely breathtaking!"
                    </p>
                    <div class="flex items-center gap-3 sm:gap-4">
                        <img src="https://i.pravatar.cc/100?img=12" class="w-11 h-11 sm:w-12 sm:h-12 rounded-full object-cover">
                        <span class="text-sm sm:text-base text-primary font-medium">Andi Pratama</span>
                    </div>
                </div>

                <div class="rating-card min-w-full md:min-w-[calc(50%-12px)] bg-[#F5F5F5] rounded-xl sm:rounded-2xl p-6 sm:p-7 md:p-8">
                    <p class="text-lg sm:text-xl md:text-2xl text-primary leading-relaxed mb-6 sm:mb-7 md:mb-8">
                        "Cuilan Swargi is the perfect spot to relax and reconnect with nature."
                    </p>
                    <div class="flex items-center gap-3 sm:gap-4">
                        <img src="https://i.pravatar.cc/100?img=32" class="w-11 h-11 sm:w-12 sm:h-12 rounded-full object-cover">
                        <span class="text-sm sm:text-base text-primary font-medium">Siti Rahmawati</span>
                    </div>
                </div>

                <div class="rating-card min-w-full md:min-w-[calc(50%-12px)] bg-[#F5F5F5] rounded-xl sm:rounded-2xl p-6 sm:p-7 md:p-8">
                    <p class="text-lg sm:text-xl md:text-2xl text-primary leading-relaxed mb-6 sm:mb-7 md:mb-8">
                        "A hidden gem for anyone looking to escape the busy city life."
                    </p>
                    <div class="flex items-center gap-3 sm:gap-4">
                        <img src="https://i.pravatar.cc/100?img=45" class="w-11 h-11 sm:w-12 sm:h-12 rounded-full object-cover">
                        <span class="text-sm sm:text-base text-primary font-medium">Rizky Maulana</span>
                    </div>
                </div>

                <div class="rating-card min-w-full md:min-w-[calc(50%-12px)] bg-[#F5F5F5] rounded-xl sm:rounded-2xl p-6 sm:p-7 md:p-8">
                    <p class="text-lg sm:text-xl md:text-2xl text-primary leading-relaxed mb-6 sm:mb-7 md:mb-8">
                        "Every corner feels thoughtfully designed and full of warmth."
                    </p>
                    <div class="flex items-center gap-3 sm:gap-4">
                        <img src="https://i.pravatar.cc/100?img=22" class="w-11 h-11 sm:w-12 sm:h-12 rounded-full object-cover">
                        <span class="text-sm sm:text-base text-primary font-medium">Dewi Lestari</span>
                    </div>
                </div>

                <div class="rating-card min-w-full md:min-w-[calc(50%-12px)] bg-[#F5F5F5] rounded-xl sm:rounded-2xl p-6 sm:p-7 md:p-8">
                    <p class="text-lg sm:text-xl md:text-2xl text-primary leading-relaxed mb-6 sm:mb-7 md:mb-8">
                        "The atmosphere here is calm, refreshing, and truly unforgettable."
                    </p>
                    <div class="flex items-center gap-3 sm:gap-4">
                        <img src="https://i.pravatar.cc/100?img=51" class="w-11 h-11 sm:w-12 sm:h-12 rounded-full object-cover">
                        <span class="text-sm sm:text-base text-primary font-medium">Budi Santoso</span>
                    </div>
                </div>

                <div class="rating-card min-w-full md:min-w-[calc(50%-12px)] bg-[#F5F5F5] rounded-xl sm:rounded-2xl p-6 sm:p-7 md:p-8">
                    <p class="text-lg sm:text-xl md:text-2xl text-primary leading-relaxed mb-6 sm:mb-7 md:mb-8">
                        "It feels like a private paradise surrounded by nature."
                    </p>
                    <div class="flex items-center gap-3 sm:gap-4">
                        <img src="https://i.pravatar.cc/100?img=60" class="w-11 h-11 sm:w-12 sm:h-12 rounded-full object-cover">
                        <span class="text-sm sm:text-base text-primary font-medium">Kevin Alexander</span>
                    </div>
                </div>

                <div class="rating-card min-w-full md:min-w-[calc(50%-12px)] bg-[#F5F5F5] rounded-xl sm:rounded-2xl p-6 sm:p-7 md:p-8">
                    <p class="text-lg sm:text-xl md:text-2xl text-primary leading-relaxed mb-6 sm:mb-7 md:mb-8">
                        "Highly recommended for families and couples who love serenity."
                    </p>
                    <div class="flex items-center gap-3 sm:gap-4">
                        <img src="https://i.pravatar.cc/100?img=65" class="w-11 h-11 sm:w-12 sm:h-12 rounded-full object-cover">
                        <span class="text-sm sm:text-base text-primary font-medium">Jonathan William</span>
                    </div>
                </div>

                <div class="rating-card min-w-full md:min-w-[calc(50%-12px)] bg-[#F5F5F5] rounded-xl sm:rounded-2xl p-6 sm:p-7 md:p-8">
                    <p class="text-lg sm:text-xl md:text-2xl text-primary leading-relaxed mb-6 sm:mb-7 md:mb-8">
                        "The service was excellent and the environment felt very exclusive."
                    </p>
                    <div class="flex items-center gap-3 sm:gap-4">
                        <img src="https://i.pravatar.cc/100?img=70" class="w-11 h-11 sm:w-12 sm:h-12 rounded-full object-cover">
                        <span class="text-sm sm:text-base text-primary font-medium">Steven Tan</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<script>
document.addEventListener("DOMContentLoaded", function () {

    /* ACCORDION */
    document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', function () {
            const item = this.parentElement;
            const content = item.querySelector('.accordion-content');
            const icon = item.querySelector('.accordion-icon');
            const isOpen = content.style.maxHeight && content.style.maxHeight !== "0px";

            if (isOpen) {
                content.style.maxHeight = "0px";
                icon.style.transform = "rotate(0deg)";
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.style.transform = "rotate(180deg)";
            }
        });
    });

    /* SLIDER */
    const slider = document.getElementById('ratingsSlider');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    if (slider && prevBtn && nextBtn) {
        let currentIndex = 0;
        const cards = document.querySelectorAll('.rating-card');
        const totalCards = cards.length;

        function getCardsPerView() {
            if (window.innerWidth >= 1024) return 3;
            if (window.innerWidth >= 768) return 2;
            return 1;
        }

        function updateSlider() {
            const cardsPerView = getCardsPerView();
            const maxIndex = totalCards - cardsPerView;
            if (currentIndex > maxIndex) currentIndex = maxIndex;

            const cardWidth = cards[0].offsetWidth;
            const gap = window.innerWidth >= 768 ? 24 : (window.innerWidth >= 640 ? 20 : 16);
            slider.style.transform = `translateX(-${currentIndex * (cardWidth + gap)}px)`;
        }

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) { currentIndex--; updateSlider(); }
        });

        nextBtn.addEventListener('click', () => {
            const maxIndex = totalCards - getCardsPerView();
            if (currentIndex < maxIndex) { currentIndex++; updateSlider(); }
        });

        setInterval(() => {
            const maxIndex = totalCards - getCardsPerView();
            currentIndex = currentIndex < maxIndex ? currentIndex + 1 : 0;
            updateSlider();
        }, 5000);

        window.addEventListener('resize', updateSlider);
        updateSlider();
    }

    /* SMOOTH SCROLL */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

});
</script>

@endsection