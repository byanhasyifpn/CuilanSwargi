@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="bg-primary text-white">
    <div class="container mx-auto px-4 py-20">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-5xl font-bold mb-6">Selamat Datang di Cuilan Swargi</h1>
            <p class="text-xl text-secondary mb-8">
                Nikmati keindahan alam yang memukau di tengah pegunungan Slamet. 
                Tempat sempurna untuk melepas penat dan menyatu dengan alam.
            </p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('gallery') }}" class="bg-secondary text-primary px-8 py-3 rounded-lg font-semibold hover:bg-secondary/90 transition">
                    Lihat Galeri
                </a>
                <a href="{{ route('accommodation') }}" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Info Penginapan
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl font-bold text-primary text-center mb-12">Tentang Cuilan Swargi</h2>
            
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-primary mb-3">Pemandangan Menakjubkan</h3>
                    <p class="text-gray-600">
                        Dikelilingi oleh hamparan hijau pegunungan dan udara segar yang menyegarkan jiwa. 
                        Pemandangan sunrise dan sunset yang spektakuler.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-primary mb-3">Penginapan Nyaman</h3>
                    <p class="text-gray-600">
                        Fasilitas penginapan yang bersih dan nyaman dengan berbagai pilihan kamar. 
                        Cocok untuk keluarga maupun rombongan.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-primary mb-3">Lokasi Strategis</h3>
                    <p class="text-gray-600">
                        Mudah diakses dari pusat kota Purwokerto dengan jarak tempuh yang tidak terlalu jauh. 
                        Petunjuk arah yang jelas.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-primary mb-3">Suasana Tenang</h3>
                    <p class="text-gray-600">
                        Jauh dari kebisingan kota, tempat yang sempurna untuk relaksasi dan quality time 
                        bersama keluarga atau teman.
                    </p>
                </div>
            </div>

            <div class="bg-secondary/30 p-8 rounded-lg text-center">
                <h3 class="text-2xl font-bold text-primary mb-4">Kenapa Memilih Cuilan Swargi?</h3>
                <p class="text-gray-700 mb-6">
                    Cuilan Swargi bukan hanya sekedar tempat wisata, tetapi destinasi yang menawarkan pengalaman 
                    tak terlupakan. Dengan perpaduan keindahan alam yang asri, fasilitas yang memadai, dan 
                    pelayanan yang ramah, kami berkomitmen memberikan pengalaman terbaik untuk setiap pengunjung.
                </p>
                <p class="text-gray-700 font-semibold">
                    Jadikan setiap momen berharga bersama kami di Cuilan Swargi - Surga Kecil di Banyumas!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-primary text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Siap Merasakan Pengalaman Berbeda?</h2>
        <p class="text-secondary text-lg mb-8">Kunjungi Cuilan Swargi dan ciptakan kenangan indah Anda!</p>
        <a href="{{ route('accommodation') }}" class="inline-block bg-secondary text-primary px-8 py-3 rounded-lg font-semibold hover:bg-secondary/90 transition">
            Pesan Penginapan Sekarang
        </a>
    </div>
</section>
@endsection