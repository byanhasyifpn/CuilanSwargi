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

            <hr class="my-6">

                        <h3 class="text-lg font-semibold mb-4">Tipe Service</h3>

                        <div id="services-wrapper"></div>

                        <button type="button"
                                onclick="addService()"
                    class="mb-6 bg-green-500 text-white px-4 py-2 rounded">
                + Tambah Service
            </button>


            <div class="flex space-x-4">
                <button type="submit"
                        onclick="this.disabled=true; this.innerText='Menyimpan...'; this.form.submit();"
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

    let serviceIndex = 0;

function addService() {
    const wrapper = document.getElementById('services-wrapper');

    const html = `
        <div class="border p-4 rounded-lg mb-4 bg-gray-50 service-item relative">

            <button type="button"
                    onclick="removeService(this)"
                    class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 text-xs rounded hover:bg-red-600">
                Hapus
            </button>

            <div class="mb-3">
                <label class="block font-semibold mb-1">Nama Service</label>
                <input type="text"
                       name="services[${serviceIndex}][name]"
                       class="w-full border px-3 py-2 rounded"
                       placeholder="Contoh: Room Only"
                       required>
            </div>

            <div class="mb-3">
                <label class="block font-semibold mb-1">Harga</label>
                <input type="number"
                       name="services[${serviceIndex}][price]"
                       class="w-full border px-3 py-2 rounded"
                       placeholder="Contoh: 975000"
                       required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Fasilitas</label>
                <textarea name="services[${serviceIndex}][facilities]"
                          rows="3"
                          class="w-full border px-3 py-2 rounded"
                          placeholder="Pisahkan dengan koma"
                          required></textarea>
            </div>
        </div>
    `;

    wrapper.insertAdjacentHTML('beforeend', html);
    serviceIndex++;
}

function removeService(button) {
    if (confirm('Yakin ingin menghapus service ini?')) {
        const serviceItem = button.closest('.service-item');
        serviceItem.remove();
    }
}

</script>
@endsection