@extends('layouts.admin')

@section('title', 'Tambah Artikel')
@section('header', 'Tambah Artikel')

@section('content')
<div class="max-w-full sm:max-w-4xl">
    <div class="bg-white rounded-lg shadow-md p-5 sm:p-8">
        <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-5 sm:mb-6">
                <label for="title" class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                    Judul Artikel <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title') }}"
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('title') border-red-500 @enderror"
                       placeholder="Contoh: Tips Berkunjung ke Cuilan Swargi"
                       required>
                @error('title')
                    <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5 sm:mb-6">
                <label for="image" class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                    Gambar Utama <span class="text-red-500">*</span>
                </label>
                <input type="file" 
                       id="image" 
                       name="image" 
                       accept="image/*"
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('image') border-red-500 @enderror"
                       onchange="previewImage(event)"
                       required>
                @error('image')
                    <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-xs sm:text-sm mt-1">Format: JPG, PNG, GIF. Maksimal 2MB. Resolusi rekomendasi: 1200x630px</p>

                <div id="preview" class="mt-4 hidden">
                    <img id="preview-image" class="max-w-full h-48 sm:h-64 object-cover rounded-lg">
                </div>
            </div>

            <div class="mb-5 sm:mb-6">
                <label for="content" class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                    Isi Artikel <span class="text-red-500">*</span>
                </label>
                <textarea id="content" 
                          name="content" 
                          rows="12"
                          class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('content') border-red-500 @enderror font-mono"
                          placeholder="Tulis isi artikel di sini..."
                          required>{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-xs sm:text-sm mt-1">Tips: Gunakan Enter untuk paragraf baru</p>
            </div>

            <div class="mb-5 sm:mb-6">
                <label class="flex items-center gap-2">
                    <input type="checkbox" 
                           name="is_published" 
                           value="1"
                           {{ old('is_published') ? 'checked' : '' }}
                           class="w-4 h-4 sm:w-5 sm:h-5 text-primary">
                    <span class="text-gray-700 font-semibold text-sm sm:text-base">Publikasikan Artikel</span>
                </label>
                <p class="text-gray-500 text-xs sm:text-sm mt-1">Centang jika ingin langsung mempublikasikan artikel</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <button type="submit" 
                        class="bg-primary text-white px-5 sm:px-6 py-2.5 sm:py-3 rounded-lg hover:bg-primary/90 transition text-sm sm:text-base">
                    Simpan Artikel
                </button>
                <a href="{{ route('admin.article.index') }}" 
                   class="bg-gray-500 text-white px-5 sm:px-6 py-2.5 sm:py-3 rounded-lg hover:bg-gray-600 transition text-sm sm:text-base">
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