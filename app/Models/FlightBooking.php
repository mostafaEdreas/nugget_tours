<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightBooking extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'email',
    'phone',
    'flight_id',
];

    public function flight(){
        return $this->belongsTo(Flight::class);
    }
}
