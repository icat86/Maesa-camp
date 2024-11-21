<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\CheckIn;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    // Function to display the check-in view with person data
    public function checkIn()
    {
        // Retrieve all data from the check in table
        $booking = CheckIn::all();

        // Pass data to the 'admin.checkin' view
        return view('admin.checkin', compact('booking'));
    }

    public function store(Request $request)
    {
        // Validate inputs
        $request->validate([
            'person_id' => 'required',
            'order_by' => 'required',
            'cost_code' => 'nullable',
            'other_requirements' => 'nullable',
            'date_in' => 'required|date',
            'date_out' => 'required|date',
            'room_type' => 'required',
            'remarks' => 'nullable'
        ]);

        // Store data in the check_ins table
        CheckIn::create([
            'person_id' => $request->person_id,
            'order_by' => $request->order_by,
            'cost_code' => $request->cost_code,
            'other_requirements' => $request->other_requirements,
            'date_in' => $request->date_in,
            'date_out' => $request->date_out,
            'room_type' => $request->room_type,
            'remarks' => $request->remarks,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Check-in successfully saved.');
    }
}
