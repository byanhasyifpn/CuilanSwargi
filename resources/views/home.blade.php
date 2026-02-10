@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400&family=Newsreader:ital,opsz,wght@0,6..72,300;0,6..72,400;0,6..72,500;1,6..72,300;1,6..72,400&display=swap');
    
    body {
        font-family: 'Newsreader', serif;
    }
    
    .font-crimson {
        font-family: 'Crimson Text', serif;
    }
</style>

<!-- Hero Section -->
<section class="px-4 py-8 md:py-12 max-w-[1400px] mx-auto">
  <div
    class="relative min-h-[780px] md:min-h-[840px] lg:min-h-[900px]
           rounded-3xl overflow-hidden shadow-2xl"
  >

    <!-- Background Image -->
    <img
      src="{{ asset('images/hero.png') }}"
      alt="Cuilan Swargi"
      class="absolute inset-0 w-full h-full object-cover"
    >

    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-black/40 to-black/80"></div>

    <!-- Text Content -->
    <div class="relative z-10 pt-36 px-8 md:px-16 font-aeonik">
        <h1 class="font-crimson
                    text-5xl md:text-6xl lg:text-7xl xl:text-8xl
                    font-semibold text-[#F5F2D0] mb-4 leading-tight">
            Cuilan Swargi
        </h1>

        <p class="text-2xl md:text-3xl lg:text-4xl
                    text-white font-light italic mb-3">
            Be Present, Be Authentic, Live Slow
        </p>

        <p class="text-lg md:text-xl lg:text-2xl text-white/80">
            A Tiny Piece of Heaven
        </p>
    </div>


    <!-- Feature Cards -->
    <div class="absolute bottom-28 left-1/2 -translate-x-1/2 w-[92%] z-20">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Card 1 -->
        <div class="backdrop-blur-lg bg-white/15 rounded-2xl p-6 text-white
                    border border-white/20
                    shadow-[0_30px_60px_-20px_rgba(0,0,0,0.6)]">
          <div class="w-12 h-12 flex items-center justify-center rounded-xl border border-white/30 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M3 9.75L12 4.5l9 5.25M4.5 10.5V19.5h15V10.5" />
            </svg>
          </div>
          <h3 class="text-lg font-medium mb-1">Stay Experience</h3>
          <p class="text-sm text-white/80">
            Enjoy cozy cabins surrounded by nature, perfect for escaping the busy city life and relaxing.
          </p>
        </div>

        <!-- Card 2 -->
        <div class="backdrop-blur-lg bg-white/15 rounded-2xl p-6 text-white
                    border border-white/20
                    shadow-[0_30px_60px_-20px_rgba(0,0,0,0.6)]">
          <div class="w-12 h-12 flex items-center justify-center rounded-xl border border-white/30 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M8 3v10M12 3v10M16 3v10M5 13h14" />
            </svg>
          </div>
          <h3 class="text-lg font-medium mb-1">Food & Beverages</h3>
          <p class="text-sm text-white/80">
            Healthy and natural food made from fresh local ingredients.
          </p>
        </div>

        <!-- Card 3 -->
        <div class="backdrop-blur-lg bg-white/15 rounded-2xl p-6 text-white
                    border border-white/20
                    shadow-[0_30px_60px_-20px_rgba(0,0,0,0.6)]">
          <div class="w-12 h-12 flex items-center justify-center rounded-xl border border-white/30 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>
          </div>
          <h3 class="text-lg font-medium mb-1">Moments & Memories</h3>
          <p class="text-sm text-white/80">
            Perfect place to spend quality time with people you love.
          </p>
        </div>

      </div>
    </div>

  </div>
</section>




<section class="py-16 md:py-24 px-4 md:px-8 max-w-[1400px] mx-auto">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
        <div>
            <h2 class="font-crimson text-3xl md:text-4xl lg:text-5xl font-semibold text-primary mb-3">
                A place to stay, a place to breathe.
            </h2>
            <p class="text-gray-600 max-w-xl">
                Thoughtfully designed spaces surrounded by nature.
            </p>
        </div>

        <a href="{{ route('accommodation') }}"
           class="mt-6 md:mt-0 inline-flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-full hover:bg-primary/90 transition">
            View All
            <span class="text-lg">↗</span>
        </a>
    </div>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($accommodations as $item)
        <div class="relative group rounded-3xl overflow-hidden">
            <!-- Image -->
            <img 
                src="{{ $item->images->first() 
                        ? asset('storage/'.$item->images->first()->image) 
                        : asset('images/placeholder.jpg') }}"
                class="w-full h-[420px] object-cover group-hover:scale-110 transition duration-700"
                alt="{{ $item->name }}">

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

            <!-- Content -->
            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                <h3 class="font-crimson text-2xl font-semibold mb-2">
                    {{ $item->name }}
                </h3>

                <div class="flex items-center gap-2 text-sm mb-2 opacity-90">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
                    </svg>
                    <span>{{ $item->capacity }} Guests</span>
                </div>

                <p class="text-sm mb-4 opacity-90">
                    IDR {{ number_format($item->price, 0, ',', '.') }} / night
                </p>

                <a href="{{ route('accommodation') }}"
                   class="inline-block w-full text-center border border-white/40 py-2 rounded-full hover:bg-white hover:text-primary transition">
                    View Details
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>


