<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\BookingCompletedMail;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index(Request $request)
{
    $query = Booking::query();

    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('order_code', 'like', '%' . $request->search . '%')
              ->orWhere('name', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->status && in_array($request->status, ['pending', 'paid', 'completed'])) {
        $query->where('status', $request->status);
    }

    $bookings = $query->latest()->paginate(10)->withQueryString();

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
