<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Http\Requests\StoreFlightRequest;
use App\Http\Requests\UpdateFlightRequest;
use App\Triats\FlightTriat;

class FlightController extends Controller
{
    use FlightTriat;
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    public function index()
    {
        $flights = Flight::query();
        $data['arrivals'] = $flights->pluck('to_city');
        $data['debartures'] = $flights->pluck('from_city');
        $flights = $this->queryFilter($flights);
        $data['flights'] = $flights->get();
        return view('flight.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flights = Flight::query();
        $data['arrivals'] = $flights->pluck('to_city');
        $data['debartures'] = $flights->pluck('from_city');
        return view('flight.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFlightRequest $request)
    {
        $flight_data = $request->validated();
       if(Flight::create($flight_data)) 
        return redirect()->back()->with('success','The flight has been added successfully');

        return redirect()->back()->withErrors('An error occurred while add the flight. Please try again');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        if(!$flight)return abort(404);
        
        $date['flight'] = $flight ;
        
        return view('flight.show',$date);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        if(!$flight)return abort(404);
        $data['flight'] = $flight ;
        $flights = Flight::query();
        $data['arrivals'] = $flights->pluck('to_city');
        $data['debartures'] = $flights->pluck('from_city');
        return view('flight.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFlightRequest $request, Flight $flight)
    {
        if(!$flight)return abort(404);

        $flight_data = $request->validated();
      

        if($flight->update($flight_data)) 
         return redirect()->back()->with('success','The flight has been updated successfully');
         return redirect()->back()->withErrors('An error occurred while updated The flight. Please try again');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        try {
            if(!$flight)return abort(404);

        if($flight->delete()) 
        return redirect()->back()->with('success','The flight has been deleted successfully');

        return redirect()->back()->withErrors('An error occurred while deleted The flight. Please try again');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors('This flight has bookings. You cannot delete it!');
        }
       
    }
}
