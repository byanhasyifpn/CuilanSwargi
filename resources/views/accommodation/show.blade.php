@extends('layouts.app')

@section('title', $accommodation->name)

@section('content')

<section class="max-w-6xl mx-auto px-6 py-16">

    <!-- Back Button -->
    <a href="{{ route('accommodation') }}" class="inline-block mb-6 text-primary text-xl">
        ←
    </a>

    <!-- Image Slider -->
    <div class="relative rounded-3xl overflow-hidden mb-10">

        <div id="slider" class="flex transition-transform duration-500">
            @foreach($accommodation->images as $image)
                <img src="{{ asset('storage/'.$image->image) }}"
                     class="w-full h-[420px] object-cover flex-shrink-0">
            @endforeach
        </div>

        <!-- Buttons -->
        <button onclick="prevSlide()"
                class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/40 backdrop-blur-md w-10 h-10 rounded-full">
            ←
        </button>

        <button onclick="nextSlide()"
                class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/40 backdrop-blur-md w-10 h-10 rounded-full">
            →
        </button>

    </div>

    <!-- Title & Book Button -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl text-primary font-semibold">
            {{ $accommodation->name }}
        </h1>

        <a href="#"
           class="bg-primary text-white px-6 py-2 rounded-full hover:opacity-90 transition">
            Book Now
        </a>
    </div>

    <!-- Services -->
    <div class="bg-gray-100 rounded-3xl p-8">
        <div class="grid md:grid-cols-2 gap-8">

            @foreach($accommodation->services as $service)
            <div class="border rounded-2xl p-6 bg-white">

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-primary">
                        {{ $service->name }}
                    </h2>

                    <span class="text-lg font-semibold text-primary">
                        IDR {{ number_format($service->price, 0, ',', '.') }}
                    </span>
                </div>

                <ul class="space-y-2 text-gray-600">
                    @foreach(explode(',', $service->facilities) as $facility)
                        <li>✓ {{ trim($facility) }}</li>
                    @endforeach
                </ul>

            </div>
            @endforeach

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
