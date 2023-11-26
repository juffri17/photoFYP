<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetails extends Model
{
    use HasFactory;

    public function bookings()
    {
        return $this->belongsTo(Bookings::class, 'id');
    }
}
