<?php

namespace App\Http\Controllers;

use App\Models\Room;  // Import the Room model

class RoomController extends Controller
{
    public function index()
    {
        // Retrieve all the rooms from the database
        $rooms = Room::all();

        // Pass the rooms to the view
        return view('admin.camplist', compact('rooms'));
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->back()->with('success', 'Room deleted successfully.');
    }
}
