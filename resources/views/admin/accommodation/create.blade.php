@extends('layouts.admin')

@section('title', 'Tambah Penginapan')
@section('header', 'Tambah Penginapan')

@section('content')
<div class="max-w-full sm:max-w-2xl">
    <div class="bg-white rounded-lg shadow-md p-5 sm:p-8">
        <form action="{{ route('admin.accommodation.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-5 sm:mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                    Nama/Nomor Kamar <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}"
                       placeholder="Contoh: Kamar Deluxe 1"
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('name') border-red-500 @enderror"
                       required>
                @error('name')
                    <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5 sm:mb-6">
                <label for="capacity" class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                    Kapasitas (Orang) <span class="text-red-500">*</span>
                </label>
                <input type="number" 
                       id="capacity" 
                       name="capacity" 
                       value="{{ old('capacity') }}"
                       min="1"
                       placeholder="Contoh: 4"
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('capacity') border-red-500 @enderror"
                       required>
                @error('capacity')
                    <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5 sm:mb-6">
                <label for="images" class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                    Gambar Kamar <span class="text-red-500">*</span>
                </label>
                <input type="file" 
                       id="images" 
                       name="images[]" 
                       accept="image/*"
                       multiple
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('images.*') border-red-500 @enderror"
                       onchange="previewImages(event)"
                       required>

                @error('images.*')
                    <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror

                <p class="text-gray-500 text-xs sm:text-sm mt-1">
                    Pilih beberapa gambar. Format: JPG, PNG, GIF. Maksimal 2MB per gambar
                </p>

                <div id="preview" class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-3"></div>
            </div>

            <hr class="my-5 sm:my-6">

            <h3 class="text-base sm:text-lg font-semibold mb-4">Tipe Service</h3>

            <div id="services-wrapper"></div>

            <button type="button"
                    onclick="addService()"
                    class="mb-5 sm:mb-6 bg-green-500 text-white px-4 py-2 rounded text-sm sm:text-base hover:bg-green-600 transition">
                + Tambah Service
            </button>

            <div class="flex flex-wrap gap-3">
                <button type="submit"
                        onclick="this.disabled=true; this.innerText='Menyimpan...'; this.form.submit();"
                        class="bg-primary text-white px-5 sm:px-6 py-2.5 sm:py-3 rounded-lg hover:bg-primary/90 transition text-sm sm:text-base">
                    Simpan
                </button>

                <a href="{{ route('admin.accommodation.index') }}" 
                   class="bg-gray-500 text-white px-5 sm:px-6 py-2.5 sm:py-3 rounded-lg hover:bg-gray-600 transition text-sm sm:text-base">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>

    

let selectedFiles = [];

function formatPrice(input) {

    let value = input.value.replace(/\D/g, '');

    value = new Intl.NumberFormat('id-ID').format(value);

    input.value = value;
}

function previewImages(event) {

    const input = event.target;
    const preview = document.getElementById('preview');

    for (let i = 0; i < input.files.length; i++) {
        const file = input.files[i];

        selectedFiles.push(file);

        const reader = new FileReader();

        reader.onload = function(e) {

            const wrapper = document.createElement('div');
            wrapper.className = "relative";

            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'w-full h-28 sm:h-32 object-cover rounded-lg';

            const removeBtn = document.createElement('button');
            removeBtn.innerHTML = "✕";
            removeBtn.type = "button";
            removeBtn.className = "absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center hover:bg-red-600";

            const index = selectedFiles.length - 1;

            removeBtn.onclick = function() {
                removeImage(wrapper, index);
            };

            wrapper.appendChild(img);
            wrapper.appendChild(removeBtn);

            preview.appendChild(wrapper);
        }

        reader.readAsDataURL(file);
    }

    updateInputFiles();
}


function removeImage(wrapper, index) {

    selectedFiles.splice(index, 1);

    wrapper.remove();

    updateInputFiles();
}


function updateInputFiles() {

    const input = document.getElementById('images');

    const dataTransfer = new DataTransfer();

    selectedFiles.forEach(file => {
        dataTransfer.items.add(file);
    });

    input.files = dataTransfer.files;
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
                <label class="block font-semibold mb-1 text-sm">Nama Service</label>
                <input type="text"
                       name="services[${serviceIndex}][name]"
                       class="w-full border px-3 py-2 rounded text-sm"
                       placeholder="Contoh: Room Only"
                       required>
            </div>

            <div class="mb-3">
                <label class="block font-semibold mb-1 text-sm">Harga</label>
                <input type="text"
                    name="services[${serviceIndex}][price]"
                    class="w-full border px-3 py-2 rounded text-sm price-input"
                    placeholder="Contoh: 975.000"
                    oninput="formatPrice(this)"
                    required>
            </div>

            <div>
                <label class="block font-semibold mb-1 text-sm">Fasilitas (Pisahkan dengan koma)</label>
                <textarea name="services[${serviceIndex}][facilities]"
                          rows="3"
                          class="w-full border px-3 py-2 rounded text-sm"
                          placeholder="Contoh: Sarapan, Trekking, Api Unggun"
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