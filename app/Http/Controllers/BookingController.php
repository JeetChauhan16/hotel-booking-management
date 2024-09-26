<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\BookingConfirmation; 
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    // Store a new booking
    public function store(Request $request)
    {

        $user = Auth::user();
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        $booking = Booking::create([
            'user_id' =>  $user->id,
            'room_id' => $validated['room_id'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
        ]);

        try {
            $recipientEmail = $user->email;
            Mail::to($recipientEmail)->send(new BookingConfirmation($booking));
            session()->flash('message', 'Booking successful! A confirmation email has been sent to ' . $recipientEmail);
            return redirect()->back();
        } catch (\Exception $e) {
            
            Log::error("Failed to send booking confirmation email: " . $e->getMessage());
            return redirect()->back()->with('error', 'Booking successful, but failed to send confirmation email.');
        }

    }
}

