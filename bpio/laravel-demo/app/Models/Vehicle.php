<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_vehicle');
    }
}
