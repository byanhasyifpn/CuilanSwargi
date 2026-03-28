@extends('layouts.app')

@section('title', 'Form Booking')

@section('content')

@php
    use Carbon\Carbon;
    $today    = Carbon::today()->format('Y-m-d');
    $maxDate  = Carbon::today()->addYear()->format('Y-m-d');
@endphp

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap');

    .booking-page {
        background: linear-gradient(135deg, #f0f4f3 0%, #e8eeec 50%, #f5f3ee 100%);
        min-height: 100vh;
        padding: 3rem 1rem 5rem;
    }

    /* ── Form Input ── */
    .form-group { margin-bottom: 1.25rem; }

    .form-label {
        display: flex;
        align-items: center;
        gap: 0.45rem;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.04em;
        color: #2E514B;
        margin-bottom: 0.45rem;
        text-transform: uppercase;
    }

    .form-label .req { color: #e05252; margin-left: 1px; }

    .form-input {
        width: 100%;
        padding: 0.85rem 1rem;
        border: 1.5px solid #d1dbd8;
        border-radius: 12px;
        font-size: 0.95rem;
        font-family: 'Newsreader', serif;
        color: #1f3d38;
        background: #fff;
        transition: all 0.2s ease;
        outline: none;
        box-sizing: border-box;
    }

    .form-input:focus {
        border-color: #2E514B;
        box-shadow: 0 0 0 4px rgba(46, 81, 75, 0.1);
        background: #fafffe;
    }

    .form-input.is-error {
        border-color: #e05252;
        background: #fff8f8;
    }

    .form-input::-webkit-calendar-picker-indicator {
        cursor: pointer;
        opacity: 0.6;
        filter: invert(28%) sepia(40%) saturate(600%) hue-rotate(130deg);
    }

    .field-error {
        display: flex;
        align-items: center;
        gap: 0.3rem;
        font-size: 0.78rem;
        color: #e05252;
        margin-top: 0.35rem;
    }

    /* ── Card shell ── */
    .booking-card {
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(12px);
        border-radius: 28px;
        box-shadow: 0 8px 40px rgba(46,81,75,0.10), 0 1px 4px rgba(0,0,0,0.04);
        overflow: hidden;
        border: 1px solid rgba(46,81,75,0.07);
    }

    .booking-card-header {
        background: linear-gradient(135deg, #2E514B 0%, #3d6b63 100%);
        padding: 2.5rem 2.5rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .booking-card-header::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 200px; height: 200px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }

    .booking-card-header::after {
        content: '';
        position: absolute;
        bottom: -80px; left: 40%;
        width: 260px; height: 260px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
    }

    /* ── Progress steps ── */
    .steps { display: flex; align-items: center; gap: 0; margin-bottom: 1.25rem; }
    .step-item { display: flex; align-items: center; gap: 0.5rem; }
    .step-dot {
        width: 28px; height: 28px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.72rem; font-weight: 700;
        transition: all 0.3s;
        flex-shrink: 0;
    }
    .step-dot.active  { background: #FBF7CA; color: #2E514B; }
    .step-dot.inactive{ background: rgba(255,255,255,0.2); color: rgba(255,255,255,0.6); }
    .step-label { font-size: 0.72rem; font-weight: 500; }
    .step-label.active  { color: #FBF7CA; }
    .step-label.inactive{ color: rgba(255,255,255,0.5); }
    .step-line { flex: 1; height: 1.5px; background: rgba(255,255,255,0.15); margin: 0 0.5rem; min-width: 20px; }

    /* ── DatePicker custom ── */
    .date-picker-wrapper { position: relative; }
    .date-picker-wrapper svg.cal-icon {
        position: absolute;
        right: 14px; top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        width: 18px; height: 18px;
        color: #2E514B; opacity: 0.6;
    }
    .date-picker-wrapper input[type="date"] {
        padding-right: 2.5rem;
        cursor: pointer;
    }

    /* ── Notice strip ── */
    .notice-strip {
        display: flex; align-items: flex-start; gap: 0.75rem;
        background: linear-gradient(135deg, rgba(46,81,75,0.06), rgba(46,81,75,0.03));
        border: 1px solid rgba(46,81,75,0.12);
        border-radius: 14px;
        padding: 1rem 1.15rem;
        margin-bottom: 1.5rem;
    }

    /* ── Submit button ── */
    .btn-submit {
        width: 100%;
        background: linear-gradient(135deg, #2E514B 0%, #3d6b63 100%);
        color: #FBF7CA;
        font-size: 0.95rem;
        font-weight: 600;
        padding: 1rem 1.5rem;
        border-radius: 100px;
        border: none;
        cursor: pointer;
        display: flex; align-items: center; justify-content: center; gap: 0.6rem;
        transition: all 0.25s;
        box-shadow: 0 6px 24px rgba(46,81,75,0.28);
        letter-spacing: 0.02em;
    }
    .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 10px 32px rgba(46,81,75,0.35); }
    .btn-submit:active { transform: translateY(0); }

    /* ── Floating label hint ── */
    .hint-badge {
        display: inline-flex; align-items: center; gap: 0.4rem;
        background: rgba(251,247,202,0.9); color: #2E514B;
        border: 1px solid rgba(46,81,75,0.2);
        border-radius: 100px;
        padding: 0.3rem 0.8rem;
        font-size: 0.72rem; font-weight: 600;
        letter-spacing: 0.06em; text-transform: uppercase;
        margin-bottom: 1rem;
    }

    /* ── Decorative side card ── */
    .side-info {
        background: linear-gradient(160deg, #2E514B 0%, #254540 100%);
        border-radius: 24px;
        padding: 2rem 1.75rem;
        color: white;
        position: sticky;
        top: 100px;
    }

    .side-feature {
        display: flex; gap: 0.85rem; align-items: flex-start;
        padding: 1rem 0; border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .side-feature:last-child { border-bottom: none; }
    .side-feature-icon {
        width: 40px; height: 40px; flex-shrink: 0;
        background: rgba(255,255,255,0.1);
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
    }

    /* ============================================
       RESPONSIVE IMPROVEMENTS — MOBILE FIRST
       ============================================ */

    /* Mobile: reset sticky on side-info */
    @media (max-width: 1023px) {
        .side-info {
            position: static;
            border-radius: 20px;
            padding: 1.5rem 1.25rem;
        }
    }

    /* Mobile: tighten page padding */
    @media (max-width: 640px) {
        .booking-page {
            padding: 1.5rem 0.75rem 4rem;
        }
    }

    /* Mobile: card header padding */
    @media (max-width: 640px) {
        .booking-card-header {
            padding: 1.5rem 1.25rem 1.25rem;
        }
        .booking-card-header h1 {
            font-size: 1.6rem !important;
        }
    }

    /* Mobile: card body padding */
    @media (max-width: 640px) {
        .booking-card-body {
            padding: 1.25rem !important;
        }
    }

    /* Mobile: steps — hide labels on very small screens, keep dots */
    @media (max-width: 400px) {
        .step-label {
            display: none;
        }
        .step-line {
            min-width: 12px;
            margin: 0 0.25rem;
        }
    }

    /* Mobile: step labels shorter */
    @media (max-width: 480px) {
        .step-label { font-size: 0.65rem; }
        .step-line  { min-width: 10px; margin: 0 0.3rem; }
    }

    /* Mobile: service + date grid → full width columns */
    @media (max-width: 640px) {
        .grid-service-dates {
            grid-template-columns: 1fr !important;
            gap: 0 !important;
        }
    }

    /* Tablet: service + dates — 1 col service + 2 col dates */
    @media (min-width: 641px) and (max-width: 900px) {
        .grid-service-dates {
            grid-template-columns: 1fr 1fr !important;
        }
        .grid-service-dates .service-col {
            grid-column: 1 / -1;
        }
    }

    /* Mobile: name + phone grid → stack */
    @media (max-width: 480px) {
        .grid-name-phone {
            grid-template-columns: 1fr !important;
        }
    }

    /* Mobile: form input font size (prevent iOS zoom on focus) */
    @media (max-width: 640px) {
        .form-input {
            font-size: 1rem;
        }
        select.form-input {
            font-size: 1rem;
        }
    }

    /* Mobile: form-input height for select & date on small screens */
    @media (max-width: 640px) {
        .form-input.h-14 {
            height: 3.25rem;
        }
    }

    /* Mobile: side-info — hide features, show compact version */
    @media (max-width: 640px) {
        .side-info {
            padding: 1.25rem 1rem;
        }
        .side-feature {
            padding: 0.75rem 0;
            gap: 0.65rem;
        }
        .side-feature-icon {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            flex-shrink: 0;
        }
        .side-feature p:first-child {
            font-size: 0.85rem !important;
        }
        .side-feature p:last-child {
            font-size: 0.72rem !important;
        }
    }

    /* Mobile: back link spacing */
    @media (max-width: 640px) {
        .back-link {
            margin-bottom: 1.25rem !important;
        }
    }

    /* Mobile: notice strip text */
    @media (max-width: 640px) {
        .notice-strip {
            padding: 0.85rem 1rem;
            border-radius: 12px;
        }
        .notice-strip p {
            font-size: 0.75rem;
        }
    }

    /* Mobile: submit button font size */
    @media (max-width: 640px) {
        .btn-submit {
            font-size: 0.9rem;
            padding: 0.9rem 1.25rem;
        }
    }

    /* Tablet range: card header/body tweak */
    @media (min-width: 641px) and (max-width: 1023px) {
        .booking-card-header { padding: 2rem 1.75rem 1.75rem; }
        .booking-card-body   { padding: 1.75rem !important; }
    }

    /* Ensure textarea doesn't overflow on mobile */
    textarea.form-input {
        min-height: 80px;
        resize: vertical;
    }

    /* Fix: date input full width on mobile (some browsers shrink it) */
    input[type="date"].form-input {
        min-width: 0;
        width: 100%;
    }

    /* Prevent long accommodation name badge overflow */
    .accommodation-badge {
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<div class="booking-page">
<div class="max-w-5xl mx-auto">

    {{-- Back link --}}
    <a href="{{ route('accommodation.detail', $accommodation->id) }}"
        class="back-link inline-flex items-center gap-1.5 text-sm text-primary hover:opacity-70 transition mb-8 font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to lodging
    </a>

    <div class="grid lg:grid-cols-3 gap-6 lg:gap-8 items-start">

        {{-- ===== LEFT SIDE INFO ===== --}}
        <div class="lg:col-span-1 order-2 lg:order-1">
            <div class="side-info">
                <div class="hint-badge mb-4" style="background:rgba(251,247,202,0.15);color:#FBF7CA;border-color:rgba(251,247,202,0.2);">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    Secure Reservation
                </div>

                <h2 class="text-xl font-semibold text-white mb-1" style="font-family:'Crimson Text',serif;">
                    Easy & Fast Booking
                </h2>
                <p class="text-white/60 text-sm leading-relaxed mb-6">
                    Booking process via WhatsApp will be confirmed directly by the admin.
                </p>

                <div class="side-feature">
                    <div class="side-feature-icon">
                        <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white text-sm font-medium">Choose Your Date</p>
                        <p class="text-white/50 text-xs mt-0.5">Determine your check-in date as you wish</p>
                    </div>
                </div>

                <div class="side-feature">
                    <div class="side-feature-icon">
                        <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white text-sm font-medium">Unique Reservation Code</p>
                        <p class="text-white/50 text-xs mt-0.5">Format CS-DDMMYY-XXXX as proof of reservation</p>
                    </div>
                </div>

                <div class="side-feature">
                    <div class="side-feature-icon">
                        <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white text-sm font-medium">WhatsApp Confirmation</p>
                        <p class="text-white/50 text-xs mt-0.5">Admin will respond directly to your payment</p>
                    </div>
                </div>

                {{-- Contact hint --}}
                <div class="mt-6 pt-5 border-t border-white/10 text-center">
                    <p class="text-white/40 text-xs">Admin WhatsApp</p>
                    <a href="https://wa.me/6282322785270" target="_blank"
                       class="text-secondary text-sm font-semibold hover:opacity-80 transition">
                        +62 823-2278-5270
                    </a>
                </div>
            </div>
        </div>

        {{-- ===== RIGHT: FORM CARD ===== --}}
        <div class="lg:col-span-2 order-1 lg:order-2">
            <div class="booking-card">

                {{-- Card Header --}}
                <div class="booking-card-header">
                    <div class="relative z-10">
                        <div class="hint-badge mb-4">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Reservation Form
                        </div>
                        <h1 class="text-white text-3xl font-semibold mb-1" style="font-family:'Crimson Text',serif;">
                            Booking via WhatsApp
                        </h1>
                        <p class="text-white/65 text-sm">
                            Fill in the data below → get an order code → confirm with admin
                        </p>

                        @if($accommodation)
                        <div class="accommodation-badge inline-flex items-center gap-2 mt-3 bg-white/15 border border-white/25 text-white text-xs font-semibold px-3 py-1.5 rounded-full">
                            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            {{ $accommodation->name }}
                        </div>
                        @endif

                        {{-- Progress steps --}}
                        <div class="steps mt-5">
                            <div class="step-item">
                                <div class="step-dot active">1</div>
                                <span class="step-label active">Fill Form</span>
                            </div>
                            <div class="step-line"></div>
                            <div class="step-item">
                                <div class="step-dot inactive">2</div>
                                <span class="step-label inactive">Order Code</span>
                            </div>
                            <div class="step-line"></div>
                            <div class="step-item">
                                <div class="step-dot inactive">3</div>
                                <span class="step-label inactive">WhatsApp Confirmation</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card Body --}}
                <div class="booking-card-body p-6 sm:p-8 lg:p-10">

                    {{-- Error alert --}}
                    @if ($errors->any())
                    <div class="flex items-start gap-3 bg-red-50 border border-red-200 rounded-2xl px-5 py-4 mb-6">
                        <svg class="w-5 h-5 text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-red-700 font-semibold text-sm mb-1">Please check again:</p>
                            <ul class="list-disc list-inside space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-600 text-xs">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="accommodation_id" value="{{ $accommodationId ?? old('accommodation_id') }}">

                        {{-- Row: Nama + Telepon --}}
                        <div class="grid sm:grid-cols-2 gap-4 mb-1 grid-name-phone">
                            <div class="form-group">
                                <label class="form-label" for="name">
                                    <svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Full Name <span class="req">*</span>
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                       placeholder="Your full name"
                                       class="form-input {{ $errors->has('name') ? 'is-error' : '' }}">
                                @error('name')
                                    <p class="field-error">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="phone">
                                    <svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    Phone Number <span class="req">*</span>
                                </label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                       placeholder="08xxxxxxxxxx"
                                       class="form-input {{ $errors->has('phone') ? 'is-error' : '' }}">
                                @error('phone')
                                    <p class="field-error">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label class="form-label" for="email">
                                <svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Email <span class="req">*</span>
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   placeholder="contoh@email.com"
                                   class="form-input {{ $errors->has('email') ? 'is-error' : '' }}">
                            @error('email')
                                <p class="field-error">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Row: Service + Check-in + Check-out --}}
                        {{-- Desktop: 3 cols | Tablet: service full + 2 date cols | Mobile: all stacked --}}
                        <div class="grid md:grid-cols-3 gap-5 mb-1 grid-service-dates">

                            {{-- SERVICE --}}
                            <div class="form-group service-col">
                                <label class="form-label" for="service_id">
                                    <svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    Choose Service <span class="req">*</span>
                                </label>

                                <select id="service_id" name="service_id"
                                class="form-input h-14 {{ $errors->has('service_id') ? 'is-error' : '' }}">

                                    <option value="">— Choose service —</option>

                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}"
                                    {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->name }}
                                    (IDR {{ number_format($service->price, 0, ',', '.') }})
                                    </option>
                                    @endforeach

                                </select>

                                @error('service_id')
                                <p class="field-error">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>


                            {{-- CHECK IN --}}
                            <div class="form-group">
                                <label class="form-label" for="check_in">
                                    <svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Check-in <span class="req">*</span>
                                </label>

                                <div class="date-picker-wrapper">
                                    <input type="date"
                                    id="check_in"
                                    name="check_in"
                                    value="{{ old('check_in') }}"
                                    min="{{ $today }}"
                                    max="{{ $maxDate }}"
                                    class="form-input h-14 {{ $errors->has('check_in') ? 'is-error' : '' }}">

                                    <svg class="cal-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>

                                @error('check_in')
                                <p class="field-error">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>


                            {{-- CHECK OUT --}}
                            <div class="form-group">
                                <label class="form-label" for="check_out">
                                    <svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Check-out <span class="req">*</span>
                                </label>

                                <div class="date-picker-wrapper">
                                    <input type="date"
                                    id="check_out"
                                    name="check_out"
                                    value="{{ old('check_out') }}"
                                    class="form-input h-14 {{ $errors->has('check_out') ? 'is-error' : '' }}">

                                    <svg class="cal-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>

                                @error('check_out')
                                <p class="field-error">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                        </div>

                        {{-- Catatan --}}
                        <div class="form-group">
                            <label class="form-label" for="notes">
                                <svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                </svg>
                                Notes
                                <span class="ml-0.5 text-gray-400 font-normal normal-case" style="font-size:0.72rem;letter-spacing:0;">(optional)</span>
                            </label>
                            <textarea id="notes" name="notes" rows="3"
                                      placeholder="Example: special requests, room preferences, etc."
                                      class="form-input resize-none">{{ old('notes') }}</textarea>
                        </div>

                        {{-- Notice --}}
                        <div class="notice-strip">
                            <svg class="w-4 h-4 text-primary flex-shrink-0 mt-0.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-xs text-primary/70 leading-relaxed">
                                After submitting, you will receive a <strong class="text-primary">unique order code</strong> and 
                                be directed to admin WhatsApp for payment confirmation.
                            </p>
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn-submit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Submit Booking
                        </button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

@endsection

<script>

const service = document.getElementById('service_id');
const checkIn = document.getElementById('check_in');
const checkOut = document.getElementById('check_out');

function formatRupiah(num){
    return "IDR " + num.toLocaleString("id-ID");
}

function updatePrice(){

    if(!service.value || !checkIn.value || !checkOut.value){
        return;
    }

    const price = parseInt(service.selectedOptions[0].dataset.price);

    const start = new Date(checkIn.value);
    const end = new Date(checkOut.value);

    const nights = (end - start) / (1000 * 60 * 60 * 24);

    if(nights <= 0){
        return;
    }

    const total = price * nights;
}

service.addEventListener("change", updatePrice);
checkIn.addEventListener("input", updatePrice);
checkOut.addEventListener("input", updatePrice);

/* Auto-set checkout min date when check-in changes */
checkIn.addEventListener('change', function () {
    if (this.value) {
        const nextDay = new Date(this.value);
        nextDay.setDate(nextDay.getDate() + 1);
        const yyyy = nextDay.getFullYear();
        const mm   = String(nextDay.getMonth() + 1).padStart(2, '0');
        const dd   = String(nextDay.getDate()).padStart(2, '0');
        checkOut.min = `${yyyy}-${mm}-${dd}`;
        if (checkOut.value && checkOut.value <= this.value) {
            checkOut.value = '';
        }
    }
});

</script>