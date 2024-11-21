<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    use HasFactory;

    protected $table = 'check_ins'; 

    protected $fillable = [
        'person_id', 'order_by', 'cost_code', 'other_requirements', 
        'date_order', 'room_type', 'date_in', 'date_out', 'remarks'
    ];
}