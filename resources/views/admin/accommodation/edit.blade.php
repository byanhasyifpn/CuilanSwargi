@extends('layouts.admin')

@section('title', 'Edit Penginapan')
@section('header', 'Edit Penginapan')

@section('content')
<div class="max-w-full sm:max-w-2xl">
    <div class="bg-white rounded-lg shadow-md p-5 sm:p-8">
        <form action="{{ route('admin.accommodation.update', $accommodation->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-5 sm:mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                    Nama/Nomor Kamar <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name', $accommodation->name) }}"
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
                       value="{{ old('capacity', $accommodation->capacity) }}"
                       min="1"
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('capacity') border-red-500 @enderror"
                       required>
                @error('capacity')
                    <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <hr class="my-5 sm:my-6">

            <h3 class="text-base sm:text-lg font-semibold mb-4">Tipe Service</h3>

            <div id="services-wrapper">

                @foreach($accommodation->services as $index => $service)
                    <div class="border p-4 rounded-lg mb-4 bg-gray-50 service-item relative">

                        <button type="button"
                                onclick="removeService(this)"
                                class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 text-xs rounded hover:bg-red-600">
                            Hapus
                        </button>

                        <div class="mb-3">
                            <label class="block font-semibold mb-1 text-sm">Nama Service</label>
                            <input type="text"
                                   name="services[{{ $index }}][name]"
                                   value="{{ $service->name }}"
                                   class="w-full border px-3 py-2 rounded text-sm"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="block font-semibold mb-1 text-sm">Harga</label>
                            <input type="text"
                                   name="services[{{ $index }}][price]"
                                   value="{{ number_format($service->price, 0, ',', '.') }}"
                                   class="w-full border px-3 py-2 rounded text-sm"
                                   oninput="formatPrice(this)"
                                   required>
                        </div>

                        <div>
                            <label class="block font-semibold mb-1 text-sm">Fasilitas</label>
                            <textarea name="services[{{ $index }}][facilities]"
                                      rows="3"
                                      class="w-full border px-3 py-2 rounded text-sm"
                                      required>{{ $service->facilities }}</textarea>
                        </div>
                    </div>
                @endforeach

            </div>

            <button type="button"
                    onclick="addService()"
                    class="mb-5 sm:mb-6 bg-green-500 text-white px-4 py-2 rounded text-sm sm:text-base hover:bg-green-600 transition">
                + Tambah Service
            </button>

            {{-- CURRENT IMAGES --}}
            <div class="mb-5 sm:mb-6">
                <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">Gambar Saat Ini</label>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mb-4">
                    @foreach($accommodation->images as $image)
                        <div id="image-{{ $image->id }}" class="relative">
                            <img src="{{ asset('storage/' . $image->image) }}" 
                                 alt="Image" 
                                 class="w-full h-28 sm:h-32 object-cover rounded-lg">

                            <button type="button"
                                    onclick="deleteImage({{ $image->id }})"
                                    class="absolute top-1.5 right-1.5 bg-red-500 text-white p-1.5 rounded-full hover:bg-red-600">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- ADD NEW IMAGES --}}
            <div class="mb-5 sm:mb-6">
                <label for="images" class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                    Tambah Gambar Baru (Opsional)
                </label>
                <input type="file" 
                       id="images" 
                       name="images[]" 
                       accept="image/*"
                       multiple
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('images.*') border-red-500 @enderror"
                       onchange="previewImages(event)">
                @error('images.*')
                    <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror

                <div id="preview" class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-3"></div>
            </div>

            <div class="flex flex-wrap gap-3">
                <button type="submit" 
                        class="bg-primary text-white px-5 sm:px-6 py-2.5 sm:py-3 rounded-lg hover:bg-primary/90 transition text-sm sm:text-base">
                    Update
                </button>
                <a href="{{ route('admin.accommodation.index') }}" 
                   class="bg-gray-500 text-white px-5 sm:px-6 py-2.5 sm:py-3 rounded-lg hover:bg-gray-600 transition text-sm sm:text-base">
                    Batal
                </a>
            </div>

        </form>

        {{-- FORM DELETE IMAGE TERPISAH --}}
        <form id="delete-image-form" method="POST" style="display:none;">
            @csrf
            @method('DELETE')
        </form>

    </div>
</div>

<script>

function formatPrice(input) {
    let value = input.value.replace(/\D/g, '');
    value = new Intl.NumberFormat('id-ID').format(value);
    input.value = value;
}

function deleteImage(id) {
    if (confirm('Yakin ingin menghapus gambar ini?')) {
        fetch('/admin/accommodation-image/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('image-' + id).remove();
        })
        .catch(error => console.error(error));
    }
}

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
            img.className = 'w-full h-28 sm:h-32 object-cover rounded-lg';
            preview.appendChild(img);
        }
        
        reader.readAsDataURL(file);
    }
}

let serviceIndex = {{ $accommodation->services->count() }};

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
                       required>
            </div>

            <div class="mb-3">
                <label class="block font-semibold mb-1 text-sm">Harga</label>
                <input type="text"
                       name="services[${serviceIndex}][price]"
                       class="w-full border px-3 py-2 rounded text-sm"
                       oninput="formatPrice(this)"
                       required>
            </div>

            <div>
                <label class="block font-semibold mb-1 text-sm">Fasilitas</label>
                <textarea name="services[${serviceIndex}][facilities]"
                          rows="3"
                          class="w-full border px-3 py-2 rounded text-sm"
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
