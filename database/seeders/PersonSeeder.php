<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Person;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Person::create([
            'name' => 'Mark',
            'ktp_id' => 'CLS-0092',
            'gender' => 'Male',
            'company' => 'MSM/TTN',
            'sponsor_company' => 'empty',
        ]);
    }
}
