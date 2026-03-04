@extends('layouts.admin')

@section('title', 'Detail Reservasi — ' . $booking->order_code)
@section('header', 'Detail Reservasi')

@section('content')

@php
    $checkInDisplay = $booking->check_in
        ? $booking->check_in->format('d M Y')
        : '—';

    $statusColors = [
        'pending'   => ['bg' => '#FEF9C3', 'color' => '#854D0E', 'dot' => '#EAB308', 'label' => 'Pending'],
        'paid'      => ['bg' => '#DBEAFE', 'color' => '#1E40AF', 'dot' => '#3B82F6', 'label' => 'Paid'],
        'completed' => ['bg' => '#DCFCE7', 'color' => '#166534', 'dot' => '#22C55E', 'label' => 'Completed'],
    ];
    $sc = $statusColors[$booking->status] ?? ['bg'=>'#F3F4F6','color'=>'#374151','dot'=>'#9CA3AF','label'=>'Unknown'];

    $waMessage = "Halo Admin, saya ingin melakukan booking.\n\n"
        . "Kode Pesanan : {$booking->order_code}\n"
        . "Nama         : {$booking->name}\n"
        . "No HP        : {$booking->phone}\n"
        . "Email        : {$booking->email}\n"
        . "Service      : {$booking->service_name}\n"
        . "Check-in     : {$checkInDisplay}\n"
        . "Catatan      : " . ($booking->notes ?: '-') . "\n\n"
        . "Mohon konfirmasi untuk pembayaran.";
    $waUrl = "https://wa.me/" . ltrim($booking->phone,'0+') . "?text=" . urlencode($waMessage);
@endphp

