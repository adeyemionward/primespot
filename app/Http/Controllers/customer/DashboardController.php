<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Media;
use App\Models\Screen;
use App\Models\User;
use App\Models\Venue;
use Carbon\Carbon;
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
            'all_bookings' => Booking::where('user_id',$user->id)->count(),
            'completed_bookings' => Booking::with(['user', 'screen.venue'])->whereDate('end_date', '<', now())->where('user_id',$user->id)->count(),
            'pending_bookings' => Booking::with(['user', 'screen.venue'])->whereDate('start_date', '>', now())->where('user_id',$user->id)->count(),
            'total_screens' => Screen::count(),
        ];

        $recentBookings = Booking::with(['user', 'screen.venue'])
            ->latest()
            ->take(10)->where('user_id',$user->id)
            ->get();


        return view('customer.dashboard', compact('stats', 'recentBookings'));
    }
}
