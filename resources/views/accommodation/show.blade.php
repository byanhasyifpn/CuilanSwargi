@extends('layouts.app')

@section('title', $accommodation->name)

@section('content')

<section class="bg-[#F8F8F6] pt-10 sm:pt-12 pb-16">

    <div class="w-full px-4 sm:px-6 md:px-10 lg:px-16">

        <!-- Back Button -->
        <a href="{{ route('accommodation') }}" 
           class="inline-flex items-center gap-2 mb-6 text-primary hover:opacity-70 transition text-sm">
            ← Back
        </a>

        <!-- Image Slider -->
        <div class="relative rounded-3xl overflow-hidden shadow-lg mb-10 group">

            <div id="slider" class="flex transition-transform duration-500 ease-in-out">
                @foreach($accommodation->images as $image)
                    <img src="{{ asset('storage/'.$image->image) }}"
                         class="w-full h-[260px] sm:h-[380px] md:h-[460px] object-cover flex-shrink-0 cursor-pointer"
                         onclick="openModal({{ $loop->index }})"> 
                @endforeach
            </div>

            <!-- Overlay Gradient -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent pointer-events-none"></div>

            <!-- Buttons -->
            <button onclick="prevSlide()"
                    class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/60 hover:bg-white transition backdrop-blur-md w-10 h-10 rounded-full shadow-md flex items-center justify-center">
                ←
            </button>

            <button onclick="nextSlide()"
                    class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/60 hover:bg-white transition backdrop-blur-md w-10 h-10 rounded-full shadow-md flex items-center justify-center">
                →
            </button>

        </div>

        <!-- Title & Book Button -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-5 mb-10">

            <div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl text-primary font-semibold leading-tight"
                    style="font-family:'Crimson Text', serif;">
                    {{ $accommodation->name }}
                </h1>

                <p class="text-gray-500 mt-2 max-w-xl text-sm sm:text-base">
                    Experience tranquility surrounded by nature, crafted for comfort and quiet luxury.
                </p>
            </div>

            <a href="{{ route('booking.create', ['accommodation_id' => $accommodation->id]) }}"
               class="inline-block bg-primary text-white px-6 py-2.5 rounded-full text-xs sm:text-sm tracking-wide hover:opacity-90 transition shadow-md">
                Book Now
            </a>

        </div>

        <!-- Services Section -->
        <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-sm relative overflow-hidden">

            <!-- Top accent line -->
            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-primary via-primary/70 to-primary"></div>

            <!-- Section label -->
            <div class="flex items-center justify-center gap-3 mb-2">
                <span class="h-px w-8 bg-primary/40"></span>
                <span class="text-primary text-[0.6rem] font-medium tracking-[0.2em] uppercase">
                    What We Offer
                </span>
                <span class="h-px w-8 bg-primary/40"></span>
            </div>

            <!-- Title -->
            <h2 class="text-center text-2xl sm:text-3xl font-medium text-primary mb-8"
                style="font-family: 'Cormorant Garamond', serif;">
                Available Services
            </h2>

            <!-- Grid -->
            <div class="grid sm:grid-cols-2 gap-4">

                @foreach($accommodation->services as $service)
                <div class="group bg-gray-50 border border-gray-200 rounded-2xl p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-primary">

                    <!-- Icon -->
                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center mb-3">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                             stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                    </div>

                    <!-- Name + Price -->
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <h3 class="text-lg font-semibold text-primary leading-snug"
                            style="font-family: 'Cormorant Garamond', serif;">
                            {{ $service->name }}
                        </h3>

                        <span class="shrink-0 bg-primary text-white text-[11px] font-medium px-3 py-1 rounded-full">
                            IDR {{ number_format($service->price, 0, ',', '.') }}
                        </span>
                    </div>

                    <!-- Divider -->
                    <div class="h-px bg-gray-200 mb-3"></div>

                    <!-- Facilities -->
                    <ul class="space-y-2">
                        @foreach(explode(',', $service->facilities) as $facility)
                        <li class="flex items-start gap-2 text-xs sm:text-sm text-gray-600 leading-relaxed">
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

   <!-- Image Preview Modal -->
<div id="imageModal"
     class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden items-center justify-center z-[9999]">

    <div class="relative w-full max-w-5xl px-4">

        <!-- Close Button -->
        <button onclick="closeModal()"
                class="absolute -top-12 right-4 text-white text-3xl">
            ✕
        </button>

        <!-- Image Container -->
        <div class="overflow-hidden rounded-2xl">
            <div id="modalSlider" class="flex transition-transform duration-500 ease-in-out">
                @foreach($accommodation->images as $image)
                    <img src="{{ asset('storage/'.$image->image) }}"
                         class="w-full max-h-[80vh] object-contain flex-shrink-0">
                @endforeach
            </div>
        </div>

        <!-- Prev Button -->
        <button onclick="prevModalSlide()"
                class="absolute left-0 top-1/2 -translate-y-1/2 text-white text-3xl px-4">
            ‹
        </button>

        <!-- Next Button -->
        <button onclick="nextModalSlide()"
                class="absolute right-0 top-1/2 -translate-y-1/2 text-white text-3xl px-4">
            ›
        </button>

    </div>
</div>

</section>

<script>
document.addEventListener("DOMContentLoaded", function () {

    /* ================= MAIN SLIDER ================= */

    let currentIndex = 0;
    const slider = document.getElementById('slider');
    const totalSlides = slider.children.length;

    function updateSlide() {
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    window.nextSlide = function () {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateSlide();
    }

    window.prevSlide = function () {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateSlide();
    }


    /* ================= MODAL ================= */

    let modalIndex = 0;
    const modal = document.getElementById('imageModal');
    const modalSlider = document.getElementById('modalSlider');

    window.openModal = function(index) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modalIndex = index;
        updateModalSlide();
    }

    window.closeModal = function() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function updateModalSlide() {
        modalSlider.style.transform = `translateX(-${modalIndex * 100}%)`;
    }

    window.nextModalSlide = function() {
        modalIndex = (modalIndex + 1) % totalSlides;
        updateModalSlide();
    }

    window.prevModalSlide = function() {
        modalIndex = (modalIndex - 1 + totalSlides) % totalSlides;
        updateModalSlide();
    }

});
</script>

@endsection