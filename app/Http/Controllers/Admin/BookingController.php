<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\BookingCompletedMail;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest()->paginate(15);

        return view('admin.booking.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        return view('admin.booking.show', compact('booking'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,completed',
        ]);

        $oldStatus = $booking->status;
        $booking->update(['status' => $request->status]);

        if ($request->status === 'completed' && $oldStatus !== 'completed') {
            Mail::to('byanhasyif@gmail.com')->send(new BookingCompletedMail($booking));
        }

        return back()->with('success', 'Status booking berhasil diperbarui!');
    }
}
