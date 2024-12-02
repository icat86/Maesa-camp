<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    use HasFactory;

    protected $table = 'check_ins'; 

    // Menentukan kolom mana yang boleh diisi
    protected $fillable = [
        'person_id', 
        'order_by', 
        'cost_code', 
        'other_requirements', 
        'date_order', // pastikan kolom ini ada di tabel 'check_ins'
        'room_type', 
        'date_in', 
        'date_out', 
        'remarks'
    ];

    // Relasi antara CheckIn dan Person (CheckIn belongs to Person)
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    // Jika Anda ingin menonaktifkan timestamps (created_at, updated_at)
    // public $timestamps = false;
}

