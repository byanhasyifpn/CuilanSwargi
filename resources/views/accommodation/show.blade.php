@extends('layouts.app')

@section('title', $accommodation->name)

@section('content')

<section class="bg-[#F8F8F6] pt-16 sm:pt-20 pb-24">

    <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <!-- Back Button -->
        <a href="{{ route('accommodation') }}" 
           class="inline-flex items-center gap-2 mb-8 text-primary hover:opacity-70 transition">
            ← Back
        </a>

        <!-- Image Slider -->
        <div class="relative rounded-3xl overflow-hidden shadow-lg mb-12 group">

            <div id="slider" class="flex transition-transform duration-500 ease-in-out">
                @foreach($accommodation->images as $image)
                    <img src="{{ asset('storage/'.$image->image) }}"
                         class="w-full h-[300px] sm:h-[420px] md:h-[500px] object-cover flex-shrink-0">
                @endforeach
            </div>

            <!-- Overlay Gradient -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent pointer-events-none"></div>

            <!-- Buttons -->
            <button onclick="prevSlide()"
                    class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/60 hover:bg-white transition backdrop-blur-md w-11 h-11 rounded-full shadow-md flex items-center justify-center">
                ←
            </button>

            <button onclick="nextSlide()"
                    class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/60 hover:bg-white transition backdrop-blur-md w-11 h-11 rounded-full shadow-md flex items-center justify-center">
                →
            </button>

        </div>

        <!-- Title & Book Button -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-6 mb-12">

            <div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl text-primary font-semibold leading-tight"
                    style="font-family:'Crimson Text', serif;">
                    {{ $accommodation->name }}
                </h1>

                <p class="text-gray-500 mt-3 max-w-2xl">
                    Experience tranquility surrounded by nature, crafted for comfort and quiet luxury.
                </p>
            </div>

            <a href="#"
               class="inline-block bg-primary text-white px-8 py-3 rounded-full text-sm tracking-wide hover:opacity-90 transition shadow-md">
                Book Now
            </a>

        </div>

        <!-- Services Section -->
<div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm relative overflow-hidden">

  <!-- Top accent line -->
  <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-primary via-primary/70 to-primary"></div>

  <!-- Section label -->
  <div class="flex items-center justify-center gap-3 mb-2">
    <span class="h-px w-10 bg-primary/40"></span>
    <span class="text-primary text-[0.65rem] font-medium tracking-[0.2em] uppercase">
      What We Offer
    </span>
    <span class="h-px w-10 bg-primary/40"></span>
  </div>

  <!-- Title -->
  <h2 class="text-center text-3xl sm:text-4xl font-medium text-primary mb-10"
      style="font-family: 'Cormorant Garamond', serif; letter-spacing: 0.01em;">
    Available Services
  </h2>

  <!-- Grid -->
  <div class="grid sm:grid-cols-2 gap-5">

    @foreach($accommodation->services as $service)
    <div class="group bg-gray-50 border border-gray-200 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-primary">

      <!-- Icon -->
      <div class="w-11 h-11 bg-primary rounded-xl flex items-center justify-center mb-4">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
             stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
          <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
          <polyline points="9 22 9 12 15 12 15 22"/>
        </svg>
      </div>

      <!-- Name + Price -->
      <div class="flex items-start justify-between gap-3 mb-4">
        <h3 class="text-xl font-semibold text-primary leading-snug"
            style="font-family: 'Cormorant Garamond', serif;">
          {{ $service->name }}
        </h3>

        <span class="shrink-0 bg-primary text-white text-xs font-medium tracking-wide px-3 py-1.5 rounded-full">
          IDR {{ number_format($service->price, 0, ',', '.') }}
        </span>
      </div>

      <!-- Divider -->
      <div class="h-px bg-gray-200 mb-4"></div>

      <!-- Facilities -->
      <ul class="space-y-2.5">
        @foreach(explode(',', $service->facilities) as $facility)
        <li class="flex items-start gap-2.5 text-sm text-gray-600 leading-relaxed">
          <span class="mt-0.5 shrink-0 w-4 h-4 rounded-full bg-primary/10 flex items-center justify-center">
            <svg class="w-2.5 h-2.5 text-primary" fill="none" stroke="currentColor" stroke-width="2.5"
                 stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 12 12">
              <polyline points="2 6 5 9 10 3"/>
            </svg>
          </span>
          <span>{{ trim($facility) }}</span>
        </li>
        @endforeach
      </ul>

    </div>
    @endforeach

  </div>

</div>

    </div>

</section>

<script>
let currentIndex = 0;
const slider = document.getElementById('slider');
const totalSlides = slider.children.length;

function updateSlide() {
    slider.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlide();
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateSlide();
}
</script>

@endsection