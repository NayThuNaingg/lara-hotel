@extends('frontend.layouts.master')
@section('index')
<section class=" spad services-section ">
    <div class="container">
        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <h2>Stay with us at {{ getSiteSetting() !== null ? getSiteSetting()->name : '' }} YANGON</h2>
                            <div class="bt-option">
                                <a href="{{route('indexForm')}}">Home</a>
                                <span>Rooms</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($rooms as $room)
            <div class="col-lg-4 col-md-6">
                <div class="room-item">
                    <img src="{{ URL::asset('assets/upload/' . $room->id . '/thumb/' . $room->thumbnail) }}" class="rounded-3" alt="" style="width: 100%; height:100%;">
                    <div class="ri-text">
                        <h5>{{ $room->view_name }}</h5>
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
                        <a href="{{URL::asset('rooms/detail')}}/{{$room->id}}" class="primary-btn">More Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
