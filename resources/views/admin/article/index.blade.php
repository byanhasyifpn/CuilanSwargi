@extends('layouts.admin')

@section('title', 'Kelola Artikel')
@section('header', 'Kelola Artikel')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.article.create') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition inline-block">
        + Tambah Artikel
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if($articles->count() > 0)
        <table class="min-w-full">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Gambar</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Judul</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal Publish</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($articles as $article)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $article->image) }}" 
                                 alt="{{ $article->title }}" 
                                 class="w-20 h-20 object-cover rounded">
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-800">{{ $article->title }}</span>
                            <br>
                            <span class="text-sm text-gray-500">{{ Str::limit($article->excerpt, 60) }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($article->is_published)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Published
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            {{ $article->published_at ? $article->published_at->format('d M Y') : '-' }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.article.show', $article) }}" 
                                   class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition"
                                   title="Lihat">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.article.edit', $article) }}" 
                                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.article.toggle-publish', $article) }}" 
                                      method="POST" 
                                      class="inline">
                                    @csrf
                                    <button type="submit" 
                                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition"
                                            title="{{ $article->is_published ? 'Unpublish' : 'Publish' }}">
                                        @if($article->is_published)
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd"></path>
                                                <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        @endif
                                    </button>
                                </form>
                                <form action="{{ route('admin.article.destroy', $article) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
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
            {{ $articles->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">Belum ada artikel. Klik tombol "Tambah Artikel" untuk menambahkan.</p>
        </div>
    @endif
</div>
@endsection