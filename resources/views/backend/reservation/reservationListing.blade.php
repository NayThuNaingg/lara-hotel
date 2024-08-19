@extends('backend.layouts.master')
@section('content')
    <div class="page-heading">
        <h3>ROOM</h3>
    </div>
    <div class="page-content vh-100">
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">ROOM Listing</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive datatable-minimal">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>Room No</th>
                                    <th>Custmer</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Checkin</th>
                                    <th>Checkout</th>
                                    <th>Extra Bed</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                <tr>
                                    <td><span class="mt-2 p-1 bg-primary badge">{{ $reservation->room_name }}</span></td>
                                    <td>{{ $reservation->customer_name }}</td>
                                    <td>{{ $reservation->email }} </td>
                                    <td>{{ $reservation->phone }}</td>
                                    <td>{{ $reservation->checkin }}</td>
                                    <td>{{ $reservation->checkout }} </td>
                                    <td>
                                        @if($reservation->extra_bed == 0)
                                            <span class="bg-danger text-white rounded p-1">None</span>
                                        @else 
                                            <span class="mt-2 p-1 bg-success badge">Include</span>
                                        @endif
                                    </td>
                                    <td>{{ $reservation->total_price }} {{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}</td>
                                    <td> 
                                        @if($reservation->status == 0)
                                        <span class="mt-2 p-1 bg-warning badge">Pending</span> 
                                        @else
                                            <span class="bg-success text-white rounded p-1">Confirm</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($reservation->status == 1)
                                        <a href="{{ URL::to('admin-backend/reservation/delete') }}/{{ $reservation->id }}" ><span class="bg-warning text-white rounded p-2">Reject</span> </a>
                                        @else
                                        <a href="{{ URL::to('admin-backend/reservation/confirm') }}/{{ $reservation->id }}" ><span class="bg-success text-white rounded p-2">Confirm</span></a>
                                        <a href="{{ URL::to('admin-backend/reservation/delete') }}/{{ $reservation->id }}"><span class="bg-warning text-white rounded p-2">Reject</span></a>
                                        @endif     
                                    </td>
                              </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
