<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // Add the method to return the CSS class based on the room status
    public function getStatusClassAttribute()
    {
        switch ($this->status) {
            case 'On Board':
                return 'bg-blue-100 text-blue-700';
            case 'Empty':
                return 'bg-gray-100 text-gray-700';
            case 'Visitor':
                return 'bg-green-100 text-green-700';
            case 'Vacant':
                return 'bg-yellow-100 text-yellow-700';
            default:
                return 'bg-gray-100 text-gray-700';
        }
    }
}
