<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingItem;
use App\Models\Screen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $stats = [
            'all_bookings' => BookingItem::where('host_id', $user->id)->count(),
            'completed_bookings' => BookingItem::with(['user', 'screen.venue'])->where('host_id', $user->id)->whereDate('end_date', '<', now())->count(),
            'pending_bookings' => BookingItem::with(['user', 'screen.venue'])->where('host_id', $user->id)->whereDate('start_date', '>', now())->count(),
            'total_screens' => BookingItem::where('host_id', $user->id)->count(),
        ];

        $bookingItems = BookingItem::with(['user', 'screen.venue'])->where('host_id', $user->id)
            ->latest()
            ->take(10)
            ->get();


        return view('vendor.dashboard', compact('stats', 'bookingItems'));
    }


    public function bookings()
    {
        $user = Auth::user();
        $bookings = Booking::with(['user', 'screen.venue', 'media'])->where('user_id', $user->id)
            ->latest()
            ->paginate(20);

        return view('vendor.bookings.index', compact('bookings'));
    }

}
