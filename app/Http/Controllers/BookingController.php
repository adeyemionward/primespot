<?php

namespace App\Http\Controllers;

use App\Mail\CustomerOrderReceipt;
use App\Mail\CustomerOrderToAdmin;
use App\Models\Booking;
use App\Models\BookingItem;
use App\Models\Media;
use App\Models\Screen;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(Request $request)
    {
        $query = Booking::with(['user', 'screen.venue']);

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
        return view('admin.bookings.list', compact('bookings'));
    }

    public function completed(Request $request)
    {
        $query = Booking::with(['user', 'screen.venue'])->whereDate('end_date', '<', now());


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

        return view('admin.bookings.completed', compact('bookings'));
    }

    public function pending(Request $request)
    {
        $query = Booking::with(['user', 'screen.venue'])
            ->whereDate('start_date', '>', now());

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
        return view('admin.bookings.pending', compact('bookings'));
    }

    public function ongoing(Request $request)
    {

        $query = Booking::with(['user', 'screen.venue'])
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now());

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
        return view('admin.bookings.ongoing', compact('bookings'));
    }


    public function create()
    {
        $venues = Venue::with('screens')->get();
        $media = Media::where('status', 'approved')->get();
        $users = User::where('status', 'active')->get();
        return view('admin.bookings.add', compact('venues', 'media','users'));
    }

    // public function store(Request $request)
    // {
    //     // Check if the screen is available for the selected dates
    //     $existingBooking = Booking::where('screen_id', $request->screen_id)
    //         ->where(function ($query) use ($request) {
    //             $query->whereBetween('start_date', [$request->start_date, $request->end_date])
    //                 ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
    //                 ->orWhere(function ($query) use ($request) {
    //                     $query->where('start_date', '<=', $request->start_date)
    //                         ->where('end_date', '>=', $request->end_date);
    //                 });
    //         })
    //         ->exists();
    //     // if ($existingBooking) {
    //     //     return redirect()->back()->with('flash_error', 'This screen is already booked for the selected dates.');
    //     // }

    //     $media_path = $request->file('media_path');
    //     if(!is_null($media_path)){

    //         // Store the media file

    //         $media_path_original = time().'_'.$media_path->getClientOriginalName();
    //         $media_path->move(public_path('media/'), $media_path_original);
    //     }

    //     $booking = Booking::create([
    //         'user_id' => $request->user_id,
    //         'screen_id' => $request->screen_id,
    //         'media_path' => $media_path_original,
    //         'reference' => 'PRIME' . time(),
    //         'start_date' => $request->start_date,
    //         'end_date' => $request->end_date,
    //         'days' => $request->days,
    //         'content' => $request->content,
    //         'payment_status' => $request->payment_status,
    //     ]);

    //     $userDetails = User::where('id', $request->user_id)->first();

    //     if ($booking) {
    //         $userEmail  =  $userDetails->email;
    //         $data = [
    //             'userDetails'  => $userDetails,
    //             'orderDetails' => $booking, // Collection of orders, for example
    //         ];
    //         $pdf_attachment =   Pdf::loadView('invoice_attachment', $data );


    //         $emailSent = true;
    //         try {
    //             //Mail::to($userEmail)->send(new CustomerOrderReceipt($userDetails, $booking, $pdf_attachment));
    //         } catch (\Exception $e) {
    //             Log::error('Failed to send email: ' . $e->getMessage());
    //             $emailSent = false; // Mark email as not sent
    //         }
    //         return redirect()->route('admin.bookings.list')->with('flash_success', 'Booking has been created successfully.');
    //     } else {
    //         return redirect()->back()->with('flash_error', 'An error occurred while creating the booking. Please try again.');
    //     }

    // }

    public function store(Request $request)
    {
        try {
        $start = Carbon::parse($request->start_date);
        $end   = Carbon::parse($request->end_date);

        // Difference in days (inclusive)
        $days = $start->diffInDays($end) + 1;

        $venues = $request->input('venues'); // array of venue/screen/media
        $venuesFiles = $request->file('venues'); // media_path files
        // Create master booking first
        $booking = Booking::create([
            'user_id' => $request->user_id,
            'reference' => 'PRIME' . time(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'days' => $days,
            'content' => $request->content,
            'payment_status' => $request->payment_status,
        ]);

        if (!$booking) {
            return redirect()->back()->with('flash_error', 'Failed to create booking.');
        }

        // Loop through each venue-screen-media and store in BookingItem
        foreach ($venues as $index => $venueData) {

            $screenId = $venueData['screen_id'] ?? null;
            $venueId  = $venueData['venue_id'] ?? null;
            $screen = Screen::where('id', $venueData['screen_id'])->first();

            // Check if screen is available
            $existingBooking = BookingItem::where('screen_id', $screenId)
                ->whereHas('booking', function ($q) use ($request) {
                    $q->where(function ($query) use ($request) {
                        $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                            ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                            ->orWhere(function ($query) use ($request) {
                                $query->where('start_date', '<=', $request->start_date)
                                    ->where('end_date', '>=', $request->end_date);
                            });
                    });
                })
                ->exists();

            // if ($existingBooking) {
            //     return redirect()->back()->with('flash_error', "Screen ID {$screenId} is already booked for the selected dates.");
            // }

            // Handle media upload
            $media_path_original = null;



            if (isset($venuesFiles[$index]['media_path'])) {
                $media = $venuesFiles[$index]['media_path'];
                if ($media instanceof \Illuminate\Http\UploadedFile) {
                    $media_path_original = time() . '_' . $media->getClientOriginalName();
                    $media->move(public_path('media/'), $media_path_original);
                }
            }

            // Create booking item
            BookingItem::create([
                'user_id' => $request->user_id,
                'booking_id' => $booking->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'venue_id' => $venueId,
                'screen_id' => $screenId,
                'host_id' => $screen->host_id,
                'amount' => $screen->daily_rate * $days,
                'media_path' => $media_path_original,
            ]);
        }

            // Commit transaction if everything passes
            DB::commit();

            return redirect()
                ->route('admin.bookings.view', $booking->id)
                ->with('flash_success', 'Booking has been created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Booking creation failed: ' . $e->getMessage());

            return redirect()->back()->with('flash_error', $e->getMessage());
        }
    }


     public function show($id)
    {
        $booking = Booking::where('id',$id)->first();
        $bookingItems = BookingItem::with(['venue', 'screen', 'booking'])->where('booking_id',$id)->get();

        return view('admin.bookings.view', compact('bookingItems','booking'));
    }

    public function payment_status(Request $request, $id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return redirect()->back()->with('flash_error', 'Booking not found.');
        }

        // Validate the request data
        $request->validate([
            'payment_status' => 'required|in:pending,paid,cancelled,pending',
        ]);

        // Update the booking's payment status
        $booking->payment_status = $request->payment_status;
        $booking->save();

        return redirect()->route('admin.bookings.view', ['id' => $id])->with('flash_success', 'Payment status updated successfully.');
    }



    public function edit($id)
    {
        // Load booking with its items
        $booking = Booking::with('items.venue.screens')->findOrFail($id);

        // Load all available customers and venues
        $users = User::all();
        $venues = Venue::all();

        return view('admin.bookings.edit', compact('booking', 'users', 'venues'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $start = Carbon::parse($request->start_date);
            $end   = Carbon::parse($request->end_date);

            // Difference in days (inclusive)
            $days = $start->diffInDays($end) + 1;
            $booking = Booking::with('items')->findOrFail($id);


            // Update main booking
            $booking->update([
                'user_id' => $request->user_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'days' => \Carbon\Carbon::parse($request->start_date)
                            ->diffInDays(\Carbon\Carbon::parse($request->end_date)) + 1,
                'content' => $request->content,
                'payment_status' => $request->payment_status,
            ]);

            $existingItemIds = $booking->items->pluck('id')->toArray();
            $submittedItemIds = [];

            $venues = $request->input('venues', []);
            $venuesFiles = $request->file('venues'); // media_path files

            foreach ($venues as $index => $venueData) {
                $itemId = $venueData['id'] ?? null;

                $screen = Screen::where('id', $venueData['screen_id'])->first();

                // Handle media file
                $media_path_original = null;


                if (isset($venuesFiles[$index]['media_path'])) {
                    $media = $venuesFiles[$index]['media_path'];
                    if ($media instanceof \Illuminate\Http\UploadedFile) {
                        $media_path_original = time() . '_' . $media->getClientOriginalName();
                        $media->move(public_path('media/'), $media_path_original);
                    }
                }

                if ($itemId) {
                    // Update existing item
                    $item = BookingItem::find($itemId);
                    if ($item) {
                        $item->update([
                            'venue_id' => $venueData['venue_id'],
                            'screen_id' => $venueData['screen_id'],
                            'media_path' => $media_path_original ?? $item->media_path,
                            'amount' => $screen->daily_rate * $days,
                        ]);
                        $submittedItemIds[] = $itemId;
                    }
                } else {
                    // Create new item
                    $newItem = BookingItem::create([
                        'booking_id' => $booking->id,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'user_id' => $request->user_id,
                        'venue_id' => $venueData['venue_id'],
                        'screen_id' => $venueData['screen_id'],
                        'host_id' => $screen->host_id,
                        'media_path' => $media_path_original,
                        'amount' => $screen->daily_rate * $days,
                    ]);
                    $submittedItemIds[] = $newItem->id;
                }
            }

            // Delete removed items
            $itemsToDelete = array_diff($existingItemIds, $submittedItemIds);
            if (!empty($itemsToDelete)) {
                BookingItem::whereIn('id', $itemsToDelete)->delete();
            }

            // Commit transaction if everything passes
            DB::commit();

            return redirect()
                ->route('admin.bookings.view', $booking->id)
                ->with('flash_success', 'Booking has been updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Booking creation failed: ' . $e->getMessage());

            return redirect()->back()->with('flash_error', $e->getMessage());
        }
    }






    // public function update(Request $request, $id)
    // {
    //     // 1. Find the existing booking record.
    //     $booking = Booking::find($id);

    //     // If the booking doesn't exist, return an error.
    //     if (!$booking) {
    //         return redirect()->back()->with('flash_error', 'Booking not found.');
    //     }

    //     // 2. Check for screen availability, excluding the current booking.
    //     $existingBooking = Booking::where('screen_id', $request->screen_id)
    //         ->where('id', '!=', $booking->id) // Crucial for update: exclude the current booking
    //         ->where(function ($query) use ($request) {
    //             $query->whereBetween('start_date', [$request->start_date, $request->end_date])
    //                 ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
    //                 ->orWhere(function ($query) use ($request) {
    //                     $query->where('start_date', '<=', $request->start_date)
    //                         ->where('end_date', '>=', $request->end_date);
    //                 });
    //         })
    //         ->exists();

    //     // 3. Handle availability check.
    //     // if ($existingBooking) {
    //     //     return redirect()->back()->with('flash_error', 'This screen is already booked for the selected dates.');
    //     // }

    //     $media_path_original = $booking->media_path; // Default to existing path

    //     // 4. Handle media file update.
    //     if ($request->hasFile('media_path')) {
    //         $media_path = $request->file('media_path');
    //         // Delete old media file if it exists
    //         if (!is_null($booking->media_path) && File::exists(public_path('media/' . $booking->media_path))) {
    //             File::delete(public_path('media/' . $booking->media_path));
    //         }

    //         // Store the new media file
    //         $media_path_original = time().'_'.$media_path->getClientOriginalName();
    //         $media_path->move(public_path('media/'), $media_path_original);
    //     }

    //     // 5. Update the booking record.
    //     $booking->update([
    //         'user_id' => $request->user_id,
    //         'screen_id' => $request->screen_id,
    //         'media_path' => $media_path_original,
    //         'start_date' => $request->start_date,
    //         'end_date' => $request->end_date,
    //         'days' => $request->days,
    //         'content' => $request->content,
    //         'payment_status' => $request->payment_status,
    //     ]);

    //     // 6. Handle email logic after a successful update.
    //     if ($booking) {
    //         $userDetails = User::where('id', $request->user_id)->first();
    //         $userEmail = $userDetails->email;
    //         $data = [
    //             'userDetails' => $userDetails,
    //             'orderDetails' => $booking,
    //         ];
    //         $pdf_attachment = Pdf::loadView('invoice_attachment', $data);

    //         try {
    //             // Uncomment and use mailer logic here
    //             Mail::to($userEmail)->send(new CustomerOrderReceipt($userDetails, $booking, $pdf_attachment));
    //             Mail::to('info@primespot.net.ng')->send(new CustomerOrderToAdmin($userDetails, $booking, $pdf_attachment));
    //         } catch (\Exception $e) {
    //             Log::error('Failed to send email: ' . $e->getMessage());
    //         }

    //         return redirect()->route('admin.bookings.list')->with('flash_success', 'Booking has been updated successfully.');
    //     } else {
    //         return redirect()->back()->with('flash_error', 'An error occurred while updating the booking. Please try again.');
    //     }
    // }

    public function orderInvoicePdf($id){

        $booking =  Booking::where('id', $id)->first();
        $bookingItems = BookingItem::with(['venue', 'screen', 'booking'])->where('booking_id',$id)->get();

        $pdf = PDF::loadView('booking_invoice_pdf',compact('booking','bookingItems'));
        return $pdf->stream('booking_invoice.pdf');
    }


    public function destroyBookingItem($id)
    {
        DB::beginTransaction();

        try {
            $item = BookingItem::findOrFail($id);

            // If media file exists, delete it from public/media folder
            if ($item->media_path && file_exists(public_path('media/' . $item->media_path))) {
                unlink(public_path('media/' . $item->media_path));
            }

            $item->delete();

            DB::commit();

            return redirect()->back()->with('flash_success', 'Booking item deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to delete BookingItem: ' . $e->getMessage());

            return redirect()->back()->with('flash_error', 'Failed to delete booking item.');
        }
    }

}
