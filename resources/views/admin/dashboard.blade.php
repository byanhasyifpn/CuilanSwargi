@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Gallery Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm mb-1">Total Galeri</p>
                <h3 class="text-3xl font-bold text-primary">{{ $galleryCount }}</h3>
            </div>
            <div class="bg-primary/10 p-4 rounded-full">
                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>
        <a href="{{ route('admin.gallery.index') }}" class="block mt-4 text-primary hover:text-primary/80 font-semibold">
            Kelola Galeri &rarr;
        </a>
    </div>

    <!-- Accommodation Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm mb-1">Total Penginapan</p>
                <h3 class="text-3xl font-bold text-primary">{{ $accommodationCount }}</h3>
            </div>
            <div class="bg-primary/10 p-4 rounded-full">
                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
            </div>
        </div>
        <a href="{{ route('admin.accommodation.index') }}" class="block mt-4 text-primary hover:text-primary/80 font-semibold">
            Kelola Penginapan &rarr;
        </a>
    </div>

    <!-- Article Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm mb-1">Total Artikel</p>
                <h3 class="text-3xl font-bold text-primary">{{ $articleCount }}</h3>
                <p class="text-sm text-gray-500 mt-1">{{ $publishedArticleCount }} Dipublikasikan</p>
            </div>
            <div class="bg-primary/10 p-4 rounded-full">
                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
        </div>
        <a href="{{ route('admin.article.index') }}" class="block mt-4 text-primary hover:text-primary/80 font-semibold">
            Kelola Artikel &rarr;
        </a>
    </div>
</div>

<!-- Welcome Message -->
<div class="bg-white rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold text-primary mb-4">Selamat Datang di Admin Panel!</h2>
    <p class="text-gray-600 mb-4">
        Gunakan menu di sebelah kiri untuk mengelola konten website Cuilan Swargi. 
        Anda dapat menambah, mengedit, atau menghapus galeri, informasi penginapan, dan artikel.
    </p>
    <div class="bg-secondary/30 p-4 rounded-lg">
        <p class="text-gray-700">
            <strong>Tips:</strong> Pastikan gambar yang diupload memiliki kualitas baik dan ukuran yang sesuai 
            untuk tampilan optimal di website. Untuk artikel, gunakan editor teks untuk format yang lebih baik.
        </p>
    </div>
</div>
@endsection