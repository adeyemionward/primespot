<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Screen extends Model
{
    use HasFactory, SoftDeletes;

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }

    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }
}
