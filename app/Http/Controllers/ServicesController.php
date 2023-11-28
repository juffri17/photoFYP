<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Services";
        $services = Services::paginate(5);

        if($request->search_input){
            $services = Services::where("service_name", "LIKE", "%$request->search_input%")
            ->orWhere("description", "LIKE", "%$request->search_input%")
            ->paginate(5);
        }

        return view("services/services", compact("title", "services"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Service";
        return view("services/create", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
            "image" => "required",
        ]);

        $images = $request->file("image");
        foreach ($images as $image) {
            $imageName = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path("images"), $imageName);
            $fileName[] = $imageName;
        }

        $jsonImage = json_encode($fileName);


        $services = new Services();
        $services->service_name = $request->name;
        $services->description = $request->description;
        $services->price = $request->price;
        $services->image = $jsonImage;
        $services->save();

        if ($services) {
            return response()->json(["status" => 'success', "message" => "Service created successfully"]);
        } else {
            return response()->json(["status" => 'error', "message" => "Service not created"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = "Edit Service";
        $services = Services::find($id);
        return view("services/create", compact("title", "services"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
        ]);

        if ($request->file("image"))
        {
            $images = $request->file("image");
            foreach ($images as $image)
            {
                $imageName = time() . "_" . $image->getClientOriginalName();
                $image->move(public_path("images"), $imageName);
                $fileName[] = $imageName;
            }

            $jsonImage =  $fileName;

            if ($request->old_image)
            {
                $jsonImage = array_merge($request->old_image, $jsonImage);
            }
        }

        $services = Services::find($request->id);
        $services->service_name = $request->name;
        $services->description = $request->description;
        $services->price = $request->price;
        $services->image = $request->file("image") ? json_encode($jsonImage) : $request->old_image;
        $services->save();

        if ($services) {
            return response()->json(["status" => 'success', "message" => "Service updated successfully", "data" => $services]);
        } else {
            return response()->json(["status" => 'error', "message" => "Service not updated", "data" => $services]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $services = Services::find($request->id);
        $services->delete();

        if ($services) {
            return response()->json(["status" => 'success', "message" => "Service deleted successfully"]);
        } else {
            return response()->json(["status" => 'error', "message" => "Service not deleted"]);
        }
    }

    public function view(Request $request)
    {
        $services = Services::find($request->id);

        if ($services) {
            return response()->json(["status" => 'success', "message" => "Service found", "data" => $services]);
        } else {
            return response()->json(["status" => 'error', "message" => "Service not found"]);
        }
    }
}
