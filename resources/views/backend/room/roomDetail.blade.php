@extends('backend.layouts.master')
@section('content')
<section class="section vh-100">
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
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h3>Amenities</h3>
                                @foreach($amenityByroomId as $amenity)
                                    <li>{{ $amenity->name }}</li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h3>Special Feature</h3>
                                <ul>
                                    @foreach($specialFeatureByRoomId as $specialFeature)
                                        <li>{{$specialFeature->name }}</li>
                                    @endforeach
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
