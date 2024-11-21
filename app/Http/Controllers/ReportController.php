<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all(); // Fetch all reports from the database
        return view('admin.reports', compact('reports')); // Pass the reports to the Blade view
    }
}
