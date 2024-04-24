@extends('frontend.layouts.master')
@section('index')
    <!-- Room Details Section Begin -->
    <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <h2>{{$room->getView->name}} (View)</h2>
                            <div class="bt-option">
                                <a href="{{route('indexForm')}}">Room</a>
                                <span>Room Detail</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="room-details-item">
                    <img id="thumb" src="{{ URL::asset('assets/upload/' . $room->id . '/thumb/' . $room->thumbnail) }}" class="rounded " alt="Thumbnail" style="width:100%;height:350px">
                    @if(isset($roomGalleries) && count($roomGalleries) >0 && !isset($roomGallery) )
                    <h5>Room Gallery</h5>
                        <div class="row mt-2">
                            @foreach ($roomGalleries as $roomGallery)
                            <div class="col-md-3">
                            <img id="gallery_{{$roomGallery->id}}" src="{{ isset($roomGallery) ? URL::asset('assets/upload') . '/' . $id . '/' . $roomGallery->image : '' }}" class="rounded" alt="" >
                            </div>
                            @endforeach
                        </div>
                    @endif
                        <div class="rd-text">
                            <div class="rd-title">
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    <a href="#" class="mt-2">Booking Now</a>
                                </div>
                            </div>
                            <h5>Details</h5>
                            <p class="f-para text-muted">{{$room->detail}}</p>
                            <h5>Description</h5>
                            <p class="f-para text-muted">{{$room->description}}</p>
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
                <!-- <div class="col-md-5">
                    <div class="room-booking">
                    <h4 class="mt-2 ">{{$room->price_per_day}}{{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}<span>/Pernight</span></h4>
                    <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="">Room No:</label>
                            </div>
                            <div class="col-md-8">
                            <h4><span class="mt-2 p-1 bg-primary badge text-light">{{$room->name}}</span></h4>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="">Size:</label>
                            </div>
                            <div class="col-md-8">
                            <label for="">
                                {{$room->size}}{{ getSiteSetting() !== null ? getSiteSetting()->size_unit : '' }}
                            </label>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="">Capacity:</label>
                            </div>
                            <div class="col-md-8">
                            <label for="">
                                {{$room->occupancy}}{{ getSiteSetting() !== null ? getSiteSetting()->occupancy : '' }}
                            </label>
                            </div>
                        </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="">Bed:</label>
                        </div>
                        <div class="col-md-8">
                        <label for="">
                            {{$room->getBed->name}}
                        </label>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="">Amenity:</label>
                        </div>
                        <div class="col-md-8">
                        <label for="">
                        @foreach($amenityByroomId as $amenity)
                            <div class="mt-1"><i class="fa-solid fa-ship mx-1"></i>{{ $amenity->name }}</div>
                        @endforeach
                        </label>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="">SpecialFeatuer:</label>
                        </div>
                        <div class="col-md-8">
                        <label for="">
                        @foreach($specialFeatureByRoomId as $specialFeature)
                            <div class="mt-1"><i class="fa-brands fa-intercom mx-1"></i>{{ $specialFeature->name }}</div>
                        @endforeach
                        </label>
                        </div>
                    </div>
                    </div>
                </div> -->
                <div class="col-md-5">
                <div class="room-booking">
                        <h3>Your Reservation</h3>
                        <form action="#">
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="date-input" id="date-in" readonly />
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input" id="date-out" readonly />
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