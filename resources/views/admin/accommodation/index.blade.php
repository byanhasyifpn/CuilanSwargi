@extends('layouts.admin')

@section('title', 'Kelola Penginapan')
@section('header', 'Kelola Penginapan')

@section('content')
<div class="mb-4 sm:mb-6">
    <a href="{{ route('admin.accommodation.create') }}" class="bg-primary text-white px-4 sm:px-6 py-2.5 sm:py-3 text-sm sm:text-base rounded-lg hover:bg-primary/90 transition inline-block">
        + Tambah Penginapan
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if($accommodations->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs sm:text-sm font-semibold whitespace-nowrap">Nama Kamar</th>
                        <th class="px-4 py-3 text-left text-xs sm:text-sm font-semibold whitespace-nowrap">Kapasitas</th>
                        <th class="px-4 py-3 text-left text-xs sm:text-sm font-semibold whitespace-nowrap hidden sm:table-cell">Jumlah Gambar</th>
                        <th class="px-4 py-3 text-left text-xs sm:text-sm font-semibold whitespace-nowrap hidden md:table-cell">Tanggal</th>
                        <th class="px-4 py-3 text-left text-xs sm:text-sm font-semibold whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($accommodations as $accommodation)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <span class="font-semibold text-gray-800 text-sm sm:text-base">{{ $accommodation->name }}</span>
                            </td>
                            <td class="px-4 py-3 text-gray-600 text-sm whitespace-nowrap">
                                {{ $accommodation->capacity }} Orang
                            </td>
                            <td class="px-4 py-3 text-gray-600 text-sm hidden sm:table-cell whitespace-nowrap">
                                {{ $accommodation->images_count }} Gambar
                            </td>
                            <td class="px-4 py-3 text-gray-600 text-sm hidden md:table-cell whitespace-nowrap">
                                {{ $accommodation->created_at->format('d M Y') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex flex-col sm:flex-row gap-1.5 sm:gap-2">
                                    <a href="{{ route('admin.accommodation.edit', $accommodation) }}" 
                                       class="bg-blue-500 text-white px-3 py-2 rounded hover:bg-blue-600 transition text-xs sm:text-sm whitespace-nowrap text-center">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.accommodation.destroy', $accommodation) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Yakin ingin menghapus penginapan ini?')"
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
            {{ $accommodations->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500 text-sm sm:text-lg">Belum ada penginapan. Klik tombol "Tambah Penginapan" untuk menambahkan.</p>
        </div>
    @endif
</div>
@endsection