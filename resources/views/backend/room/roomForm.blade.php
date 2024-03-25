@extends('backend.layouts.master')
@section('style')
<style>
    /* Red border for checkboxes with errors */
    .error-checkbox {
        border: 3px solid red !important;
    }

    /* Green border for checkboxes without errors */
    .success-checkbox {
        border: 3px solid green !important;
    }
</style>
@endsection
@section('content')

<div class="page-heading">
    <h3>ROOM</h3>
</div> 
<div class="page-content"> 
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form ">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ROOM FORM</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    @if(isset($rooms))
                        <form action="{{ route('updateRoom') }}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate />
                    @else
                        <form method="POST" action="{{route('postRoom')}}" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate />
                    @endif
                    @csrf
                        <div class="img-preview card-body">
                            <label for="input-file" id="drop-area">
                                <input type="file" accept="image/*" id="input-file" name="thumbnail" hidden required />
                                <div id="img-view">
                                    @if(isset($editData))
                                        <img src="{{ URL::asset('assets/upload/'. $editData->id . '/thumb/'. $editData->thumbnail ) }}?" alt="Existing Room Image" style="width:100%;" id="upload-img">
                                        @else
                                        <img src="{{ URL::asset('assets/logo/room/roomDefault.png') }}" alt="" >
                                        @endif
                                    <p>Drag and Draw or Click here</br> to Upload Image.</p>
                                </div>
                                <div class="invalid-feedback">
                                    Please Upload Image.
                                </div>
                            </label>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Room No</label>
                                <input type="number" class="form-control" name="name" id="name" value="{{ old('name',(isset($rooms))? $rooms->name : '') }}" placeholder="Ex.1001" required>
                                <div class="invalid-feedback">
                                    Please fill Room Name.
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="size" class="form-label">Room Size</label>
                                <input type="number" class="form-control" name="size" id="size" value="{{ old('size',(isset($rooms))? $rooms->size : '') }}" placeholder="Ex.15(ft)" required>
                                <div class="invalid-feedback">
                                    Please fill Room Size.
                                </div>
                            </div>    
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="view" class="form-label">Choose View</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="view" name="view_id" required>
                                        <option value="">- Choose View -</option>
                                        @if($views)
                                            @foreach($views as $view)
                                                <option value="{{$view->id}}" {{ (old('view_id', isset($rooms) ? $rooms->view_id : '') == $view->id) ? 'selected' : '' }}>{{$view->name}}</option>
                                            @endforeach
                                        @else
                                            <option value="">View Data Empty</option>
                                        @endif
                                    </select>
                                </fieldset>
                                <div class="invalid-feedback">
                                    Please Choose View.
                                </div>
                            </div>    

                            <div class="col-md-6">
                                <label for="bed" class="form-label">Choose Bed</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="bed" name="bed_id" required>
                                        <option value="">- Choose Bed -</option>
                                        @if($beds)
                                            @foreach($beds as $bed)
                                                <option value="{{$bed->id}}" {{ (old('bed_id', isset($rooms) ? $rooms->bed_id : '') == $bed->id) ? 'selected' : '' }}>{{$bed->name}}</option>
                                            @endforeach
                                        @else
                                            <option>Bed Data Empty</option>
                                        @endif
                                    </select>
                                </fieldset>
                                <div class="invalid-feedback">
                                    Please Choose Bed.
                                </div>
                            </div>    
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                            <label for="price_per_day" class="form-label">Price Per Day <span>($)</span></label>
                                <input type="number" class="form-control" name="price_per_day" id="price_per_day" value="{{ old('price_per_day',(isset($rooms))? $rooms->price_per_day : '') }}" placeholder="Ex.30$" required>
                                <div class="invalid-feedback">
                                    Please fill Price Per Day.
                                </div>
                            </div>    

                            <div class="col-md-6">
                                <label for="extra_bed_price" class="form-label">Extra Bed Price <span>($)</span></label>
                                <input type="number" class="form-control" name="extra_bed_price" id="extra_bed_price" value="{{ old('extra_bed_price',(isset($rooms))? $rooms->extra_bed_price : '') }}" placeholder="Ex.3$" required>
                                <div class="invalid-feedback">
                                    Please fill Exter Bed Price.
                                </div>
                            </div>    
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="occupancy" class="form-label">Occupancy <span>(Peoples)</span></label>
                                <input type="number" class="form-control" name="occupancy" id="occupancy" value="{{ old('occupancy',(isset($rooms))? $rooms->occupancy : '') }}" placeholder="Ex.4 (peoples)" required>
                                <div class="invalid-feedback">
                                    Please fill Occupancy.
                                </div>
                            </div>    
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6 col-sm-3">
                                <label for="amenity" class="form-label">Select Amenity</label>
                            </div>
                            <div class="row mx-5">
                                @if($amenities->isNotEmpty())
                                    @foreach($amenities as $amenity)
                                    <div class="col-md-6 col-sm-12">
                                        <label class="form-check-label" for="amenity{{$amenity->id}}">
                                            <input name="amenity[]" class="form-check-input" type="checkbox" value="{{ $amenity->id }}" id="amenity{{$amenity->id}}"  />  {{$amenity->name}}
                                        </label>
                                        </div>
                                    @endforeach
                                @else
                                    <label class="form-check-label" for="amenity">
                                        Amenities Empty
                                    </label>
                                @endif
                                <div class="invalid-feedback amenity-label-error hide"  id="room-amenity-error">
                                <span class="amenity-error-msg" style="color:red;"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6 col-sm-3">
                                <label for="specialFeature" class="form-label">Select SpecialFeature</label>
                            </div>
                            <div class="row mx-5" >
                                @if($specialFeatures->isNotEmpty())
                                    @foreach($specialFeatures as $specialFeature)
                                    <div class="col-md-6 col-sm-12">
                                        <label class="form-check-label" for="specialFeature{{$specialFeature->id}}">
                                            <input name="specialFeature[]" class="form-check-input color-default" type="checkbox" value="{{ $specialFeature->id }}" id="specialFeature{{$specialFeature->id}}"  />  {{$specialFeature->name}}
                                        </label>
                                    </div>
                                    @endforeach
                                @else
                                    <label class="form-check-label feature-label-error hide"   id="feature-name-error"for="amenity">
                                        SpecialFeature Empty
                                    </label>
                                @endif
                                <div class="invalid-feedback feature-label-error hide"  id="feature-name-error" >
                                <span class="feature-error-msg" style="color:red;"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                                <label for="description" class="form-label">Room Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Please Fill Room Description" required >{{ old('description',(isset($rooms))? $rooms->description : '') }}</textarea>
                            <div class="invalid-feedback">
                                Please fill Room Description.
                            </div>
                        </div>    

                        <div class="col-md-6">
                            <label for="detail" class="form-label">Room Detail</label>
                            <textarea class="form-control" name="detail" placeholder="Please Fill Room Detail" id="detail" rows="3" required />{{ old('detail',(isset($rooms))? $rooms->detail : '') }}</textarea>
                            <div class="invalid-feedback">
                                Please fill Room Detail.
                            </div>
                        </div>    
                        <div class="col-md-12">
                        @if(isset($rooms))
                            <input type="hidden" name="id" value="{{ $rooms->id }}">
                        @endif
                            <button class="btn btn-primary me-1 mb-1" type="submit">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1"> Reset</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
  <!-- // Basic multiple Column Form section end -->
