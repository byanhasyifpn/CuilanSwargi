@extends('layouts.admin')

@section('title', 'Kelola Galeri')
@section('header', 'Kelola Galeri')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.gallery.create') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition inline-block">
        + Tambah Galeri
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if($galleries->count() > 0)
        <table class="min-w-full">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Gambar</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Judul</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($galleries as $gallery)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $gallery->image) }}" 
                                 alt="{{ $gallery->title }}" 
                                 class="w-20 h-20 object-cover rounded">
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-800">{{ $gallery->title }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            {{ $gallery->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.gallery.edit', $gallery) }}" 
                                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.gallery.destroy', $gallery) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus galeri ini?')"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="px-6 py-4">
            {{ $galleries->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">Belum ada galeri. Klik tombol "Tambah Galeri" untuk menambahkan.</p>
        </div>
    @endif
</div>
@endsection