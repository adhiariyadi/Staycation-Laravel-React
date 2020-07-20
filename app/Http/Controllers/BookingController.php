<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::all();
        return view('admin.booking.index', compact('booking'));
    }

    public function show($id)
    {
        $booking = Booking::find($id);
        return view('admin.booking.show', compact('booking'));
    }

    public function confirmation($id)
    {
        $booking = Booking::find($id);
        $booking->status = "Accept";
        $booking->save();
        return redirect()->back()->with('success', 'Success Confirmatin Pembayaran!');
    }

    public function reject($id)
    {
        $booking = Booking::find($id);
        $booking->status = "Reject";
        $booking->save();
        return redirect()->back()->with('success', 'Success Reject Pembayaran!');
    }
}
