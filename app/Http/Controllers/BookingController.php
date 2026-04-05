<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Accommodation;
use App\Models\AccommodationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingCustomer;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $accommodationId = $request->query('accommodation_id');

        $accommodation = null;
        $services = collect();

        if ($accommodationId) {
            $accommodation = Accommodation::findOrFail($accommodationId);

            $services = $accommodation->services()->orderBy('name')->get();
        }

        return view('booking.create', compact('services', 'accommodation', 'accommodationId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
            'email'      => 'required|email|max:255',
            'service_id' => 'required|exists:accommodation_services,id',
            'check_in'   => 'required|date|after_or_equal:today',
            'check_out'  => 'required|date|after:check_in',
            'notes'      => 'nullable|string|max:1000',
        ], [
            'name.required'           => 'Nama lengkap wajib diisi.',
            'phone.required'          => 'Nomor telepon wajib diisi.',
            'email.required'          => 'Email wajib diisi.',
            'email.email'             => 'Format email tidak valid.',
            'service_id.required'     => 'Pilih salah satu service.',
            'service_id.exists'       => 'Service tidak ditemukan.',
            'check_in.required'       => 'Tanggal check-in wajib dipilih.',
            'check_in.date'           => 'Format tanggal tidak valid.',
            'check_in.after_or_equal' => 'Tanggal check-in tidak boleh sebelum hari ini.',
            'check_out.required'      => 'Tanggal check-out wajib dipilih.',
            'check_out.date'          => 'Format tanggal tidak valid.',
            'check_out.after'         => 'Tanggal check-out harus setelah tanggal check-in.',
        ]);

        // Generate order code: CS-DDMMYY-XXXX
        $date      = now()->format('dmy');
        $random    = strtoupper(substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZ23456789'), 0, 4));
        $orderCode = "CS-{$date}-{$random}";

        $service     = AccommodationService::with('accommodation')->findOrFail($request->service_id);
        $serviceName = $service->accommodation->name . ' — ' . $service->name;

        $checkInFormatted = \Carbon\Carbon::parse($request->check_in)->translatedFormat('d F Y');

        $booking = Booking::create([
            'order_code'   => $orderCode,
            'name'         => $request->name,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'service_id'   => $request->service_id,
            'service_name' => $serviceName,
            'check_in'     => $request->check_in,
            'check_out'    => $request->check_out,
            'notes'        => $request->notes,
            'status'       => 'pending',
        ]);

        Mail::to($booking->email)->send(new BookingCustomer($booking));

        return redirect()->route('booking.success', ['orderCode' => $orderCode]);
    }

    public function success($orderCode)
    {
        $booking = Booking::where('order_code', $orderCode)->firstOrFail();

        return view('booking.success', compact('booking'));
    }
}
