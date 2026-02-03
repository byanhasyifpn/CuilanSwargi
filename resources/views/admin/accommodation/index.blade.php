@extends('layouts.admin')

@section('title', 'Kelola Penginapan')
@section('header', 'Kelola Penginapan')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.accommodation.create') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition inline-block">
        + Tambah Penginapan
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if($accommodations->count() > 0)
        <table class="min-w-full">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nama Kamar</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Kapasitas</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Jumlah Gambar</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($accommodations as $accommodation)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-800">{{ $accommodation->name }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            {{ $accommodation->capacity }} Orang
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            {{ $accommodation->images_count }} Gambar
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            {{ $accommodation->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.accommodation.edit', $accommodation) }}" 
                                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.accommodation.destroy', $accommodation) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus penginapan ini?')"
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
            {{ $accommodations->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">Belum ada penginapan. Klik tombol "Tambah Penginapan" untuk menambahkan.</p>
        </div>
    @endif
</div>
@endsection