@extends('backend.layouts.master')
@section('content')
    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div> 
    <div class="page-content vh-100"> 
        <!-- Basic Tables start -->
        <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    ROOM Listing
                </h5>
            </div>
            <div class="card-body">
                <div class=" datatable-minimal">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Img</th>
                                <th>Size</th>
                                <th>Occupancy</th>
                                <th>Bed</th>
                                <th>View</th>
                                <th>Price</th>
                                <th>Extra Bed</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                    <tr>
                                        <td>
                                            <img src="{{ URL::asset('assets/upload/' . $room->id . '/thumb/' . $room->thumbnail) }}" class="rounded-3 d-block" alt="Thumbnail" style="width:100px;height:100px">
                                            <span class="mt-2 p-3">{{$room->name}}</span>
                                        </td>
                                        <td>{{$room->size}} {{ getSiteSetting() !== null ? getSiteSetting()->size_unit : '' }}</td>
                                        <td>{{$room->occupancy}} {{ getSiteSetting() !== null ? getSiteSetting()->occupancy : '' }}</td>
                                        <td>{{$room->bed_name}}</td>
                                        <td>{{$room->view_name}}</td>
                                        <td>{{$room->price_per_day}}{{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}</td>
                                        <td>{{$room->extra_bed_price}}{{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}</td>
                                        <td>
                                            <a href="{{ URL::asset('admin-backend/room/edit')}}/{{ $room->id }}" class="btn icon btn-light"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ URL::asset('admin-backend/room/delete')}}/{{ $room->id }}" class="btn icon btn-light"><i class="fa-solid fa-trash"></i></a>
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
