<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportSeeder extends Seeder
{
    public function run()
    {
        Report::create([
            'date_order' => '2024-04-29',  // YYYY-MM-DD format
            'name' => 'Mark',
            'company' => 'MSM/TTN',
            'date_in' => '2024-09-01',     // YYYY-MM-DD format
            'date_out' => '2024-09-20',    // YYYY-MM-DD format
        ]);
        
        

        Report::create([
            'date_order' => '2024-10-11',
            'name' => 'Stevani',
            'company' => 'MSM/TTN',
            'date_in' => '2024-10-12',
            'date_out' => '2024-10-16',
        ]);
    }
}
