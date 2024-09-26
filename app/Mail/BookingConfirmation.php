<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $booking; // Booking data

    public function __construct($booking)
    {
        $this->booking = $booking; // Pass the booking data to the mailable
    }

    public function build()
    {
        return $this->subject('Booking Confirmation')
                    ->view('emails.booking_confirmation'); // Point to the email view
    }
}
