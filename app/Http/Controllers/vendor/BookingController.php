<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingItem;
use App\Models\Media;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function list(Request $request)
    {
        $user = Auth::user();

        $query = BookingItem::with(['user', 'screen.venue'])->where('host_id',$user->id);

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->input('payment_status'));
        }

        if ($request->filled('start_date')) {
            $query->whereDate('start_date', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
            $query->whereDate('end_date', '<=', $request->input('end_date'));
        }

        $bookingItems =  $query->latest()->get();
        return view('vendor.bookings.list', compact('bookingItems'));
    }

    public function completed(Request $request)
    {
        $user = Auth::user();
        $query = BookingItem::with(['user', 'screen.venue'])->whereDate('end_date', '<', now())->where('host_id',$user->id);

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->input('payment_status'));
        }

        if ($request->filled('start_date')) {
            $query->whereDate('start_date', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
            $query->whereDate('end_date', '<=', $request->input('end_date'));
        }

        // Fetch the bookings, ordered by the latest ones first.
        $bookingItems = $query->latest()->get();

        return view('vendor.bookings.completed', compact('bookingItems'));
    }

    public function pending(Request $request)
    {
        $user = Auth::user();
        $query = BookingItem::with(['user', 'screen.venue'])
            ->whereDate('start_date', '>', now())->where('host_id',$user->id);

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->input('payment_status'));
        }

        if ($request->filled('start_date')) {
            $query->whereDate('start_date', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('end_date', '<=', $request->input('end_date'));
        }
        $bookingItems = $query->latest()->get();
        return view('vendor.bookings.pending', compact('bookingItems'));
    }

    public function ongoing(Request $request)
    {
        $user = Auth::user();
        $query = BookingItem::with(['user', 'screen.venue'])
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())->where('host_id',$user->id);

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->input('payment_status'));
        }

        if ($request->filled('start_date')) {
            $query->whereDate('start_date', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('end_date', '<=', $request->input('end_date'));
        }

        // Fetch the bookings, ordered by the latest ones first.
        $bookingItems = $query->latest()->get();

        // Return the view with the filtered bookings.
        return view('vendor.bookings.ongoing', compact('bookingItems'));
    }

     public function show($id)
    {
        $booking = Booking::where('id',$id)->first();
        return view('vendor.bookings.view', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::find($id);
        $venues = Venue::with('screens')->get();
        $media = Media::where('status', 'approved')->get();
        $users = User::where('status', 'active')->get();
        return view('vendor.bookings.edit', compact('venues', 'media','users','booking'));
    }
}
