<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profile';
        $user = auth()->user();
        return view('profile/index', compact('title', 'user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'nullable|min:6',
        ]);

        if ($request->password == null)
        {
            return json_encode(['status' => 'error', 'message' => 'Password is required']);
        }

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();

        return json_encode(['status' => 'success', 'message' => 'Profile updated successfully']);
    }
}
