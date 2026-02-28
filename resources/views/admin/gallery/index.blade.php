@extends('layouts.admin')

@section('title', 'Kelola Galeri')
@section('header', 'Kelola Galeri')

@section('content')
<div class="mb-4 sm:mb-6">
    <a href="{{ route('admin.gallery.create') }}" class="bg-primary text-white px-4 sm:px-6 py-2.5 sm:py-3 text-sm sm:text-base rounded-lg hover:bg-primary/90 transition inline-block">
        + Tambah Galeri
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if($galleries->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs sm:text-sm font-semibold whitespace-nowrap">Gambar</th>
                        <th class="px-4 py-3 text-left text-xs sm:text-sm font-semibold whitespace-nowrap">Judul</th>
                        <th class="px-4 py-3 text-left text-xs sm:text-sm font-semibold whitespace-nowrap hidden sm:table-cell">Tanggal</th>
                        <th class="px-4 py-3 text-left text-xs sm:text-sm font-semibold whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($galleries as $gallery)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <img src="{{ asset('storage/' . $gallery->image) }}" 
                                     alt="{{ $gallery->title }}" 
                                     class="w-14 h-14 sm:w-20 sm:h-20 object-cover rounded">
                            </td>
                            <td class="px-4 py-3 max-w-[140px] sm:max-w-xs">
                                <span class="font-semibold text-gray-800 text-sm sm:text-base block truncate">{{ $gallery->title }}</span>
                            </td>
                            <td class="px-4 py-3 text-gray-600 text-sm hidden sm:table-cell whitespace-nowrap">
                                {{ $gallery->created_at->format('d M Y') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex flex-col sm:flex-row gap-1.5 sm:gap-2">
                                    <a href="{{ route('admin.gallery.edit', $gallery) }}" 
                                       class="bg-blue-500 text-white px-3 py-2 rounded hover:bg-blue-600 transition text-xs sm:text-sm whitespace-nowrap text-center">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.gallery.destroy', $gallery) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Yakin ingin menghapus galeri ini?')"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600 transition text-xs sm:text-sm whitespace-nowrap w-full">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-4 sm:px-6 py-4">
            {{ $galleries->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500 text-sm sm:text-lg">Belum ada galeri. Klik tombol "Tambah Galeri" untuk menambahkan.</p>
        </div>
    @endif
</div>
@endsection