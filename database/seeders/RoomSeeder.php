<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('rooms')->insert([
            ['block' => 'SS1', 'room_number' => 'SS1-A', 'room_type' => 'Single', 'status' => 'On Board'],
            ['block' => 'SS6', 'room_number' => 'SS6-D2', 'room_type' => 'Share', 'status' => 'Empty'],
            ['block' => 'Gymnasium', 'room_number' => 'GS14-B', 'room_type' => 'Share', 'status' => 'Visitor'],
            ['block' => 'Penthouse', 'room_number' => 'PH A 01', 'room_type' => 'Single', 'status' => 'Vacant'],
        ]);
    }

}
