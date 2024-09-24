@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-white p-3 mb-3">
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Visitor's Name</th>
                        <th>Visitor's Phone</th>
                        <th>Visitor's email</th>
                        <th>Flight Name</th>
                        <th>Departure City </th>
                        <th>Arrival City</th>
                        <th>Departure Date</th>
                        <th>Departure Time</th>


                    </thead>
                    <Tbody>
                        @foreach ($bookings as $index => $booking)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $booking->name }}</td>
                                <td>{{ $booking->phone }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>{{ $booking->flight?->name }}</td>
                                <td>{{ $booking->flight?->from_city }}</td>
                                <td>{{ $booking->flight?->to_city }}</td>
                                <td>{{ $booking->flight?->trip_date }}</td>
                                <td>{{ $booking->flight?->trip_time }}</td>

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
