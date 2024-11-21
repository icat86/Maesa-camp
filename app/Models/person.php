<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    use HasFactory;

    protected $table = 'persons';  // Jika tabel bernama 'persons'

    protected $fillable = [
        'name', 'ktp_id', 'gender', 'company', 'sponsor_company'
    ];
}
