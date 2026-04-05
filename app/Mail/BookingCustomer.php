<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingCustomer extends Mailable
{
    use SerializesModels;

    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->subject('Konfirmasi Booking - ' . $this->booking->order_code)
                    ->view('emails.booking_customer');
    }
}