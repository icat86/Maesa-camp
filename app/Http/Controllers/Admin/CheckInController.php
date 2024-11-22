<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CheckIn;
use Illuminate\Http\Request;
use App\Models\Person;

class CheckInController extends Controller
{
    // Function to display the check-in view with person data
    public function checkIn()
    {
        // Retrieve all data from the check in table
        $booking = CheckIn::all();
        $people = Person::all();

        // Pass data to the 'admin.checkin' view
        return view('admin.checkin', compact('booking', 'people'));
    }

    public function store(Request $request)
    {
        // Validate inputs
        $request->validate([
            'person_id' => 'required|array',
            'person_id.*' => 'required|exists:people,id', // validate each person_id exists in people table
            'order_by' => 'required|string',
            'cost_code' => 'nullable|string',
            'other_requirements' => 'nullable|string',
            'date_in' => 'required|array',
            'date_in.*' => 'required|date',
            'date_out' => 'required|array',
            'date_out.*' => 'required|date',
            'room_type' => 'required|array',
            'room_type.*' => 'required|string',
            'remarks' => 'nullable|array',
            'remarks.*' => 'nullable|string'
        ]);

        // Store data in the check_ins table
        foreach ($request->person_id as $index => $person_id) {
            CheckIn::create([
                'person_id' => $person_id,
                'order_by' => $request->order_by,
                'cost_code' => $request->cost_code,
                'other_requirements' => $request->other_requirements,
                'date_in' => $request->date_in[$index],
                'date_out' => $request->date_out[$index],
                'room_type' => $request->room_type[$index],
                'remarks' => $request->remarks[$index] ?? null,
            ]);
        }

        // Redirect back with success message
        return redirect()->route('admin.checkin')->with('success', 'Check-in successfully saved.');
    }
}