<!-- Moments Section -->
<section class="bg-[#2E514B] py-20 md:py-28 px-4 md:px-8">
    <div class="max-w-[1400px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        
        <!-- Image -->
        <div>
            <img src="{{ asset('images/moments.png') }}" 
                 alt="Moments at Cuilan Swargi" 
                 class="w-full h-[450px] md:h-[550px] lg:h-[650px] object-cover rounded-3xl">
        </div>
        
        <!-- Text -->
        <div class="text-white">
            
            <!-- Title -->
            <h2 class="font-crimson text-4xl md:text-5xl font-medium mb-2">
                Moments That
            </h2>

            <h3 class="font-crimson text-5xl md:text-6xl italic font-semibold mb-6">
                Brought Us Together
            </h3>

            <!-- Decorative Icon -->
            <div class="text-white text-2xl mb-6">
                ✺
            </div>
            
            <!-- Paragraph -->
            <p class="text-lg md:text-xl text-white/80 leading-relaxed max-w-xl">
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
<section class="bg-[#ffff] py-20 md:py-28 px-6 md:px-12 w-full">

    <div class="w-full">

        <!-- Header -->
        <div class="flex flex-col lg:flex-row justify-between gap-10 mb-16">
            
            <div class="max-w-2xl">
                <span class="inline-block border border-primary text-primary px-5 py-2 rounded-full text-sm font-medium mb-6">
                    Our Impact
                </span>

                <h2 class="font-crimson text-4xl md:text-5xl text-primary leading-tight">
                    Creating spaces for moments that matter
                </h2>
            </div>

            <div class="max-w-xl text-primary/80 text-lg leading-relaxed">
                Cuilan Swargi is a place where nature, community, and experience come together.
                We thoughtfully design each moment to inspire connection and lasting memories.
            </div>
        </div>

        <!-- Accordion -->
        <div class="space-y-6">

            <!-- Item -->
            <div class="accordion-item bg-[#F5F5F5] rounded-3xl overflow-hidden transition-all duration-500">
                
                <div class="accordion-header cursor-pointer px-10 py-8 flex justify-between items-center text-primary text-2xl">
                    <span>Creating Meaningful Experiences Rooted in Nature</span>
                    <span class="accordion-icon text-2xl transition-transform duration-300">↘</span>
                </div>

                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-500">
                    <div class="bg-[#2f5d50] text-white px-10 py-10">
                        <div class="border-l border-white/40 pl-6 text-white/80 text-lg leading-relaxed">
                            We design immersive nature-based experiences that reconnect people with the environment. 
                            Each visit is crafted to encourage reflection, appreciation, and meaningful shared moments.
                        </div>
                    </div>
                </div>
            </div>


            <!-- Item -->
            <div class="accordion-item bg-[#F5F5F5] rounded-3xl overflow-hidden transition-all duration-500">
                
                <div class="accordion-header cursor-pointer px-10 py-8 flex justify-between items-center text-primary text-2xl">
                    <span>Visitors & Experiences Shared</span>
                    <span class="accordion-icon text-2xl transition-transform duration-300">↘</span>
                </div>

                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-500">
                    <div class="bg-[#2f5d50] text-white px-10 py-10">
                        <div class="border-l border-white/40 pl-6 text-white/80 text-lg leading-relaxed">
                            Thousands of guests have created stories here — from family retreats to 
                            community gatherings. Each experience strengthens bonds and builds lasting memories.
                        </div>
                    </div>
                </div>
            </div>


            <!-- Item -->
            <div class="accordion-item bg-[#F5F5F5] rounded-3xl overflow-hidden transition-all duration-500">
                
                <div class="accordion-header cursor-pointer px-10 py-8 flex justify-between items-center text-primary text-2xl">
                    <span>Community & Cultural Connection</span>
                    <span class="accordion-icon text-2xl transition-transform duration-300">↘</span>
                </div>

                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-500">
                    <div class="bg-[#2f5d50] text-white px-10 py-10">
                        <div class="border-l border-white/40 pl-6 text-white/80 text-lg leading-relaxed">
                            We collaborate with local artisans and communities to celebrate cultural heritage, 
                            support livelihoods, and foster meaningful connections between visitors and locals.
                        </div>
                    </div>
                </div>
            </div>


            <!-- Item -->
            <div class="accordion-item bg-[#F5F5F5] rounded-3xl overflow-hidden transition-all duration-500">
                
                <div class="accordion-header cursor-pointer px-10 py-8 flex justify-between items-center text-primary text-2xl">
                    <span>Committed to Sustainable Growth</span>
                    <span class="accordion-icon text-2xl transition-transform duration-300">↘</span>
                </div>

                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-500">
                    <div class="bg-[#2f5d50] text-white px-10 py-10">
                        <div class="border-l border-white/40 pl-6 text-white/80 text-lg leading-relaxed">
                            Sustainability guides our development — from eco-friendly design to 
                            responsible tourism practices that protect nature for future generations.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Ratings Section -->
