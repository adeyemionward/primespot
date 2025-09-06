<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
    use HasFactory;

        protected $fillable = [
        'user_id',
        'booking_id',
        'venue_id',
        'screen_id',
        'host_id',
        'start_date',
        'end_date',
        'media_path',
        'amount'
    ];

    // Relationship to booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // Optionally relationship to venue and screen
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function screen()
    {
        return $this->belongsTo(Screen::class);
    }


     public function user()
    {
        return $this->belongsTo(User::class);
    }


}
