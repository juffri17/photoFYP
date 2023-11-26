<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";
        $now = Carbon::now();

        $todayMoney = Bookings::with("transactions")
        ->where('status', 3)
        ->where('updated_at', '>=', $now)
        ->get();

        if ($todayMoney->count() > 0) {
            $todayMoney = '1000';
        } else {
            $todayMoney = 0;
        }

        $role = Role::where('id', 3)->first();
        $todayUser = $role->users()->where('created_at', '>=', $now)->count();

        $newClient = Bookings::where('status',2)->count();

        $totalMoney = Bookings::with("transactions")
        ->where('status', 3)
        ->get();

        if ($totalMoney->count() > 0) {
            $totalMoney = '1000';
        } else {
            $totalMoney = 0;
        }
        
        return view("dashboard", ['title' => $title,'todayMoney' => $todayMoney,'todayUser' => $todayUser,'newClient' => $newClient,'totalMoney' => $totalMoney]);
    }
}
