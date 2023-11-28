<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }

    public function booking_details()
    {
        return $this->belongsTo(BookingDetails::class,'id');
    }

    public function services()
    {
        return $this->belongsTo(Services::class,'service_id');
    }
}
