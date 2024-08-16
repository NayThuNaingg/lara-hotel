@extends('frontend.layouts.master')

@section('index')
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            @foreach($rooms as $room)
            <div class="col-lg-4 col-md-6">
                <div class="room-item">
                    <img src="{{ URL::asset('assets/upload/' . $room->id . '/thumb/' . $room->thumbnail) }}" class="rounded-3 img-fluid" alt="{{ $room->view_name }}">
                    <div class="ri-text">
                        <h4>{{ $room->view_name }}</h4>
                        <h3>{{ $room->price_per_day }}{{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}<span>/Pernight</span></h3>
                        <table>
                            <tbody>
                            <tr>
                                <td class="r-o">Room No :</td>
                                <td><p class="mt-2 p-1 bg-primary badge text-light">{{ $room->name }}</p></td>
                            </tr>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>{{ $room->size }}{{ getSiteSetting() !== null ? getSiteSetting()->size_unit : '' }}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>{{ $room->occupancy }}{{ getSiteSetting() !== null ? getSiteSetting()->occupancy : '' }}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Bed:</td>
                                    <td>{{ $room->bed_name }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ URL::asset('rooms/detail/' . $room->id) }}" class="primary-btn">More Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>
@endsection
