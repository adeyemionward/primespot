<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'screen_id',
        'media_path',
        'reference',
        'start_date',
        'end_date',
        'days',
        'content',
        'payment_status',
    ];

    const PAYMENT_STATUS_PAID = 'paid';
    const PAYMENT_STATUS_PENDING = 'pending';
    const PAYMENT_STATUS_CANCELLED = 'cancelled';

    protected $statusColors = [
        self::PAYMENT_STATUS_PAID => 'text-success', // Green
        self::PAYMENT_STATUS_PENDING => 'text-dark', // Orange/Yellow
        self::PAYMENT_STATUS_CANCELLED => 'text-danger', // Red
    ];

    public function getPaymentStatusColorAttribute()
    {
        return $this->statusColors[$this->payment_status] ?? 'text-secondary'; // Default color
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function screen()
    {
        return $this->belongsTo(Screen::class);
    }


}