<style>
    .detail-wrap { max-width: 900px; }
    .section-card {
        background: white;
        border-radius: 20px;
        border: 1px solid #f0f0f0;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        margin-bottom: 1.25rem;
    }
    .section-header {
        display: flex; align-items: center; gap: 0.6rem;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #f5f5f5;
        background: #fafafa;
    }
    .section-header-icon {
        width: 32px; height: 32px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .section-title { font-weight: 700; font-size: 0.875rem; color: #374151; }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
    }
    @media(max-width:640px) { .info-grid { grid-template-columns: 1fr; } }

    .info-cell {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #f5f5f5;
        border-right: 1px solid #f5f5f5;
    }
    .info-cell:nth-child(2n) { border-right: none; }
    .info-cell:last-child, .info-cell:nth-last-child(2):nth-child(odd) { border-bottom: none; }
    .info-label {
        font-size: 0.72rem; font-weight: 600; letter-spacing: 0.06em;
        text-transform: uppercase; color: #9CA3AF; margin-bottom: 0.35rem;
    }
    .info-value { font-size: 0.9rem; font-weight: 600; color: #111827; }

    /* Status timeline */
    .timeline { padding: 1.25rem 1.5rem; }
    .tl-step { display: flex; gap: 1rem; align-items: flex-start; }
    .tl-left { display: flex; flex-direction: column; align-items: center; }
    .tl-dot {
        width: 36px; height: 36px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0; font-size: 0.75rem; font-weight: 700;
    }
    .tl-dot.done  { background: #2E514B; color: white; }
    .tl-dot.active{ background: #FEF3C7; color: #D97706; border: 2px solid #FCD34D; }
    .tl-dot.todo  { background: #F3F4F6; color: #9CA3AF; border: 2px solid #E5E7EB; }
    .tl-line { width: 2px; flex: 1; min-height: 24px; background: #E5E7EB; margin: 4px 0; }
    .tl-line.done { background: #2E514B; }
    .tl-content { padding-bottom: 1.25rem; }
    .tl-title { font-size: 0.875rem; font-weight: 700; color: #111827; }
    .tl-sub   { font-size: 0.75rem; color: #9CA3AF; margin-top: 1px; }
</style>

<div class="detail-wrap">

    {{-- Back --}}
    <a href="{{ route('admin.booking.index') }}"
       class="inline-flex items-center gap-1.5 text-sm text-primary hover:opacity-70 transition mb-5 font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali ke Daftar Booking
    </a>

    {{-- ── Hero row ── --}}
    <div class="section-card mb-5">
        <div class="p-5 sm:p-7 flex flex-col sm:flex-row sm:items-center gap-5">
            {{-- Avatar --}}
            <div class="w-16 h-16 rounded-2xl flex-shrink-0 flex items-center justify-center text-2xl font-extrabold text-white"
                 style="background: linear-gradient(135deg,#2E514B,#4a7d73);">
                {{ strtoupper(substr($booking->name,0,1)) }}
            </div>
            {{-- Name + code --}}
            <div class="flex-1 min-w-0">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 leading-tight">{{ $booking->name }}</h2>
                <div class="flex flex-wrap gap-2 mt-1.5">
                    <span class="font-mono text-xs font-bold tracking-widest bg-primary/10 text-primary px-2.5 py-1 rounded-lg">
                        {{ $booking->order_code }}
                    </span>
                    <span class="text-xs font-bold px-2.5 py-1 rounded-lg"
                          style="background:{{ $sc['bg'] }};color:{{ $sc['color'] }}">
                        ● {{ $sc['label'] }}
                    </span>
                    <span class="text-xs text-gray-400 py-1">
                        Dibuat: {{ $booking->created_at->format('d M Y, H:i') }}
                    </span>
                </div>
            </div>
            {{-- Update status form --}}
            <form action="{{ route('admin.booking.updateStatus', $booking) }}" method="POST"
                  class="flex items-center gap-2 flex-shrink-0">
                @csrf @method('PATCH')
                <select name="status"
                        class="text-sm border border-gray-200 rounded-xl px-3 py-2 bg-white text-gray-700
                               focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/15 cursor-pointer">
                    <option value="pending"   {{ $booking->status==='pending'   ?'selected':'' }}>Pending</option>
                    <option value="paid"      {{ $booking->status==='paid'      ?'selected':'' }}>Paid</option>
                    <option value="completed" {{ $booking->status==='completed' ?'selected':'' }}>Completed</option>
                </select>
                <button type="submit"
                        class="bg-primary text-white text-sm font-semibold px-4 py-2 rounded-xl hover:bg-primary/90 transition whitespace-nowrap">
                    Simpan
                </button>
            </form>
        </div>
    </div>

    <div class="grid sm:grid-cols-2 gap-4 mb-0">

        {{-- ── Contact Info ── --}}
        <div class="section-card">
            <div class="section-header">
                <div class="section-header-icon bg-primary/10">
                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <span class="section-title">Info Tamu</span>
            </div>
            <div class="p-5 space-y-4">
                <div>
                    <p class="info-label">Nama Lengkap</p>
                    <p class="info-value">{{ $booking->name }}</p>
                </div>
                <div>
                    <p class="info-label">No. Telepon</p>
                    <div class="flex items-center gap-2">
                        <p class="info-value">{{ $booking->phone }}</p>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$booking->phone) }}"
                           target="_blank"
                           class="inline-flex items-center gap-1 text-xs text-green-600 font-semibold hover:opacity-70 transition">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Chat WA
                        </a>
                    </div>
                </div>
                <div>
                    <p class="info-label">Email</p>
                    <a href="mailto:{{ $booking->email }}"
                       class="info-value text-primary hover:underline break-all">{{ $booking->email }}</a>
                </div>
            </div>
        </div>

        {{-- ── Reservation Info ── --}}
        <div class="section-card">
            <div class="section-header">
                <div class="section-header-icon bg-primary/10">
                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="section-title">Detail Reservasi</span>
            </div>
            <div class="p-5 space-y-4">
                <div>
                    <p class="info-label">Service</p>
                    <p class="info-value">{{ $booking->service_name }}</p>
                </div>
                <div>
                    <p class="info-label">Tanggal Check-in</p>
                    <p class="info-value">{{ $checkInDisplay }}</p>
                </div>
                <div>
                    <p class="info-label">Catatan Tamu</p>
                    <p class="info-value {{ !$booking->notes ? 'text-gray-400 font-normal italic text-sm' : '' }}">
                        {{ $booking->notes ?: 'Tidak ada catatan' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Status Timeline ── --}}
    <div class="section-card mt-4">
        <div class="section-header">
            <div class="section-header-icon bg-primary/10">
                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                </svg>
            </div>
            <span class="section-title">Alur Status Reservasi</span>
        </div>
        <div class="timeline">
            @php
                $steps = [
                    ['key'=>'pending',   'label'=>'Booking Masuk',          'sub'=>'Data tersimpan & terkirim ke WhatsApp'],
                    ['key'=>'paid',      'label'=>'Pembayaran Dikonfirmasi', 'sub'=>'Admin mengubah status ke Paid setelah terima pembayaran'],
                    ['key'=>'completed', 'label'=>'Reservasi Selesai',       'sub'=>'Email konfirmasi terkirim ke tamu'],
                ];
                $order = ['pending'=>0,'paid'=>1,'completed'=>2];
                $curr  = $order[$booking->status] ?? 0;
            @endphp
            @foreach($steps as $i => $step)
            <div class="tl-step">
                <div class="tl-left">
                    <div class="tl-dot {{ $i < $curr ? 'done' : ($i == $curr ? 'active' : 'todo') }}">
                        @if($i < $curr)
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        @else
                            {{ $i + 1 }}
                        @endif
                    </div>
                    @if(!$loop->last)
                    <div class="tl-line {{ $i < $curr ? 'done' : '' }}"></div>
                    @endif
                </div>
                <div class="tl-content">
                    <p class="tl-title {{ $i == $curr ? 'text-primary' : ($i > $curr ? 'text-gray-400' : '') }}">
                        {{ $step['label'] }}
                    </p>
                    <p class="tl-sub">{{ $step['sub'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ── Quick actions ── --}}
    <div class="flex flex-wrap gap-3 mt-4 mb-8">
        <a href="mailto:{{ $booking->email }}"
           class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold
                  px-5 py-2.5 rounded-xl hover:bg-primary/90 transition shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Kirim Email
        </a>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$booking->phone) }}"
           target="_blank"
           class="inline-flex items-center gap-2 bg-green-500 text-white text-sm font-semibold
                  px-5 py-2.5 rounded-xl hover:bg-green-600 transition shadow-sm">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Chat WhatsApp
        </a>
        <a href="{{ route('admin.booking.index') }}"
           class="inline-flex items-center gap-2 border border-gray-200 text-gray-600 text-sm font-medium
                  px-5 py-2.5 rounded-xl hover:bg-gray-50 transition">
            ← Semua Booking
        </a>
    </div>

</div>

@endsection
