@extends('backend.layouts.master')
@section('content')
<section class="section vh-100">
    <div class="row mb-2">
        <div class="">
        <a href="{{ route('listingRoom')}}" class="btn icon btn-light">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ URL::asset('assets/upload/' . $room->id . '/thumb/' . $room->thumbnail) }}" class="rounded-3 " alt="Thumbnail" style="width:100%;height:300px">
                            @if(isset($roomGalleries) && count($roomGalleries) >0 && !isset($roomGallery) )
                                <div class="row mt-2">
                                    @foreach ($roomGalleries as $roomGallery)
                                    <div class="col-md-3">
                                        <img src="{{ isset($roomGallery) ? URL::asset('assets/upload') .'/'. $id .'/'. $roomGallery->image : '' }}" class="rounded-3" alt="" style="width:100%;height:100%;">
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="mt-5 d-flex">
                                <span class="h5">Room No -  </span>
                                <p class=" mx-1 bg-primary badge p-2"> {{ $room->name }}</p>
                            </div>
                            <div class="mt-1 d-flex">
                                <span class="h5">Room View -  </span>
                                <p class="text-muted mx-1"> {{ $room->getView->name }}</p>
                            </div>
                            <div class="mt-1 d-flex">
                                <span class="h5">Room Bed -  </span>
                                <p class="text-muted mx-1"> {{ $room->getBed->name }}</p>
                            </div>
                            <div class="mt-3">
                            <h3>Room Detail</h3>
                                <p class="text-muted">{{$room->detail}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>Amenities</h3>
                                    @foreach($amenityByroomId as $amenity)
                                        <div class="mt-1"><i class="fa-brands fa-intercom mx-1"></i>{{ $amenity->name }}</div>
                                    @endforeach
                                </div>
                                <div class="col-md-5">
                                    <h6>Price - {{$room->price_per_day}}{{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}</h3>
                                    <h6>ExtraBed - {{$room->extra_bed_price}}{{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}</h3>
                                    <h6>Occupancy - {{$room->occupancy}}{{ getSiteSetting() !== null ? getSiteSetting()->occupancy : '' }}</h5>
                                    <h6>Size - {{$room->size}}{{ getSiteSetting() !== null ? getSiteSetting()->size_unit : '' }}</h5>

                                </div>
                            </div>
                            <div class="row mt-5">
                                <h3>Special Feature</h3> 
                                @foreach($specialFeatureByRoomId as $specialFeature)
                                <div class="mt-1"><i class="fa-solid fa-ship mx-1"></i>{{$specialFeature->name }}</div>
                                @endforeach
                            </div>
                            <div class="row mt-5">
                                <h3>Description</h3>
                                <p class="text-muted">{{$room->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
