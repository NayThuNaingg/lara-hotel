@extends('frontend.layouts.master')
@section('index')
    <!-- Room Details Section Begin -->
    <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <h2>Stay with us at {{ getSiteSetting() !== null ? getSiteSetting()->name : '' }} YANGON</h2>
                            <div class="bt-option">
                                <a href="{{route('indexForm')}}">Room</a>
                                <span>Rooms</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                    <img id="thumb" src="{{ URL::asset('assets/upload/' . $room->id . '/thumb/' . $room->thumbnail) }}" class="rounded " alt="Thumbnail" style="width:100%;height:350px">
                    @if(isset($roomGalleries) && count($roomGalleries) >0 && !isset($roomGallery) )
                        <div class="row mt-2">
                            @foreach ($roomGalleries as $roomGallery)
                            <div class="col-md-3">
                            <img id="gallery_{{$roomGallery->id}}" src="{{ isset($roomGallery) ? URL::asset('assets/upload') . '/' . $id . '/' . $roomGallery->image : '' }}" class="rounded" alt="" >
                            </div>
                            @endforeach
                        </div>
                    @endif
                        <div class="rd-text mt-5">
                            <div class="rd-title">
                                <h3>{{$room->getView->name}}</h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    <a href="#" class="mt-5">Booking Now</a>
                                </div>
                            </div>
                            <h2 class="">{{$room->price_per_day}}{{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>{{$room->size}}{{ getSiteSetting() !== null ? getSiteSetting()->size_unit : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>{{$room->occupancy}}{{ getSiteSetting() !== null ? getSiteSetting()->occupancy : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>{{$room->getBed->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Amenity:</td>
                                        <td>
                                        @foreach($amenityByroomId as $amenity)
                                            <div class="mt-1"><i class="fa-brands fa-intercom mx-1"></i>{{ $amenity->name }}</div>
                                        @endforeach
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="r-o">SpecialFeature:</td>
                                        <td>
                                        @foreach($specialFeatureByRoomId as $specialFeature)
                                            <div class="mt-1"><i class="fa-brands fa-intercom mx-1"></i>{{ $specialFeature->name }}</div>
                                        @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="f-para">{{$room->detail}}</p>
                            <p>{{$room->description}}</p>
                        </div>
                    </div>
                   
                    <div class="rd-reviews">
                        <h4>Reviews</h4>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="{{URL::asset('assets/frontend/img/room/avatar/avatar-1.jpg')}}" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="{{URL::asset('assets/frontend/img/room/avatar/avatar-2.jpg')}}" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="review-add">
                        <h4>Add Review</h4>
                        <form action="#" class="ra-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name*">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email*">
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <h5>You Rating:</h5>
                                        <div class="rating">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star-half_alt"></i>
                                        </div>
                                    </div>
                                    <textarea placeholder="Your Review"></textarea>
                                    <button type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="room-booking">
                        <h3>Your Reservation</h3>
                        <form action="#">
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="date-input" id="date-in" readonly/>
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input" id="date-out" readonly/>
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select id="guest">
                                    <option value="">3 Adults</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room">Room:</label>
                                <select id="room">
                                    <option value="">1 Room</option>
                                </select>
                            </div>
                            <button type="submit">Check Availability</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->
@endsection
@section('script')
<script>
    jQuery(document).ready(function($) {
        const gallery = document.querySelectorAll('[id^="gallery_"]');
        $(gallery).click(function(event) {
            $('#thumb').attr('src', $(event.target).attr('src'));
        });
    });
</script>
@endsection