<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bookings;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\BookingDetails;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Bookings";
        $bookings = Bookings::select('bookings.*')
        ->with(['booking_details', 'client', 'services'])
        ->when($request->search_input, function ($query) use ($request) {
            $query->WhereHas('client', function ($subQuery) use ($request) {
                    $subQuery->where('name', 'like', '%' . $request->search_input . '%')
                        ->orWhere('email', 'like', '%' . $request->search_input . '%');
                })
                ->orWhereHas('booking_details', function ($subQuery) use ($request) {
                    $subQuery->where('name', 'like', '%' . $request->search_input . '%')
                        ->orWhere('email', 'like', '%' . $request->search_input . '%')
                        ->orWhere('phone', 'like', '%' . $request->search_input . '%')
                        ->orWhere('company_name', 'like', '%' . $request->search_input . '%')
                        ->orWhere('message', 'like', '%' . $request->search_input . '%');
                })
                ->orWhereHas('services', function ($subQuery) use ($request) {
                    $subQuery->where('service_name', 'like', '%' . $request->search_input . '%');
                });
        })
        ->when($request->status, function ($query) use ($request) {
            $query->where('status', $request->status);
        })
        ->when($request->service_id, function ($query) use ($request) {
            $query->where('service_id', $request->service_id);
        })
        ->when($request->to, function ($query) use ($request) {
            $query->whereDate('date', '<=', $request->to);
        })
        ->when($request->from, function ($query) use ($request) {
            $query->whereDate('date', '>=', $request->from);
        });

        if(auth()->user()->hasRole('Client'))
        {
            $bookings->where('client_id', auth()->user()->id);
        }

        $bookings = $bookings
        ->orderBy('id', 'desc')
        ->paginate(5);

        // dd($bookings->get());
        $services = Services::all();
        return view("bookings/index", compact("title", "bookings", "services"));
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

        try {
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

            $details = [
                'title' => 'Hello ' . $request->client_name,
                'content' => 'Welcome to Photogram, your account has been created successfully,for more details about booking can be found in your account',
                'username' => $request->client_email,
                'password' => $temp_password,
                'url' => config('app.url') . '/account-login',
            ];

            Mail::to($request->client_email)->send(new \App\Mail\NewAccountMail($details));

            return response()->json(["status" => 'success', "message" => "Booking created successfully, Please check your email for further details"]);
        } catch (\Throwable $th) {
            return response()->json(["status" => 'error', "message" => "Booking not created"]);
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

    public function cancel(Request $request)
    {
        $request->validate([
            "id" => "required | numeric",
        ]);

        try {
            $bookings = Bookings::find($request->id);

            $bookings->status = 4;
            $bookings->save();

            return response()->json(["status" => 'success', "message" => "Booking cancelled successfully"]);
        } catch (\Throwable $th) {
            return response()->json(["status" => 'error', "message" => "Booking not cancelled"]);
        }
    }

    public function progress(Request $request)
    {
        $request->validate([
            "booking_id" => "required | numeric",
            'progress' => 'required | numeric | min:0 | max:100',
        ]);

        try {
            $bookings = Bookings::find($request->booking_id);

            $bookings->status = $request->progress;
            $bookings->save();

            return response()->json(["status" => 'success', "message" => "Booking progress updated successfully"]);
        } catch (\Throwable $th) {
            return response()->json(["status" => 'error', "message" => "Booking progress not updated"]);
        }
    }

    public function payment(Request $request)
    {
        $request->validate([
            "booking_id" => "required | numeric",
            'total_payment' => 'required | numeric',
            'payment_proof' => 'required | mimes:jpeg,jpg,png,pdf | max:2048',
        ]);

        try {
            $bookings = Bookings::find($request->booking_id);

            $bookings->status = 2;
            $bookings->save();

            $bookingDetails = BookingDetails::where('booking_id', $request->booking_id)->first();

            $bookingDetails->payment_price = $request->total_payment;
            $bookingDetails->payment_proof = $request->payment_proof->store('payment_proof', 'public');
            $bookingDetails->payment_date = Carbon::now();
            $bookingDetails->payment_status = 'Paid';

            $bookingDetails->save();

            return response()->json(["status" => 'success', "message" => "Booking payment updated successfully"]);
        } catch (\Throwable $th) {
            return response()->json(["status" => 'error', "message" => "Booking payment not updated"]);
        }
    }
}
