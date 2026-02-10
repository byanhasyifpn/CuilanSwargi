@extends('layouts.admin')

@section('title', 'Tambah Penginapan')
@section('header', 'Tambah Penginapan')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow-md p-8">
        <form action="{{ route('admin.accommodation.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2">
                    Nama/Nomor Kamar <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}"
                       placeholder="Contoh: Kamar Deluxe 1"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('name') border-red-500 @enderror"
                       required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="capacity" class="block text-gray-700 font-semibold mb-2">
                    Kapasitas (Orang) <span class="text-red-500">*</span>
                </label>
                <input type="number" 
                       id="capacity" 
                       name="capacity" 
                       value="{{ old('capacity') }}"
                       min="1"
                       placeholder="Contoh: 4"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('capacity') border-red-500 @enderror"
                       required>
                @error('capacity')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Harga per malam.</label>
                <input type="number" name="price" required placeholder="Contoh: 250000"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('capacity') border-red-500 @enderror"
                required>
            </div>


            <div class="mb-6">
                <label for="facilities" class="block text-gray-700 font-semibold mb-2">
                    Fasilitas <span class="text-red-500">*</span>
                </label>
                <textarea id="facilities" 
                          name="facilities" 
                          rows="5"
                          placeholder="Pisahkan setiap fasilitas dengan koma.&#10;Contoh: AC, TV, Kamar Mandi Dalam, WiFi, Air Panas"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('facilities') border-red-500 @enderror"
                          required>{{ old('facilities') }}</textarea>
                @error('facilities')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-sm mt-1">Pisahkan setiap fasilitas dengan koma (,)</p>
            </div>

            <div class="mb-6">
                <label for="images" class="block text-gray-700 font-semibold mb-2">
                    Gambar Kamar <span class="text-red-500">*</span>
                </label>
                <input type="file" 
                       id="images" 
                       name="images[]" 
                       accept="image/*"
                       multiple
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('images.*') border-red-500 @enderror"
                       onchange="previewImages(event)"
                       required>
                @error('images.*')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-sm mt-1">Pilih beberapa gambar. Format: JPG, PNG, GIF. Maksimal 2MB per gambar</p>

                <div id="preview" class="mt-4 grid grid-cols-3 gap-4"></div>
            </div>

            <div class="flex space-x-4">
                <button type="submit" 
                        class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition">
                    Simpan
                </button>
                <a href="{{ route('admin.accommodation.index') }}" 
                   class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImages(event) {
        const preview = document.getElementById('preview');
        preview.innerHTML = '';
        const files = event.target.files;
        
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-32 object-cover rounded-lg';
                preview.appendChild(img);
            }
            
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection