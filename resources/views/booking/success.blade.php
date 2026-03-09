@extends('layouts.app')

@section('title', 'Booking Berhasil — ' . $booking->order_code)

@section('content')

@php
    $checkInDisplay = $booking->check_in
        ? $booking->check_in->translatedFormat('d F Y')
        : '-';
    $checkOutDisplay = $booking->check_out
        ? $booking->check_out->translatedFormat('d F Y')
        : '-';
    $waMessage = "Halo Admin, saya ingin melakukan booking.\n\n"
        . "Kode Pesanan : {$booking->order_code}\n"
        . "Nama         : {$booking->name}\n"
        . "No HP        : {$booking->phone}\n"
        . "Email        : {$booking->email}\n"
        . "Service      : {$booking->service_name}\n"
        . "Check-in     : {$checkInDisplay}\n"
        . "Check-out    : {$checkOutDisplay}\n"
        . "Catatan      : " . ($booking->notes ?: '-') . "\n\n"
        . "Mohon konfirmasi untuk pembayaran.";

    $waUrl = "https://wa.me/6282322785270?text=" . urlencode($waMessage);
@endphp

<style>
    .success-page {
        min-height: 100vh;
        background: linear-gradient(160deg, #f0f4f3 0%, #e4ede9 60%, #f5f3ee 100%);
        display: flex; align-items: center; justify-content: center;
        padding: 4rem 1rem;
    }

    /* ── Confetti particles (pure CSS) ── */
    .confetti-wrapper {
        position: fixed;
        top: 0; left: 0; right: 0;
        pointer-events: none;
        overflow: hidden;
        height: 100vh;
        z-index: 0;
    }
    .confetti-piece {
        position: absolute;
        width: 8px; height: 16px;
        border-radius: 2px;
        top: -20px;
        animation: confettiFall linear forwards;
        opacity: 0.7;
    }
    @keyframes confettiFall {
        0%   { transform: translateY(0) rotate(0deg); opacity: 0.7; }
        100% { transform: translateY(110vh) rotate(720deg); opacity: 0; }
    }

    /* ── Main card ── */
    .success-card {
        background: white;
        border-radius: 32px;
        box-shadow: 0 24px 80px rgba(46,81,75,0.13), 0 4px 16px rgba(0,0,0,0.05);
        overflow: hidden;
        max-width: 560px;
        width: 100%;
        position: relative;
        z-index: 10;
        border: 1px solid rgba(46,81,75,0.06);
    }

    /* ── Header ── */
    .success-header {
        background: linear-gradient(140deg, #2E514B 0%, #3d6b63 60%, #4a7d73 100%);
        padding: 2.75rem 2.5rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .success-header::before {
        content: '';
        position: absolute;
        top: -80px; right: -60px;
        width: 220px; height: 220px;
        border-radius: 50%;
        background: rgba(255,255,255,0.06);
    }
    .success-header::after {
        content: '';
        position: absolute;
        bottom: -100px; left: -40px;
        width: 250px; height: 250px;
        border-radius: 50%;
        background: rgba(255,255,255,0.04);
    }

    /* ── Check circle ── */
    .check-circle {
        width: 72px; height: 72px;
        background: rgba(255,255,255,0.15);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1.25rem;
        position: relative;
    }
    .check-circle::before {
        content: '';
        position: absolute;
        inset: -6px;
        border-radius: 50%;
        border: 2px solid rgba(255,255,255,0.2);
        animation: pulseRing 2s ease-out infinite;
    }
    @keyframes pulseRing {
        0%   { transform: scale(1); opacity: 0.8; }
        100% { transform: scale(1.4); opacity: 0; }
    }

    /* ── Order code box ── */
    .order-code-box {
        background: linear-gradient(135deg, #f0f9f7 0%, #e8f4f1 100%);
        border: 2px solid rgba(46,81,75,0.15);
        border-radius: 18px;
        padding: 1.25rem 1.5rem;
        text-align: center;
        margin: 1.5rem 0;
        position: relative;
        overflow: hidden;
    }
    .order-code-box::before {
        content: '';
        position: absolute;
        left: 0; top: 0; bottom: 0;
        width: 4px;
        background: linear-gradient(180deg, #2E514B, #4a7d73);
        border-radius: 4px 0 0 4px;
    }

    /* ── Detail rows ── */
    .detail-grid {
        background: #f9faf9;
        border-radius: 18px;
        overflow: hidden;
        margin: 1rem 0 1.5rem;
    }
    .detail-row {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        padding: 0.85rem 1.25rem;
        border-bottom: 1px solid rgba(0,0,0,0.04);
        transition: background 0.15s;
    }
    .detail-row:last-child { border-bottom: none; }
    .detail-row:hover { background: #f2f5f4; }
    .detail-icon {
        width: 32px; height: 32px; flex-shrink: 0;
        background: rgba(46,81,75,0.08);
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        margin-top: 1px;
    }

    /* ── Steps track ── */
    .steps-track {
        display: flex; align-items: center;
        background: #f4f7f6;
        border-radius: 100px;
        padding: 0.5rem 1rem;
        gap: 0.25rem;
        margin-bottom: 1.5rem;
    }
    .track-step {
        display: flex; align-items: center; gap: 0.4rem;
        font-size: 0.72rem; font-weight: 600;
        flex: 1; justify-content: center;
    }
    .track-dot {
        width: 22px; height: 22px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.65rem; font-weight: 700;
    }
    .track-dot.done   { background: #2E514B; color: white; }
    .track-dot.active { background: #22c55e; color: white; animation: activeGlow 1.5s ease-in-out infinite; }
    .track-dot.todo   { background: #e5e7eb; color: #9ca3af; }
    @keyframes activeGlow {
        0%, 100% { box-shadow: 0 0 0 0 rgba(34,197,94,0.4); }
        50% { box-shadow: 0 0 0 6px rgba(34,197,94,0); }
    }
    .track-sep { flex: 0.4; height: 1.5px; background: #e5e7eb; }
    .track-sep.done { background: #2E514B; }

    /* ── Buttons ── */
    .btn-wa {
        width: 100%; padding: 1rem;
        background: linear-gradient(135deg, #25d366, #1faa52);
        color: white;
        border-radius: 100px;
        font-weight: 600; font-size: 0.95rem;
        display: flex; align-items: center; justify-content: center; gap: 0.6rem;
        border: none; cursor: pointer; text-decoration: none;
        box-shadow: 0 6px 24px rgba(37,211,102,0.35);
        transition: all 0.25s;
        margin-bottom: 0.75rem;
    }
    .btn-wa:hover { transform: translateY(-2px); box-shadow: 0 10px 32px rgba(37,211,102,0.45); }

    .btn-home {
        width: 100%; padding: 0.85rem;
        background: transparent;
        color: #2E514B;
        border: 1.5px solid rgba(46,81,75,0.25);
        border-radius: 100px;
        font-weight: 500; font-size: 0.9rem;
        display: flex; align-items: center; justify-content: center; gap: 0.5rem;
        text-decoration: none;
        transition: all 0.2s;
    }
    .btn-home:hover { background: rgba(46,81,75,0.05); border-color: #2E514B; }
</style>

{{-- Confetti --}}
<div class="confetti-wrapper" id="confetti"></div>

<div class="success-page">
    <div class="success-card">

        {{-- Header --}}
        <div class="success-header">
            <div class="relative z-10">
                <div class="check-circle">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h1 class="text-white text-2xl sm:text-3xl font-semibold mb-1" style="font-family:'Crimson Text',serif;">
                    Booking Berhasil!
                </h1>
                <p class="text-white/65 text-sm">
                    Data reservasi Anda telah disimpan
                </p>
            </div>
        </div>

        {{-- Body --}}
        <div class="p-6 sm:p-8">

            {{-- Order Code --}}
            <div class="order-code-box">
                <p class="text-xs text-gray-400 uppercase tracking-widest mb-1.5 font-semibold">Kode Pesanan</p>
                <p class="font-mono text-2xl sm:text-3xl font-extrabold text-primary tracking-[0.15em]">
                    {{ $booking->order_code }}
                </p>
                <p class="text-xs text-gray-400 mt-1.5">Simpan kode ini sebagai bukti reservasi</p>
            </div>

            {{-- Steps --}}
            <div class="steps-track">
                <div class="track-step">
                    <div class="track-dot done">✓</div>
                    <span class="text-primary">Form</span>
                </div>
                <div class="track-sep done"></div>
                <div class="track-step">
                    <div class="track-dot active">2</div>
                    <span class="text-green-600">WhatsApp</span>
                </div>
                <div class="track-sep"></div>
                <div class="track-step">
                    <div class="track-dot todo">3</div>
                    <span class="text-gray-400">Selesai</span>
                </div>
            </div>

            {{-- Detail Grid --}}
            <div class="detail-grid">
                <div class="detail-row">
                    <div class="detail-icon">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-gray-400 mb-0.5">Nama</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $booking->name }}</p>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-icon">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-gray-400 mb-0.5">No. Telepon</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $booking->phone }}</p>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-icon">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-gray-400 mb-0.5">Email</p>
                        <p class="text-sm font-semibold text-gray-800 break-all">{{ $booking->email }}</p>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-icon">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-gray-400 mb-0.5">Service</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $booking->service_name }}</p>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-icon">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-gray-400 mb-0.5">Tanggal Check-in</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $checkInDisplay }}</p>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-icon">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>

                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-gray-400 mb-0.5">Tanggal Check-out</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $checkOutDisplay }}</p>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-icon">
                        <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-gray-400 mb-0.5">Status</p>
                        <span class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 inline-block"></span>
                            Menunggu Konfirmasi
                        </span>
                    </div>
                </div>
            </div>

            {{-- CTA --}}
            <a href="{{ $waUrl }}" target="_blank" id="wa-btn" class="btn-wa">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                Konfirmasi via WhatsApp Admin
            </a>

            <a href="{{ route('home') }}" class="btn-home">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<script>
// Confetti burst
(function() {
    const colors = ['#2E514B','#FBF7CA','#4a7d73','#a3c4bc','#f0c040','#fff'];
    const container = document.getElementById('confetti');
    for (let i = 0; i < 48; i++) {
        const el = document.createElement('div');
        el.className = 'confetti-piece';
        el.style.cssText = `
            left: ${Math.random() * 100}%;
            background: ${colors[Math.floor(Math.random()*colors.length)]};
            width: ${Math.random() * 8 + 4}px;
            height: ${Math.random() * 14 + 7}px;
            border-radius: ${Math.random() > 0.5 ? '50%' : '2px'};
            animation-duration: ${Math.random() * 2 + 1.8}s;
            animation-delay: ${Math.random() * 0.8}s;
            transform: rotate(${Math.random() * 360}deg);
        `;
        container.appendChild(el);
    }
    setTimeout(() => container.remove(), 4000);
})();

// Auto-open WhatsApp
window.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        document.getElementById('wa-btn')?.click();
    }, 1500);
});
</script>

@endsection