<section class="py-20 px-6 md:px-12 bg-[#ffff]">
    <div class="max-w-[1400px] mx-auto">

        <!-- Header + Arrow -->
        <div class="flex justify-between items-center mb-14">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-semibold text-primary leading-snug">
                What People Say About Their Experience <br class="hidden md:block">
                at Cuilan Swargi
            </h2>

            <div class="flex gap-4">
                <button id="prevBtn" class="w-12 h-12 rounded-full border border-primary text-primary hover:bg-primary hover:text-white transition flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <button id="nextBtn" class="w-12 h-12 rounded-full border border-primary text-primary hover:bg-primary hover:text-white transition flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Slider -->
        <div class="overflow-hidden">
            <div id="ratingsSlider" class="flex gap-10 transition-transform duration-500 ease-in-out">

                <!-- 1 -->
                <div class="rating-card min-w-full md:min-w-[calc(50%-20px)] bg-[#F5F5F5] rounded-3xl  p-10">
                    <p class="text-2xl md:text-3xl text-primary leading-relaxed mb-10">
                        “Such a peaceful and beautiful place. The view is absolutely breathtaking!”
                    </p>
                    <div class="flex items-center gap-5">
                        <img src="https://i.pravatar.cc/100?img=12" class="w-14 h-14 rounded-full object-cover">
                        <span class="text-lg text-primary font-medium">Andi Pratama</span>
                    </div>
                </div>

                <!-- 2 -->
                <div class="rating-card min-w-full md:min-w-[calc(50%-20px)] bg-[#F5F5F5] rounded-3xl p-10">
                    <p class="text-2xl md:text-3xl text-primary leading-relaxed mb-10">
                        “Cuilan Swargi is the perfect spot to relax and reconnect with nature.”
                    </p>
                    <div class="flex items-center gap-5">
                        <img src="https://i.pravatar.cc/100?img=32" class="w-14 h-14 rounded-full object-cover">
                        <span class="text-lg text-primary font-medium">Siti Rahmawati</span>
                    </div>
                </div>

                <!-- 3 -->
                <div class="rating-card min-w-full md:min-w-[calc(50%-20px)] bg-[#F5F5F5] rounded-3xl   p-10">
                    <p class="text-2xl md:text-3xl text-primary leading-relaxed mb-10">
                        “A hidden gem for anyone looking to escape the busy city life.”
                    </p>
                    <div class="flex items-center gap-5">
                        <img src="https://i.pravatar.cc/100?img=45" class="w-14 h-14 rounded-full object-cover">
                        <span class="text-lg text-primary font-medium">Rizky Maulana</span>
                    </div>
                </div>

                <!-- 4 -->
                <div class="rating-card min-w-full md:min-w-[calc(50%-20px)] bg-[#F5F5F5] rounded-3xl   p-10">
                    <p class="text-2xl md:text-3xl text-primary leading-relaxed mb-10">
                        “Every corner feels thoughtfully designed and full of warmth.”
                    </p>
                    <div class="flex items-center gap-5">
                        <img src="https://i.pravatar.cc/100?img=22" class="w-14 h-14 rounded-full object-cover">
                        <span class="text-lg text-primary font-medium">Dewi Lestari</span>
                    </div>
                </div>

                <!-- 5 -->
                <div class="rating-card min-w-full md:min-w-[calc(50%-20px)] bg-[#F5F5F5] rounded-3xl   p-10">
                    <p class="text-2xl md:text-3xl text-primary leading-relaxed mb-10">
                        “The atmosphere here is calm, refreshing, and truly unforgettable.”
                    </p>
                    <div class="flex items-center gap-5">
                        <img src="https://i.pravatar.cc/100?img=51" class="w-14 h-14 rounded-full object-cover">
                        <span class="text-lg text-primary font-medium">Budi Santoso</span>
                    </div>
                </div>

                <!-- 6 -->
                <div class="rating-card min-w-full md:min-w-[calc(50%-20px)] bg-[#F5F5F5] rounded-3xl   p-10">
                    <p class="text-2xl md:text-3xl text-primary leading-relaxed mb-10">
                        “It feels like a private paradise surrounded by nature.”
                    </p>
                    <div class="flex items-center gap-5">
                        <img src="https://i.pravatar.cc/100?img=60" class="w-14 h-14 rounded-full object-cover">
                        <span class="text-lg text-primary font-medium">Kevin Alexander</span>
                    </div>
                </div>

                <!-- 7 -->
                <div class="rating-card min-w-full md:min-w-[calc(50%-20px)] bg-[#F5F5F5] rounded-3xl   p-10">
                    <p class="text-2xl md:text-3xl text-primary leading-relaxed mb-10">
                        “Highly recommended for families and couples who love serenity.”
                    </p>
                    <div class="flex items-center gap-5">
                        <img src="https://i.pravatar.cc/100?img=65" class="w-14 h-14 rounded-full object-cover">
                        <span class="text-lg text-primary font-medium">Jonathan William</span>
                    </div>
                </div>

                <!-- 8 -->
                <div class="rating-card min-w-full md:min-w-[calc(50%-20px)] bg-[#F5F5F5] rounded-3xl p-10">
                    <p class="text-2xl md:text-3xl text-primary leading-relaxed mb-10">
                        “The service was excellent and the environment felt very exclusive.”
                    </p>
                    <div class="flex items-center gap-5">
                        <img src="https://i.pravatar.cc/100?img=70" class="w-14 h-14 rounded-full object-cover">
                        <span class="text-lg text-primary font-medium">Steven Tan</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



