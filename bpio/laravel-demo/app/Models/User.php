<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    protected $fillable = ['*'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'user_vehicle');
    }

}
