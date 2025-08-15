<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Mail\CustomerOrderReceipt;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Media;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        $venues = Venue::with('screens')->get();
        $media = Media::where('status', 'approved')->get();
        $users = User::where('status', 'active')->get();
        return view('customer.bookings.add', compact('venues', 'media','users'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        // $request->validate([
        //     'screen_id' => 'required|exists:screens,id',
        //     'media_id' => 'required|exists:media,id',
        //     'start_date' => 'required|date',
        //     'end_date' => 'required|date|after_or_equal:start_date',
        //     'amount' => 'required|numeric|min:0',
        // ]);


        // $amount = $request->amount;

        // if ($media->file_type === 'video') {
        //     // Handle video-specific logic if needed
        // } elseif ($media->file_type === 'image') {
        //     // Handle image-specific logic if needed
        // }
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'screen_id' => 'required|exists:screens,id',
        //     'media_path' => 'required|exists:media,id',
        //     'start_date' => 'required|date',
        //     'end_date' => 'required|date|after_or_equal:start_date',
        //     'amount' => 'required|numeric|min:0',
        //     'content' => 'nullable|string|max:255',
        //     'payment_status' => 'required|in:pending,paid,cancelled,completed',
        // ]);
        // Check if the screen is available for the selected dates
        $existingBooking = Booking::where('screen_id', $request->screen_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('start_date', '<=', $request->start_date)
                            ->where('end_date', '>=', $request->end_date);
                    });
            })->where('user_id', $user->id)
            ->exists();
        // if ($existingBooking) {
        //     return redirect()->back()->with('flash_error', 'This screen is already booked for the selected dates.');
        // }

        $media_path = $request->file('media_path');
        if(!is_null($media_path)){

            // Store the media file

            $media_path_original = time().'_'.$media_path->getClientOriginalName();
            $media_path->move(public_path('media/'), $media_path_original);
        }

        $booking = Booking::create([
            'user_id' => $user->id,
            'screen_id' => $request->screen_id,
            'media_path' => $media_path_original,
            'reference' => 'PRIME' . time(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'days' => $request->days,
            'content' => $request->content,
            'payment_status' => 'pending',
        ]);
        $userDetails = User::where('id', $user->id)->first();


        if ($booking) {
            $userEmail  =  $userDetails->email;
            $data = [
                'userDetails'  => $userDetails,
                'orderDetails' => $booking, // Collection of orders, for example
            ];
            $pdf_attachment =   Pdf::loadView('invoice_attachment', $data );


            $emailSent = true;
            try {
                Mail::to($userEmail)->send(new CustomerOrderReceipt($userDetails, $booking, $pdf_attachment));
            } catch (\Exception $e) {
                Log::error('Failed to send email: ' . $e->getMessage());
                $emailSent = false; // Mark email as not sent
            }
            return redirect()->route('customer.bookings.list')->with('flash_success', 'Booking has been created successfully.');
        } else {
            return redirect()->back()->with('flash_error', 'An error occurred while creating the booking. Please try again.');
        }
    }

    public function list(Request $request)
    {
        $user = Auth::user();

        $query = Booking::with(['user', 'screen.venue'])->where('user_id',$user->id);

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->input('payment_status'));
        }

        if ($request->filled('start_date')) {
            $query->whereDate('start_date', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
            $query->whereDate('end_date', '<=', $request->input('end_date'));
        }

        $bookings =  $query->latest()->get();
        return view('customer.bookings.list', compact('bookings'));
    }

    public function completed(Request $request)
    {
        $user = Auth::user();
        $query = Booking::with(['user', 'screen.venue'])->whereDate('end_date', '<', now())->where('user_id',$user->id);


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
        $bookings = $query->latest()->get();

        return view('customer.bookings.completed', compact('bookings'));
    }

    public function pending(Request $request)
    {
        $user = Auth::user();
        $query = Booking::with(['user', 'screen.venue'])
            ->whereDate('start_date', '>', now())->where('user_id',$user->id);

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->input('payment_status'));
        }

        if ($request->filled('start_date')) {
            $query->whereDate('start_date', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('end_date', '<=', $request->input('end_date'));
        }
        $bookings = $query->latest()->get();
        return view('customer.bookings.pending', compact('bookings'));
    }

    public function ongoing(Request $request)
    {
        $user = Auth::user();
        $query = Booking::with(['user', 'screen.venue'])
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())->where('user_id',$user->id);

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
        $bookings = $query->latest()->get();

        // Return the view with the filtered bookings.
        return view('customer.bookings.ongoing', compact('bookings'));
    }

     public function show($id)
    {
        $booking = Booking::where('id',$id)->first();
        return view('customer.bookings.view', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::find($id);
        $venues = Venue::with('screens')->get();
        $media = Media::where('status', 'approved')->get();
        $users = User::where('status', 'active')->get();
        return view('customer.bookings.edit', compact('venues', 'media','users','booking'));
    }
}
