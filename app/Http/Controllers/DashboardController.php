<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Media;
use App\Models\Screen;
use App\Models\User;
use App\Models\Venue;
use Carbon\Carbon;
class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'all_bookings' => Booking::count(),
            'completed_bookings' => Booking::with(['user', 'screen.venue'])->whereDate('end_date', '<', now())->count(),
            'pending_bookings' => Booking::with(['user', 'screen.venue'])->whereDate('start_date', '>', now())->count(),
            'total_screens' => Screen::count(),
        ];

        $recentBookings = Booking::with(['user', 'screen.venue'])
            ->latest()
            ->take(10)
            ->get();


        return view('admin.dashboard', compact('stats', 'recentBookings'));
    }

    public function users()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function bookings()
    {
        $bookings = Booking::with(['user', 'screen.venue', 'media'])
            ->latest()
            ->paginate(20);

        return view('admin.bookings.index', compact('bookings'));
    }

}