<script>
document.addEventListener("DOMContentLoaded", function () {

    /* =========================
       ACCORDION
       Semua bisa terbuka
       Background hijau saat terbuka
    ========================== */

    document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', function () {

            const item = this.parentElement;
            const content = item.querySelector('.accordion-content');
            const icon = item.querySelector('.accordion-icon');

            const isOpen = content.style.maxHeight && content.style.maxHeight !== "0px";

            if (isOpen) {
                // Tutup
                content.style.maxHeight = "0px";
                content.style.backgroundColor = "";
                icon.style.transform = "rotate(0deg)";
            } else {
                // Buka
                content.style.maxHeight = content.scrollHeight + "px";
                content.style.backgroundColor = "#16a34a"; // hijau
                icon.style.transform = "rotate(180deg)";
            }
        });
    });


    /* =========================
       SLIDER
    ========================== */

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

            if (currentIndex > maxIndex) {
                currentIndex = maxIndex;
            }

            const cardWidth = cards[0].offsetWidth;
            const gap = 32; // 2rem
            const offset = currentIndex * (cardWidth + gap);

            slider.style.transform = `translateX(-${offset}px)`;
        }

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });

        nextBtn.addEventListener('click', () => {
            const cardsPerView = getCardsPerView();
            const maxIndex = totalCards - cardsPerView;

            if (currentIndex < maxIndex) {
                currentIndex++;
                updateSlider();
            }
        });

        // Auto slide
        setInterval(() => {
            const cardsPerView = getCardsPerView();
            const maxIndex = totalCards - cardsPerView;

            if (currentIndex < maxIndex) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }

            updateSlider();
        }, 5000);

        window.addEventListener('resize', updateSlider);

        updateSlider();
    }


    /* =========================
       SMOOTH SCROLL
    ========================== */

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const target = document.querySelector(this.getAttribute('href'));

            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

});
</script>

@endsection