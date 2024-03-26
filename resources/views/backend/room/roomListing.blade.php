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
                <h5 class="card-title">
                    ROOM Listing
                </h5>
            </div>
            <div class="card-body">
                <div class=" datatable-minimal">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Roo No/ Img</th>
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
                                        <td align="center">
                                            <img src="{{ URL::asset('assets/upload/' . $room->id . '/thumb/' . $room->thumbnail) }}" class="rounded-3 d-block" alt="Thumbnail" style="width:120px;height:70px">
                                            <span class="mt-2 p-1 bg-primary badge">{{$room->name}}</span>
                                        </td>
                                        <td>{{$room->size}} {{ getSiteSetting() !== null ? getSiteSetting()->size_unit : '' }}</td>
                                        <td>{{$room->occupancy}} {{ getSiteSetting() !== null ? getSiteSetting()->occupancy : '' }}</td>
                                        <td>{{$room->bed_name}}</td>
                                        <td>{{$room->view_name}}</td>
                                        <td>{{$room->price_per_day}}{{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}</td>
                                        <td>{{$room->extra_bed_price}}{{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}</td>
                                        <td>
                                            <a href="{{ URL::asset('admin-backend/room/edit')}}/{{ $room->id }}" class="btn icon btn-light"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ URL::asset('admin-backend/room/room-gallery')}}/{{ $room->id }}" class="btn icon btn-light"><i class="fa-solid fa-images"></i></a>
                                            <a href="{{ URL::asset('admin-backend/room/detail')}}/{{ $room->id }}" class="btn icon btn-light"><i class="fa-solid fa-circle-info"></i></a>
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
