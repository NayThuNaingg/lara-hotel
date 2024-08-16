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
        <div class="col-lg-12">
            <div class="room-pagination">
                <a href="{{ $rooms->links() }}">1</a>
                <a href="{{ $rooms->links() }}">2</a>
                <a href="{{ $rooms->links() }} ">Next <i class="fa fa-long-arrow-right"></i></a>
            </div>
        </div>
</section>
@endsection
