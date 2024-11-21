<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function showCheckIn()
    {
        // Return the view for the Check In page
        return view('admin.checkin');
    }
}

class CheckInController extends Controller
{
    public function store(Request $request)
    {
        $people = $request->input('person');
        
        // Do something with $people array, like saving it to the database
        return redirect()->back()->with('success', 'Booking saved successfully!');
    }
}
