@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<!-- Header -->
<section class="pt-24 pb-12">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-semibold text-primary mb-5">
            Explored Cuilan Swargi
        </h1>
        <p class="text-gray-500 max-w-3xl mx-auto leading-relaxed">
            Lorem ipsum dolor sit amet consectetur adipiscing elit.
            Sit amet consectetur adipiscing elit quisque faucibus ex.
            Adipiscing elit quisque faucibus ex sapien vitae pellentesque.
        </p>
    </div>
</section>

<!-- Gallery -->
<section class="pb-28">
    <div class="max-w-7xl mx-auto px-6">

        @if($galleries->count() > 0)

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">

            @foreach($galleries as $index => $gallery)
                <div 
                    onclick="openModal({{ $index }})"
                    class="cursor-pointer group relative rounded-2xl overflow-hidden bg-gray-100 hover:shadow-lg transition-all duration-300">

                    <div class="aspect-square overflow-hidden">
                        <img 
                            src="{{ asset('storage/' . $gallery->image) }}"
                            alt="{{ $gallery->title }}"
                            class="w-full h-full object-cover transition-all duration-500 group-hover:scale-110 group-hover:brightness-90"
                        >
                    </div>

                    <!-- Overlay dengan title (muncul saat hover) -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <h3 class="text-white text-sm font-medium line-clamp-2">{{ $gallery->title }}</h3>
                    </div>

                    <!-- Icon zoom indicator -->
                    <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm p-2 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 transform group-hover:scale-100 scale-90">
                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"></path>
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

<!-- MODAL -->
<div id="imageModal"
     class="fixed inset-0 hidden z-[9999] flex items-center justify-center
            bg-black/70 backdrop-blur-sm">

    <!-- Close -->
    <button onclick="closeModal()" 
        class="absolute top-6 right-8 text-white text-4xl font-light hover:opacity-70 transition">
        &times;
    </button>

    <!-- Prev -->
    <button onclick="prevSlide()" 
        class="absolute left-6 md:left-12 text-white text-4xl hover:opacity-70 transition">
        ❮
    </button>

    <!-- Next -->
    <button onclick="nextSlide()" 
        class="absolute right-6 md:right-12 text-white text-4xl hover:opacity-70 transition">
        ❯
    </button>

    <!-- Image Wrapper -->
    <div class="text-center px-6">

        <img id="modalImage"
             class="max-h-[80vh] mx-auto rounded-2xl shadow-2xl object-contain transition duration-300">

        <h2 id="modalTitle"
            class="text-white text-2xl mt-6 font-medium">
        </h2>

    </div>

</div>



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

    // ESC to close
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