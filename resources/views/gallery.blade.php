@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<!-- Header Section -->
<section class="bg-primary text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Galeri Cuilan Swargi</h1>
        <p class="text-secondary text-lg">Lihat keindahan alam yang menakjubkan di Cuilan Swargi</p>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-16">
    <div class="container mx-auto px-4">
        @if($galleries->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($galleries as $gallery)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                        <div class="aspect-w-16 aspect-h-12 bg-gray-200">
                            <img src="{{ asset('storage/' . $gallery->image) }}" 
                                 alt="{{ $gallery->title }}" 
                                 class="w-full h-64 object-cover">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-primary">{{ $gallery->title }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <div class="bg-secondary/30 rounded-lg p-12 max-w-md mx-auto">
                    <svg class="w-24 h-24 text-primary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-gray-600 text-lg">Belum ada galeri yang ditampilkan</p>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection