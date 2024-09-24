@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 bg-white p-3 mb-3">
                <a href="{{url('flights/create')}}" class="btn btn-primary"> Add Flight</a>
            </div>
            <div class="col-12 bg-white p-3 mb-3">
                <form class="row g-6" method="GET" action="{{url('flights')}}">
                    <div class="col-auto">
                        <label for="inputPassword2">Debarture City</label>
                        <select class="form-select mb-3" name="from" aria-label="">
                            <option value="0" selected>Debarture City</option>
                            @foreach ($debartures as $debarture)
                                <option @selected(request('from') == $debarture) value="{{ $debarture }}">{{ $debarture }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto"> 
                        <label for="inputPassword2">Arrival City</label>
                        <select class="form-select mb-3" name="to" aria-label="">
                            <option value="0" selected>Arrival City</option>
                            @foreach ($arrivals as $arrival)
                                <option @selected(request('to') == $arrival) value="{{ $arrival }}">{{ $arrival }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="staticEmail2">Date</label>
                        <input type="Date" name="date"  value="{{request('date')}}" class="form-control" id="staticEmail2" value="">
                    </div>
                    <div class="col-auto">
                        <label for="inputPassword2">Time</label>
                        <input type="time" value="{{request('time')}}" name="time" class="form-control" id="inputPassword2">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mb-3">Search </button>
                        <a href="{{url('flights')}}"> Get All</a>
                    </div>

                
                </form>
            </div>
            <hr>
            <div class="col-md-12 bg-white p-3 mb-3">
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Departure City </th>
                        <th>Arrival City</th>
                        <th>Departure Date</th>
                        <th>Departure Time</th>
                        <th>Action</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <Tbody>
                        @foreach ($flights as $index => $flight)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $flight->name }}</td>
                                <td>{{ $flight->from_city }}</td>
                                <td>{{ $flight->to_city }}</td>
                                <td>{{ $flight->trip_date }}</td>
                                <td>{{ $flight->trip_time }}</td>
                                <td colspan="4">



                                    <a href="#"
                                        class="btn  btn-success position-relative" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $flight->id }}">
                                        Booking
                                    </a>

                                      <!-- Modal -->
  <div class="modal fade" id="bookingModal{{ $flight->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Booking flight</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       
            <div class="modal-body">
                <form method="post" action="{{ url('booking') }}">
                    @csrf
                    <input name="flight_id" value="{{ $flight->id }}" type="hidden">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp"  class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

      </div>
    </div>
  </div>
                                    <a href="{{ url('flights/' . $flight->id) }}"
                                        class="btn btn-info position-relative">
                                        show
                                    </a>
                                    @auth
                                        <a href="{{ url('flights/' . $flight->id.'/edit') }}"
                                            class="btn btn-primary position-relative">
                                            Edit
                                        </a>
                                        <form id="flight-del-{{ $flight->id }}" class="d-none"
                                            action="{{ url('flights/' . $flight->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                        </form>
                                        <a href="javascript:void(0)" id='btnDel'
                                            onclick='Swal.fire({
                                                title: "Are you sure?",
                                                text: "to Delete {{$flight->name}} ",
                                                icon: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#3085d6",
                                                cancelButtonColor: "#d33",
                                                confirmButtonText: "Yes, delete it!"
                                                }).then((result) => {
                                                if (result.isConfirmed) {
                                                 document.getElementById("flight-del-{{ $flight->id }}").submit()
                                                    
                                                }
                                                });
                                           '
                                            class="btn btn-danger position-relative">
                                            Delete
                                        </a>
                                    @endauth

                                </td>
                            </tr>
                        @endforeach

                    </Tbody>
                </table>
            </div>
        </div>
    </div>




  
  
  <!-- Modal -->
  <div class="modal fade" id="bookingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Booking flight</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       
            <div class="modal-body">
                <form method="post" action="{{ url('booking') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" name="email" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

      </div>
    </div>
  </div>
@endsection
