@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                                <td>



                                    <a href="{{ url('flights/booking/' . $flight->id) }}"
                                        class="btn  btn-success position-relative">
                                        Booking
                                    </a>
                                    <a href="{{ url('flights/show/' . $flight->id) }}" class="btn btn-info position-relative">
                                        show
                                    </a>
                                    @auth
                                        <a href="{{ url('flights/edit/' . $flight->id) }}"
                                            class="btn btn-primary position-relative">
                                            Edit
                                        </a>
                                        <form id="flight-del-{{ $flight->id }}"
                                            action="{{ url('flights/destroy/' . $flight->id) }}" method="post">
                                            @csrf
                                        </form>
                                        <a href="javascript:void(0)"
                                            onclick="document.getElementById('flight-del-{{ $flight->id }}').submit()"
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
@endsection
