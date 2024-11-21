<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';  // The table name

    protected $fillable = [
        'date_order',
        'name',
        'company',
        'date_in',
        'date_out',
    ];
}
