<?php

namespace App\Http\Controllers;

use App\Item;
use App\Member;
use App\Booking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $member = Member::count();
        $booking = Booking::count();
        $item = Item::count();
        return view('admin.index', compact('member', 'booking', 'item'));
    }
}
