<?php

use App\Http\Controllers\FlightBookingController;
use App\Http\Controllers\FlightController;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $flights = Flight::query();
    $data['arrivals'] = $flights->pluck('to_city');
    $data['debartures'] = $flights->pluck('from_city');
    $data['flights'] = $flights->get();
    return view('flight.index',$data);
});

Auth::routes();

Route::get('/home',function () {
   
    $flights = Flight::query();
    $data['arrivals'] = $flights->pluck('to_city');
    $data['debartures'] = $flights->pluck('from_city');
    $data['flights'] = $flights->get();
    return view('flight.index',$data);
})->name('home');

Route::resource('flights',FlightController::class);
Route::resource( 'booking',FlightBookingController::class);

