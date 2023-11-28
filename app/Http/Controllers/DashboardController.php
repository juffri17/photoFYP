<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bookings;
use Illuminate\Http\Request;
use App\Models\BookingDetails;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->hasRole('Client'))
        {
            return redirect()->route('bookings');
        }

        $title = "Dashboard";
        $now = Carbon::now();

        $todayMoney = BookingDetails::with("bookings")
        ->where('payment_date', '>=', $now)
        ->where('payment_status', 'Paid')
        ->sum('payment_price');

        // dd($todayMoney);


        $role = Role::where('id', 3)->first();
        $todayUser = User::where('created_at', '>=', $now)->count();

        $newClient = Bookings::where('status',1)->count();

        $totalMoney = BookingDetails::with("bookings")
        ->where('payment_status', 'Paid')
        ->sum('payment_price');

        return view("dashboard", ['title' => $title,'todayMoney' => $todayMoney,'todayUser' => $todayUser,'newClient' => $newClient,'totalMoney' => $totalMoney]);
    }
}
