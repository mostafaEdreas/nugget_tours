<?php

namespace App\Triats;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait FlightTriat {
    public function queryFilter(Builder $flight): Builder{
        if (request('from')) $flight = $this->fromCityQueryFilter($flight);
        if (request('to')) $flight = $this->toCityQueryFilter($flight);
        if (request('date') && !request('time')) $flight = $this->dateQueryFilter($flight);
        if (request('time') && !request('date')) $flight = $this->timeQueryFilter($flight);
        if (request('time') && request('date')) $flight = $this->concDateTimeQueryFilter($flight);
        return $flight ;
    }
    function fromCityQueryFilter(Builder $flight):Builder{
        return $flight->whereFromCity(request('from'));
    }

    function toCityQueryFilter(Builder $flight):Builder{
        return $flight->whereToCity(request('to'));
    }

    function dateQueryFilter(Builder $flight):Builder{
        return $flight->whereTripDate(request('date'));
    }

    function timeQueryFilter(Builder $flight):Builder{
        return $flight->whereTripTime(request('time'));
    }

    function concDateTimeQueryFilter(Builder $flight):Builder{
    $date = Carbon::parse(request('date'))->format('Y-m-d');
    $time = Carbon::parse(request('time'))->format('H:i:s');

    $dateTime = $date . ' ' . $time;
    return $flight->whereRaw("CONCAT(trip_date, ' ', trip_time) = ?", [$dateTime]);
    }
}