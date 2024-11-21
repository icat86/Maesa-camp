<?php

namespace App\Http\Controllers;

use App\Models\Person; // Import model Person
use Illuminate\Http\Request;

class PersonController extends Controller
{
    // Function to display the check-in view with person data
    public function index()
    {
        // Retrieve all data from the Person table
        $people = Person::all();

        // Pass data to the 'admin.person' view
        return view('admin.person', data: compact('people'));
    }

    // Store a new person entry
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'tname' => 'required',
            'tid' => 'required',
            'tgender' => 'required',
            'tcompany' => 'required',
            'tcompanysponsor' => 'nullable'
        ]);

        // Store the data in the database
        Person::create([
            'name' => $request->tname,
            'ktp_id' => $request->tid,
            'gender' => $request->tgender,
            'company' => $request->tcompany,
            'sponsor_company' => $request->tcompanysponsor
        ]);

        return redirect()->back()->with('success', 'Person added successfully');
    }

     // Update an existing person entry
     public function update(Request $request, Person $person)
     {
         // Validate the request
         $request->validate([
             'name' => 'required',
             'ktp_id' => 'required',
             'gender' => 'required',
             'company' => 'required',
             'sponsor_company' => 'nullable'
         ]);
 
         // Update the person's data in the database
         $person->update([
             'name' => $request->name,
             'ktp_id' => $request->ktp_id,
             'gender' => $request->gender,
             'company' => $request->company,
             'sponsor_company' => $request->sponsor_company
         ]);
 
         return redirect()->back()->with('success', 'Person updated successfully');
     }

    // Delete an existing person
    public function destroy(Person $person)
    {
        // Delete the person from the database
        $person->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Person deleted successfully.');
    }
}