</div>
@endsection
@section('script')

</style>
<script>
    (function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }
        
            // Function to check if at least one option is selected and update checkbox border
            function checkSelection(itemsSelector, errorLabelSelector, errorMsg) {
                var count = $(itemsSelector + ':checked').length;
                var checkboxes = $(itemsSelector);

                if (count === 0) {
                    $(errorLabelSelector).show().text(errorMsg);
                    checkboxes.addClass('error-checkbox').removeClass('success-checkbox');
                } else {
                    $(errorLabelSelector).hide();
                    checkboxes.removeClass('error-checkbox').addClass('success-checkbox');
                }
            }

            // Check initial selection
            checkSelection('input[name="amenity[]"]', '.amenity-label-error', 'Please select at least one Room Amenity.');
            checkSelection('input[name="specialFeature[]"]', '.feature-label-error', 'Please select at least one Special Feature.');

            // jQuery onchange functions
            $('input[name="amenity[]"]').on('change', function() {
                checkSelection('input[name="amenity[]"]', '.amenity-label-error', 'Please select at least one Room Amenity.');
            });

            $('input[name="specialFeature[]"]').on('change', function() {
                checkSelection('input[name="specialFeature[]"]', '.feature-label-error', 'Please select at least one Special Feature.');
            });

            form.classList.add('was-validated')
        }, false)
        })
    })()
</script>
@endsection