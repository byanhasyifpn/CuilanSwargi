@extends('layouts.admin')

@section('title', 'Tambah Galeri')
@section('header', 'Tambah Galeri')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow-md p-8">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="title" class="block text-gray-700 font-semibold mb-2">
                    Judul Galeri <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('title') border-red-500 @enderror"
                       required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-semibold mb-2">
                    Gambar <span class="text-red-500">*</span>
                </label>
                <input type="file" 
                       id="image" 
                       name="image" 
                       accept="image/*"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('image') border-red-500 @enderror"
                       onchange="previewImage(event)"
                       required>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG, GIF. Maksimal 2MB</p>

                <div id="preview" class="mt-4 hidden">
                    <img id="preview-image" class="max-w-full h-64 object-cover rounded-lg">
                </div>
            </div>

            <div class="flex space-x-4">
                <button type="submit" 
                        class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition">
                    Simpan
                </button>
                <a href="{{ route('admin.gallery.index') }}" 
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