<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bookings;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\BookingDetails;
use Illuminate\Support\Facades\Hash;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Bookings";
        $bookings = Bookings::paginate(5);

        if($request->search_input){
            // $bookings = Bookings::where("service_name", "LIKE", "%$request->search_input%")
            // ->orWhere("description", "LIKE", "%$request->search_input%")
            // ->paginate(5);
        }

        return view("bookings/index", compact("title", "bookings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "client_name" => "required",
            "client_email" => "required | email | unique:users,email",
            "client_phone" => "required | numeric",
            "client_date" => "required | date",
            "service_id" => "required | numeric",
        ]);

        $services = Services::find($request->service_id);

        $temp_password = rand(100000, 999999);

        $users = User::create([
            'name' => $request->client_name,
            'email' => $request->client_email,
            'password' => Hash::make($temp_password),
        ]);
        $users->assignRole('Client');

        $bookings = new Bookings();

        $bookings->client_id = $users->id;
        $bookings->photographer_id = 1;
        $bookings->date = $request->client_date;
        $bookings->service_id = $request->service_id;
        $bookings->status = 1;
        $bookings->save();

        $bookingDetails = new BookingDetails();

        $bookingDetails->booking_id = $bookings->id;
        $bookingDetails->name = $request->client_name;
        $bookingDetails->email = $request->client_email;
        $bookingDetails->phone = $request->client_phone;
        $bookingDetails->company_name = $request->client_company_name ?? "";
        $bookingDetails->message = $request->client_message ?? "";
        $bookingDetails->total_price = $services->price;
        $bookingDetails->payment_method = 1;
        $bookingDetails->save();

        //send email to client with password
        if (isset($users->id)) {
            dd('here');
            // return response()->json(["status" => 'success', "message" => "Booking created successfully, Please check your email for further details"]);
        } else {
            // return response()->json(["status" => 'error', "message" => "Booking not created"]);
            dd('here2');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Bookings $bookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bookings $bookings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingsRequest $request, Bookings $bookings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookings $bookings)
    {
        //
    }
}
