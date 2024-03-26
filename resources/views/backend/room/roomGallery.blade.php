@extends('backend.layouts.master')
@section('content')
<section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Our Gallery</h5>
                    </div>
                    <div class="card-body">
                        <div class="row gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_content">
                                        @if(isset($roomGalleries) && count($roomGalleries) >0 && !isset($roomGallery) )
                                        <div class="row">
                                            @foreach ($roomGalleries as $roomGallery)
                                            <div class="col-md-3">
                                                <div class="img-wrapper">
                                                    <img src="{{ isset($roomGallery) ? URL::asset('assets/upload') .'/'. $id .'/'. $roomGallery->image : '' }}" alt="" style="width:100%;height:100%;">
                                                </div>
                                                <div class="btn-wrapper">
                                                    <a href="{{ URL::to('admin-backend/room/room-gallery/edit') }}/{{ $roomGallery->id }}" class="btn icon btn-light"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ URL::to('admin-backend/room/room-gallery/delete') }}/{{ $roomGallery->id }}"  onclick="return confirm('Are you sure you want to delete this image?');" class="btn icon btn-light"><i class="fa-solid fa-trash"></i></a>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                        </div>
                                        <div style="height:20px;"></div>
                                        @if(isset($roomGalleries))
                                        <form action="{{ route('postRoomGallery') }}" method="POST" id="form-create" enctype="multipart/form-data" >
                                        @else
                                        <form action="{{ route('updateRoomGallery') }}" method="POST" id="form-create" enctype="multipart/form-data" >
                                            <input type="hidden" name="id" value={{ $gallery->id }}>
                                        @endif
                                            @csrf
                                            <span class="section">Room Gallery</span>
                                            <div class="field item form-group">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="img-preview card-body">
                                                        <label for="input-file" id="drop-area">
                                                            <input type="file" accept="image/*" id="input-file" name="image" hidden required />
                                                            <div id="img-view">
                                                                @if(isset($roomGalleries))
                                                                    <img src="{{ URL::asset('assets/logo/room/roomDefault.png') }}?" alt="Existing Room Image" id="upload-img">
                                                                    @else
                                                                    <img src="{{ URL::asset('assets/upload/'. $gallery->room_id . '/'. $gallery->image ) }}?" alt="Existing Room Image" style="width:100%;height:100%; overflow:hidden; border-radius:15px;padding:2px;" id="upload-img">
                                                                    @endif
                                                                    <p>{{ isset($roomGalleries) ? 'Drag and Draw or Click here to Upload Image.' : '' }}</p>
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Please Upload Image.
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="form-group">
                                                    <div class="col-md-6 offset-md-3">
                                                        <button type='submit' class="btn btn-primary" id="submit-btn">Upload</button>
                                                        <button type='reset' class="btn btn-success" id="reset">Reset</button>
                                                        @if(isset($roomGalleries))
                                                        <input type="hidden" name="id" value="{{ $id }}">
                                                        @else
                                                        <input type="hidden" name="room_id" value={{ $gallery->room_id }}>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection