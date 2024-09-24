@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('flights.update',$flight->id ) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12 bg-white p-3 mb-3">
                    <label for="exampleDataList" class="form-label">Name</label>
                    <input class="form-control" value="{{$flight->name}}" name="name" type="text" id="exampleDataList" placeholder="Name">
    
                    <label for="exampleDataList" class="form-label">Debarture City</label>
                    <input class="form-control" value="{{$flight->from_city}}" name="from_city" list="from_city" id="exampleDataList" placeholder="Debarture City">
                    <datalist id="from_city">
                        @foreach ($debartures as $debarture)
                            <option  value="{{ $debarture }}">
                        @endforeach
                    </datalist>
    
                    <label for="exampleDataList" class="form-label">Arrival City</label>
                    <input class="form-control" value="{{$flight->to_city}}" name="to_city" list="to_city" id="exampleDataList" placeholder="Arrival City">
                    <datalist id="to_city">
                        @foreach ($arrivals as $arrival)
                            <option  value="{{ $arrival }}">
                        @endforeach
                    </datalist>
    
                    <label for="exampleDataList" class="form-label">Date</label>
                    <input class="form-control" name="trip_date" value="{{$flight->trip_date}}" type="date" id="exampleDataList" placeholder="Date">
    
                    <label for="exampleDataList" class="form-label">Time</label>
                    <input class="form-control" name="trip_time" value="{{$flight->trip_time}}" type="time" id="exampleDataList"  min="00:00" max="23:59" placeholder="Time">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary mb-3">Update </button>
                    <a href="{{url('flights')}}"> Get All</a>
                </div>
            </div>
           
        </form>
        
    </div>
@endsection
