@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('flights.update',$flight->id ) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12 bg-white p-3 mb-3">
                    <label for="exampleDataList" class="form-label">Name</label>
                    <input class="form-control" value="{{$flight->name}}" readonly type="text" id="exampleDataList" placeholder="Name">
    
                    <label for="exampleDataList" class="form-label">Debarture City</label>
                    <input class="form-control" value="{{$flight->from_city}}"readonly id="exampleDataList" placeholder="Debarture City">
                
    
                    <label for="exampleDataList" class="form-label">Arrival City</label>
                    <input class="form-control" value="{{$flight->to_city}}" readonly id="exampleDataList" placeholder="Arrival City">
                    
    
                    <label for="exampleDataList" class="form-label">Date</label>
                    <input class="form-control" readonly value="{{$flight->trip_date}}" type="date" id="exampleDataList" placeholder="Date">
    
                    <label for="exampleDataList" class="form-label">Time</label>
                    <input class="form-control" readonly value="{{$flight->trip_time}}" type="time" id="exampleDataList"  min="00:00" max="23:59" placeholder="Time">
                </div>
                <div class="col-12">
                    <a href="{{url('flights')}}"> Get All</a>
                </div>
            </div>
           
        </form>
        
    </div>
@endsection
