<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }

    public function transactions()
    {
        return $this->hasOne(BookingDetails::class);
    }
}
