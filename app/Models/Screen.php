<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    use HasFactory;

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
}
