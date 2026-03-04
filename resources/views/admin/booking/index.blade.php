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

    <div class="flex items-center justify-between px-5 sm:px-6 py-4 border-b border-gray-100">
        <div>
            <h3 class="text-base sm:text-lg font-semibold text-gray-800">Daftar Reservasi</h3>
            <p class="text-xs text-gray-400 mt-0.5">{{ $total }} total booking</p>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></div>
            <span class="text-xs text-gray-400">Live</span>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-xs uppercase tracking-wide text-gray-400 font-semibold bg-gray-50/80">
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap">Kode Pesanan</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap">Nama</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap hidden sm:table-cell">Telepon</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap hidden lg:table-cell">Service</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap hidden md:table-cell">Check-in</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap">Status</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap">Ubah Status</th>
                    <th class="text-left px-5 sm:px-6 py-3.5 whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($bookings as $booking)
                <tr class="hover:bg-primary/[0.025] transition-colors duration-150">

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
                            <div class="flex items-center gap-1.5 text-gray-700">
                                <svg class="w-3.5 h-3.5 text-primary/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-sm font-medium">{{ $booking->check_in->format('d M Y') }}</span>
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

                    {{-- Detail button --}}
                    <td class="px-5 sm:px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.booking.show', $booking) }}"
                           class="inline-flex items-center gap-1 text-xs font-semibold text-primary border border-primary/30
                                  hover:bg-primary hover:text-white px-3 py-1.5 rounded-xl transition-all duration-200">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-16 text-center">
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

@endsection
