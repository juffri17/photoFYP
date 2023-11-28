<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('frontPage', compact('services'));
    }

    public function gallery()
    {
        return view('frontGallery');
    }
}
