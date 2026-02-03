@extends('layouts.admin')

@section('title', 'Edit Penginapan')
@section('header', 'Edit Penginapan')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow-md p-8">
        <form action="{{ route('admin.accommodation.update', $accommodation) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2">
                    Nama/Nomor Kamar <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name', $accommodation->name) }}"
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
                       value="{{ old('capacity', $accommodation->capacity) }}"
                       min="1"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('capacity') border-red-500 @enderror"
                       required>
                @error('capacity')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="facilities" class="block text-gray-700 font-semibold mb-2">
                    Fasilitas <span class="text-red-500">*</span>
                </label>
                <textarea id="facilities" 
                          name="facilities" 
                          rows="5"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('facilities') border-red-500 @enderror"
                          required>{{ old('facilities', $accommodation->facilities) }}</textarea>
                @error('facilities')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-sm mt-1">Pisahkan setiap fasilitas dengan koma (,)</p>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Gambar Saat Ini</label>
                <div class="grid grid-cols-3 gap-4 mb-4">
                    @foreach($accommodation->images as $image)
                        <div class="relative">
                            <img src="{{ asset('storage/' . $image->image) }}" 
                                 alt="Image" 
                                 class="w-full h-32 object-cover rounded-lg">
                            <form action="{{ route('admin.accommodation.image.delete', $image->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus gambar ini?')"
                                  class="absolute top-2 right-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white p-2 rounded-full hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-6">
                <label for="images" class="block text-gray-700 font-semibold mb-2">
                    Tambah Gambar Baru (Opsional)
                </label>
                <input type="file" 
                       id="images" 
                       name="images[]" 
                       accept="image/*"
                       multiple
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('images.*') border-red-500 @enderror"
                       onchange="previewImages(event)">
                @error('images.*')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG, GIF. Maksimal 2MB per gambar</p>

                <div id="preview" class="mt-4 grid grid-cols-3 gap-4"></div>
            </div>

            <div class="flex space-x-4">
                <button type="submit" 
                        class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition">
                    Update
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