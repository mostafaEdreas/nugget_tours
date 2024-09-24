<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'from_city',
    'to_city',
    'trip_date',
    'trip_time',
];
public function bookings(){
    return $this->hasMany(Flight::class);
}
}
