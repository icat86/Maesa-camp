<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    use HasFactory;

    protected $table = 'persons';  // Jika tabel bernama 'persons'

    //if gonna use created at, and updated at
    public $timestamps = true;

    protected $fillable = [
        'name', 'ktp_id', 'gender', 'company', 'sponsor_company'
    ];

    public function checkIns()
    {
        return $this->hasMany(CheckIn::class);
    }
}
