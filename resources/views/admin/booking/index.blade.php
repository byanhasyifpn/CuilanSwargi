@extends('layouts.admin')

@section('title', 'Kelola Booking')
@section('header', 'Kelola Booking')

@section('content')

@php
    use App\Models\Booking;
    $pending   = Booking::where('status','pending')->count();
    $paid      = Booking::where('status','paid')->count();
    $completed = Booking::where('status','completed')->count();
    $total     = $bookings->total();
@endphp

{{-- ── Stats Strip ── --}}
<div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 mb-6">
    <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100 flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-yellow-50 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-medium">Pending</p>
            <p class="text-xl font-bold text-yellow-600">{{ $pending }}</p>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100 flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-medium">Paid</p>
            <p class="text-xl font-bold text-blue-600">{{ $paid }}</p>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100 flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-medium">Completed</p>
            <p class="text-xl font-bold text-green-600">{{ $completed }}</p>
        </div>
    </div>
    <div class="bg-primary rounded-2xl p-4 sm:p-5 shadow-sm flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-white/70 font-medium">Total</p>
            <p class="text-xl font-bold text-white">{{ $total }}</p>
        </div>
    </div>
</div>

{{-- ── Table Card ── --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 px-5 sm:px-6 py-4 border-b border-gray-100">

    <div>
        <h3 class="text-base sm:text-lg font-semibold text-gray-800">Daftar Reservasi</h3>
        <p class="text-xs text-gray-400 mt-0.5">{{ $total }} total booking</p>
    </div>

    <form method="GET" class="flex items-center gap-2">
        @if(request('status'))
            <input type="hidden" name="status" value="{{ request('status') }}">
        @endif

        <div class="relative">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari kode atau nama..."
                class="w-56 text-sm border border-gray-200 rounded-xl px-3 py-2
                       focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10"
            >

            <svg class="w-4 h-4 text-gray-400 absolute right-3 top-2.5"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2"
                      d="M21 21l-4.35-4.35m1.85-5.65a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z"/>
            </svg>
        </div>

        <button
            class="bg-primary text-white text-sm font-semibold px-4 py-2 rounded-xl hover:bg-primary/90 transition">
            Cari
        </button>

    </form>
</div>

{{-- ── Status Filter Buttons ── --}}
<div class="flex flex-wrap items-center gap-2 px-5 sm:px-6 py-3 border-b border-gray-100 bg-gray-50/50">
    @php
        $currentStatus = request('status');
        $search        = request('search');
        $filters = [
            ''          => 'Semua',
            'pending'   => 'Pending',
            'paid'      => 'Paid',
            'completed' => 'Completed',
        ];
        $activeClass   = 'bg-primary text-white border-primary';
        $inactiveClass = 'bg-white text-gray-600 border-gray-200 hover:border-primary hover:text-primary';
        $dotColors = [
            'pending'   => 'bg-yellow-400',
            'paid'      => 'bg-blue-400',
            'completed' => 'bg-green-400',
        ];
    @endphp

    @foreach($filters as $value => $label)
        @php
            $isActive = ($currentStatus === $value);
            $href = route('admin.booking.index', array_filter([
                'status' => $value ?: null,
                'search' => $search ?: null,
            ]));
        @endphp
        <a href="{{ $href }}"
           class="inline-flex items-center gap-1.5 text-xs font-semibold px-3.5 py-1.5 rounded-full border transition-all duration-150
                  {{ $isActive ? $activeClass : $inactiveClass }}">
            @if($value && isset($dotColors[$value]))
                <span class="w-1.5 h-1.5 rounded-full {{ $dotColors[$value] }} inline-block"></span>
            @endif
            {{ $label }}
        </a>
    @endforeach
</div>

    {{-- Bulk action bar --}}
    <div id="bulk-actions"
         class="hidden flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 px-5 sm:px-6 py-3
                border-b border-red-100 bg-red-50/80">
        <p class="text-sm text-red-800">
            <span id="selected-count" class="font-bold">0</span> reservasi dipilih
        </p>
        <div class="flex items-center gap-2">
            <button type="button" onclick="clearSelection()"
                    class="text-xs font-semibold text-gray-600 border border-gray-200 bg-white
                           px-3.5 py-2 rounded-xl hover:bg-gray-50 transition">
                Batal Pilih
            </button>
            <button type="button" onclick="openDeleteModal()"
                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-white bg-red-500
                           px-4 py-2 rounded-xl hover:bg-red-600 transition shadow-sm">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Hapus Terpilih
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-xs uppercase tracking-wide text-gray-400 font-semibold bg-gray-50/80">
                    <th class="text-left px-4 sm:px-5 py-3.5 w-10">
                        <input type="checkbox" id="select-all" title="Pilih semua di halaman ini"
                               class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary/30 cursor-pointer">
                    </th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap">Kode Pesanan</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap">Nama</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap hidden sm:table-cell">Telepon</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap hidden lg:table-cell">Service</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap hidden md:table-cell">Tanggal Menginap</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap">Status</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap">Ubah Status</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($bookings as $booking)
                <tr class="hover:bg-primary/[0.025] transition-colors duration-150 booking-row"
                    data-id="{{ $booking->id }}"
                    data-code="{{ $booking->order_code }}"
                    data-name="{{ $booking->name }}">

                    {{-- Checkbox --}}
                    <td class="px-4 sm:px-5 py-4">
                        <input type="checkbox" value="{{ $booking->id }}"
                               class="booking-checkbox w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary/30 cursor-pointer">
                    </td>

                    {{-- Kode --}}
                    <td class="px-5 sm:px-6 py-4 whitespace-nowrap">
                        <span class="font-mono font-bold text-primary text-xs bg-primary/10 px-2.5 py-1.5 rounded-lg tracking-widest">
                            {{ $booking->order_code }}
                        </span>
                    </td>

                    {{-- Nama --}}
                    <td class="px-5 sm:px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                                <span class="text-primary text-xs font-bold">{{ strtoupper(substr($booking->name,0,1)) }}</span>
                            </div>
                            <span class="font-semibold text-gray-800 text-sm">{{ $booking->name }}</span>
                        </div>
                    </td>

                    {{-- Telepon --}}
                    <td class="px-5 sm:px-6 py-4 text-gray-600 whitespace-nowrap hidden sm:table-cell">{{ $booking->phone }}</td>

                    {{-- Service --}}
                    <td class="px-5 sm:px-6 py-4 hidden lg:table-cell max-w-[200px]">
                        <span class="text-gray-600 text-xs block truncate" title="{{ $booking->service_name }}">{{ $booking->service_name }}</span>
                    </td>

                    {{-- Check-in --}}
                    <td class="px-5 sm:px-6 py-4 whitespace-nowrap hidden md:table-cell">
                        @if($booking->check_in)
                        <div class="flex flex-col text-gray-700 text-xs leading-tight">
                            <div class="flex items-center gap-1">
                                <span class="font-semibold">IN</span>
                                <span>{{ $booking->check_in->format('d M Y') }}</span>
                            </div>

                            @if($booking->check_out)
                            <div class="flex items-center gap-1 text-gray-500">
                                <span class="font-semibold">OUT</span>
                                <span>{{ $booking->check_out->format('d M Y') }}</span>
                            </div>
                            @endif
                        </div>
                        @else
                        <span class="text-gray-400 text-xs">—</span>
                        @endif
                    </td>

                    {{-- Status badge --}}
                    <td class="px-5 sm:px-6 py-4 whitespace-nowrap">
                        @php
                            $colors = [
                                'pending'   => 'bg-yellow-100 text-yellow-700 border border-yellow-200',
                                'paid'      => 'bg-blue-100 text-blue-700 border border-blue-200',
                                'completed' => 'bg-green-100 text-green-700 border border-green-200',
                            ];
                            $dots = ['pending'=>'bg-yellow-500','paid'=>'bg-blue-500','completed'=>'bg-green-500'];
                        @endphp
                        <span class="inline-flex items-center gap-1.5 text-xs font-bold px-2.5 py-1 rounded-full {{ $colors[$booking->status] ?? 'bg-gray-100 text-gray-600' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $dots[$booking->status] ?? 'bg-gray-400' }} inline-block"></span>
                            {{ $booking->status_label }}
                        </span>
                    </td>

                    {{-- Update status --}}
                    <td class="px-5 sm:px-6 py-4 whitespace-nowrap">
                        <form action="{{ route('admin.booking.updateStatus', $booking) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()"
                                    class="text-xs border border-gray-200 rounded-xl px-2.5 py-1.5 bg-white text-gray-700
                                           focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 cursor-pointer transition">
                                <option value="pending"   {{ $booking->status==='pending'   ? 'selected':'' }}>Pending</option>
                                <option value="paid"      {{ $booking->status==='paid'      ? 'selected':'' }}>Paid</option>
                                <option value="completed" {{ $booking->status==='completed' ? 'selected':'' }}>Completed</option>
                            </select>
                        </form>
                    </td>

                    {{-- Aksi --}}
                    <td class="px-5 sm:px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('admin.booking.show', $booking) }}"
                               class="inline-flex items-center gap-1 text-xs font-semibold text-primary border border-primary/30
                                      hover:bg-primary hover:text-white px-3 py-1.5 rounded-xl transition-all duration-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Detail
                            </a>
                            <button type="button"
                                    onclick="openDeleteModal({{ $booking->id }})"
                                    title="Hapus booking"
                                    class="inline-flex items-center gap-1 text-xs font-semibold text-red-600 border border-red-200
                                           hover:bg-red-500 hover:text-white hover:border-red-500 px-3 py-1.5 rounded-xl transition-all duration-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-6 py-16 text-center">
                        <div class="flex flex-col items-center gap-3 max-w-sm mx-auto">
                            <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <p class="font-semibold text-gray-500">Belum ada booking</p>
                            <p class="text-xs text-gray-400">Booking dari user akan tampil di sini secara otomatis.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($bookings->hasPages())
    <div class="px-5 sm:px-6 py-4 border-t border-gray-100 bg-gray-50/40">
        {{ $bookings->links() }}
    </div>
    @endif
</div>

{{-- Form hapus massal (terpisah dari tabel agar tidak bentrok dengan form ubah status) --}}
<form id="bulk-delete-form" action="{{ route('admin.booking.bulkDestroy') }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
    <div id="bulk-delete-inputs"></div>
</form>

{{-- Modal konfirmasi hapus --}}
<div id="delete-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/50" onclick="closeDeleteModal()"></div>
    <div class="relative bg-white rounded-2xl shadow-xl max-w-md w-full border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-base font-bold text-gray-900">Konfirmasi Hapus Reservasi</h4>
                    <p class="text-xs text-gray-500 mt-0.5">Tindakan ini tidak dapat dibatalkan</p>
                </div>
            </div>
        </div>
        <div class="px-6 py-4">
            <p class="text-sm text-gray-700 mb-3">
                Anda yakin ingin menghapus <strong id="modal-count">0</strong> reservasi berikut?
            </p>
            <ul id="modal-booking-list"
                class="max-h-40 overflow-y-auto text-sm text-gray-600 space-y-1.5 bg-gray-50 rounded-xl p-3 border border-gray-100">
            </ul>
            <p class="text-xs text-red-600 font-medium mt-4">
                Data reservasi yang dihapus tidak dapat dipulihkan kembali.
            </p>
        </div>
        <div class="px-6 py-4 bg-gray-50 flex flex-col-reverse sm:flex-row sm:justify-end gap-2">
            <button type="button" onclick="closeDeleteModal()"
                    class="text-sm font-semibold text-gray-600 border border-gray-200 bg-white
                           px-5 py-2.5 rounded-xl hover:bg-gray-100 transition">
                Batal
            </button>
            <button type="button" onclick="confirmDelete()"
                    class="text-sm font-semibold text-white bg-red-500 px-5 py-2.5 rounded-xl
                           hover:bg-red-600 transition shadow-sm">
                Ya, Hapus Permanen
            </button>
        </div>
    </div>
</div>

<script>
    const bulkForm      = document.getElementById('bulk-delete-form');
    const selectAll     = document.getElementById('select-all');
    const bulkActions   = document.getElementById('bulk-actions');
    const selectedCount = document.getElementById('selected-count');
    const deleteModal   = document.getElementById('delete-modal');
    const modalCount    = document.getElementById('modal-count');
    const modalList     = document.getElementById('modal-booking-list');

    function getCheckboxes() {
        return Array.from(document.querySelectorAll('.booking-checkbox'));
    }

    function getCheckedCheckboxes() {
        return getCheckboxes().filter(cb => cb.checked);
    }

    function updateBulkBar() {
        const checked = getCheckedCheckboxes();
        const count   = checked.length;

        selectedCount.textContent = count;
        bulkActions.classList.toggle('hidden', count === 0);
        bulkActions.classList.toggle('flex', count > 0);

        if (selectAll) {
            const all = getCheckboxes();
            selectAll.checked       = all.length > 0 && count === all.length;
            selectAll.indeterminate = count > 0 && count < all.length;
        }
    }

    function clearSelection() {
        getCheckboxes().forEach(cb => { cb.checked = false; });
        if (selectAll) {
            selectAll.checked       = false;
            selectAll.indeterminate = false;
        }
        updateBulkBar();
    }

    function openDeleteModal(singleId = null) {
        if (singleId !== null) {
            clearSelection();
            const checkbox = document.querySelector(`.booking-checkbox[value="${singleId}"]`);
            if (checkbox) checkbox.checked = true;
            updateBulkBar();
        }

        const checked = getCheckedCheckboxes();
        if (checked.length === 0) return;

        modalCount.textContent = checked.length;
        modalList.innerHTML = checked.map(cb => {
            const row  = cb.closest('.booking-row');
            const code = row?.dataset.code || '';
            const name = row?.dataset.name || '';
            return `<li class="flex items-center gap-2">
                        <span class="font-mono text-xs font-bold text-primary bg-primary/10 px-2 py-0.5 rounded">${code}</span>
                        <span>${name}</span>
                    </li>`;
        }).join('');

        deleteModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeDeleteModal() {
        deleteModal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    function confirmDelete() {
        const container = document.getElementById('bulk-delete-inputs');
        container.innerHTML = '';

        getCheckedCheckboxes().forEach(cb => {
            const input = document.createElement('input');
            input.type  = 'hidden';
            input.name  = 'bookings[]';
            input.value = cb.value;
            container.appendChild(input);
        });

        bulkForm.submit();
    }

    if (selectAll) {
        selectAll.addEventListener('change', () => {
            getCheckboxes().forEach(cb => { cb.checked = selectAll.checked; });
            updateBulkBar();
        });
    }

    getCheckboxes().forEach(cb => {
        cb.addEventListener('change', updateBulkBar);
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeDeleteModal();
    });
</script>

@endsection
