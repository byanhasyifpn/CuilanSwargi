@extends('layouts.admin')

@section('title', 'Edit Artikel')
@section('header', 'Edit Artikel')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-lg shadow-md p-8">
        <form action="{{ route('admin.article.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block text-gray-700 font-semibold mb-2">
                    Judul Artikel <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $article->title) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('title') border-red-500 @enderror"
                       required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Gambar Saat Ini</label>
                <img src="{{ asset('storage/' . $article->image) }}" 
                     alt="{{ $article->title }}" 
                     class="w-full max-w-2xl h-auto object-cover rounded-lg mb-4">
            </div>

            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-semibold mb-2">
                    Ganti Gambar (Opsional)
                </label>
                <input type="file" 
                       id="image" 
                       name="image" 
                       accept="image/*"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('image') border-red-500 @enderror"
                       onchange="previewImage(event)">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengganti gambar</p>

                <div id="preview" class="mt-4 hidden">
                    <p class="text-gray-700 font-semibold mb-2">Preview Gambar Baru:</p>
                    <img id="preview-image" class="max-w-full h-64 object-cover rounded-lg">
                </div>
            </div>

            <div class="mb-6">
                <label for="excerpt" class="block text-gray-700 font-semibold mb-2">
                    Ringkasan/Excerpt (Opsional)
                </label>
                <textarea id="excerpt" 
                          name="excerpt" 
                          rows="3"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('excerpt') border-red-500 @enderror">{{ old('excerpt', $article->excerpt) }}</textarea>
                @error('excerpt')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="content" class="block text-gray-700 font-semibold mb-2">
                    Isi Artikel <span class="text-red-500">*</span>
                </label>
                <textarea id="content" 
                          name="content" 
                          rows="15"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('content') border-red-500 @enderror font-mono"
                          required>{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" 
                           name="is_published" 
                           value="1"
                           {{ old('is_published', $article->is_published) ? 'checked' : '' }}
                           class="mr-2 w-5 h-5 text-primary">
                    <span class="text-gray-700 font-semibold">Publikasikan Artikel</span>
                </label>
                @if($article->published_at)
                    <p class="text-gray-500 text-sm mt-1">Terakhir dipublikasikan: {{ $article->published_at->format('d M Y H:i') }}</p>
                @endif
            </div>

            <div class="flex space-x-4">
                <button type="submit" 
                        class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition">
                    Update Artikel
                </button>
                <a href="{{ route('admin.article.index') }}" 
                   class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const previewImage = document.getElementById('preview-image');
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection