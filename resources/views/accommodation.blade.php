@extends('layouts.app')

@section('title', 'Info Penginapan')

@section('content')
<!-- Header Section -->
<section class="bg-primary text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Info Penginapan</h1>
        <p class="text-secondary text-lg">Pilih penginapan yang sesuai dengan kebutuhan Anda</p>
    </div>
</section>

<!-- Accommodation List -->
<section class="py-16">
    <div class="container mx-auto px-4">
        @if($accommodations->count() > 0)
            <div class="space-y-8">
                @foreach($accommodations as $accommodation)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="md:flex">
                            <!-- Image Gallery -->
                            <div class="md:w-1/2">
                                @if($accommodation->images->count() > 0)
                                    <div class="relative">
                                        <div id="carousel-{{ $accommodation->id }}" class="carousel">
                                            @foreach($accommodation->images as $index => $image)
                                                <img src="{{ asset('storage/' . $image->image) }}" 
                                                     alt="{{ $accommodation->name }}" 
                                                     class="w-full h-80 object-cover {{ $index > 0 ? 'hidden' : '' }}"
                                                     data-carousel-item="{{ $accommodation->id }}">
                                            @endforeach
                                        </div>
                                        
                                        @if($accommodation->images->count() > 1)
                                            <button onclick="prevImage({{ $accommodation->id }})" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-primary/80 text-white p-2 rounded-full hover:bg-primary">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                            </button>
                                            <button onclick="nextImage({{ $accommodation->id }})" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-primary/80 text-white p-2 rounded-full hover:bg-primary">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                @else
                                    <div class="bg-gray-200 h-80 flex items-center justify-center">
                                        <p class="text-gray-500">Tidak ada gambar</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Info -->
                            <div class="md:w-1/2 p-8">
                                <h2 class="text-3xl font-bold text-primary mb-4">{{ $accommodation->name }}</h2>
                                
                                <div class="mb-6">
                                    <div class="flex items-center mb-3">
                                        <svg class="w-6 h-6 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        <span class="text-gray-700 font-semibold">Kapasitas: {{ $accommodation->capacity }} Orang</span>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <h3 class="text-xl font-bold text-primary mb-3">Fasilitas</h3>
                                    <div class="grid grid-cols-1 gap-2">
                                        @foreach($accommodation->facilities_array as $facility)
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="text-gray-700">{{ trim($facility) }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <div class="bg-secondary/30 rounded-lg p-12 max-w-md mx-auto">
                    <svg class="w-24 h-24 text-primary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <p class="text-gray-600 text-lg">Belum ada penginapan yang tersedia</p>
                </div>
            </div>
        @endif
    </div>
</section>

<script>
    let currentIndex = {};

    function showImage(accommodationId, index) {
        const images = document.querySelectorAll(`[data-carousel-item="${accommodationId}"]`);
        images.forEach((img, i) => {
            img.classList.toggle('hidden', i !== index);
        });
    }

    function nextImage(accommodationId) {
        const images = document.querySelectorAll(`[data-carousel-item="${accommodationId}"]`);
        if (!currentIndex[accommodationId]) currentIndex[accommodationId] = 0;
        currentIndex[accommodationId] = (currentIndex[accommodationId] + 1) % images.length;
        showImage(accommodationId, currentIndex[accommodationId]);
    }

    function prevImage(accommodationId) {
        const images = document.querySelectorAll(`[data-carousel-item="${accommodationId}"]`);
        if (!currentIndex[accommodationId]) currentIndex[accommodationId] = 0;
        currentIndex[accommodationId] = (currentIndex[accommodationId] - 1 + images.length) % images.length;
        showImage(accommodationId, currentIndex[accommodationId]);
    }
</script>
@endsection