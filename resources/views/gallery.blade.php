@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<!-- ================= HEADER ================= -->
<section class="pt-16 sm:pt-20 pb-16 sm:pb-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="text-3xl sm:text-4xl md:text-5xl text-primary mb-3 sm:mb-6"
            style="font-family:'Crimson Text', serif;">
            Explored Cuilan Swargi
        </h1>
        <p class="text-sm sm:text-base text-gray-500 max-w-2xl mx-auto leading-relaxed">
            Discover moments captured at Cuilan Swargi — glimpses of nature,
            serenity, and the quiet beauty that surrounds every stay.
        </p>
    </div>
</section>


<!-- ================= GALLERY ================= -->
<section class="pb-20 sm:pb-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        @if($galleries->count() > 0)

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5">

            @foreach($galleries as $index => $gallery)
                <div 
                    onclick="openModal({{ $index }})"
                    class="cursor-pointer group relative rounded-xl sm:rounded-2xl overflow-hidden bg-gray-100 hover:shadow-xl transition-all duration-300">

                    <div class="aspect-square overflow-hidden">
                        <img 
                            src="{{ asset('storage/' . $gallery->image) }}"
                            alt="{{ $gallery->title }}"
                            class="w-full h-full object-cover transition-all duration-500 group-hover:scale-110 group-hover:brightness-90"
                        >
                    </div>

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-3 sm:p-4">
                        <h3 class="text-white text-xs sm:text-sm font-medium line-clamp-2">
                            {{ $gallery->title }}
                        </h3>
                    </div>

                    <!-- Zoom Icon -->
                    <div class="absolute top-2 right-2 sm:top-3 sm:right-3 bg-white/90 backdrop-blur-sm p-1.5 sm:p-2 rounded-full opacity-0 group-hover:opacity-100 transition duration-300">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/>
                        </svg>
                    </div>

                </div>
            @endforeach

        </div>

        @else

            <div class="text-center py-20">
                <p class="text-gray-500 text-lg">
                    Belum ada galeri yang ditampilkan
                </p>
            </div>

        @endif

    </div>
</section>



<!-- ================= MODAL ================= -->
<div id="imageModal"
     class="fixed inset-0 hidden z-[9999] flex items-center justify-center
            bg-black/80 backdrop-blur-sm">

    <!-- Close -->
    <button onclick="closeModal()" 
        class="absolute top-4 right-5 sm:top-6 sm:right-8 text-white text-3xl sm:text-4xl font-light hover:opacity-70 transition">
        &times;
    </button>

    <!-- Prev -->
    <button onclick="prevSlide()" 
        class="absolute left-3 sm:left-8 text-white text-3xl sm:text-4xl hover:opacity-70 transition">
        ❮
    </button>

    <!-- Next -->
    <button onclick="nextSlide()" 
        class="absolute right-3 sm:right-8 text-white text-3xl sm:text-4xl hover:opacity-70 transition">
        ❯
    </button>

    <!-- Image Wrapper -->
    <div class="text-center px-4 sm:px-6 w-full max-w-5xl">

        <img id="modalImage"
             class="max-h-[75vh] sm:max-h-[85vh] mx-auto rounded-xl sm:rounded-2xl shadow-2xl object-contain transition duration-300">

        <h2 id="modalTitle"
            class="text-white text-lg sm:text-2xl mt-4 sm:mt-6 font-medium px-4">
        </h2>

    </div>

</div>



<!-- ================= SCRIPT ================= -->
<script>

    let galleries = [
        @foreach($galleries as $gallery)
            {
                image: "{{ asset('storage/' . $gallery->image) }}",
                title: "{{ $gallery->title }}"
            },
        @endforeach
    ];

    let currentIndex = 0;

    function openModal(index) {
        currentIndex = index;
        showSlide();
        document.getElementById('imageModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    function showSlide() {
        document.getElementById('modalImage').src = galleries[currentIndex].image;
        document.getElementById('modalTitle').innerText = galleries[currentIndex].title;
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % galleries.length;
        showSlide();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + galleries.length) % galleries.length;
        showSlide();
    }

    // Keyboard Navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") closeModal();
        if (e.key === "ArrowRight") nextSlide();
        if (e.key === "ArrowLeft") prevSlide();
    });

    // Click outside close
    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target.id === 'imageModal') closeModal();
    });

</script>

@endsection