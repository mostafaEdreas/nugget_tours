<?php

namespace App\Http\Controllers;

use App\Models\FlightBooking;
use App\Http\Requests\StoreFlightBookingRequest;
use App\Http\Requests\UpdateFlightBookingRequest;

class FlightBookingController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('store');
    }
    public function index()
    {
        $data['bookings'] =FlightBooking::all();
        return view('booking.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFlightBookingRequest $request)
    {
        $booking_data = $request->validated();
        if(FlightBooking::create($booking_data)) 
        return redirect()->back()->with('success','Your booking has been successfully completed');

        return redirect()->back()->withErrors('An error occurred while booking your trip. Please try again');
    }

    /**
     * Display the specified resource.
     */
    public function show(FlightBooking $flightBooking)
    {
        if(!$flightBooking)return abort(404);
        
        $date['flightBooking'] = $flightBooking ;
        return view('booking.show',$date);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlightBooking $flightBooking)
    {
        if(!$flightBooking)return abort(404);
        $date['flightBooking'] = $flightBooking ;
        return view('booking.show',$date);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFlightBookingRequest $request, FlightBooking $flightBooking)
    {
        if(!$flightBooking)return abort(404);

        $booking_data = $request->validated();

        if($flightBooking->update($booking_data)) 
         return redirect()->back()->with('success','Your booking has been updated successfully');
 
         return redirect()->back()->withErrors('An error occurred while updated your trip. Please try again');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlightBooking $flightBooking)
    {
        if(!$flightBooking)return abort(404);

        if($flightBooking->delete()) 
        return redirect()->back()->with('success','Your booking has been deleted successfully');

        return redirect()->back()->withErrors('An error occurred while deleted your trip. Please try again');

    }


}
