@extends('backend.layouts.master')
@section('title','Admin::View Page')
@section('content')

<div class="page-heading">
    <h3>Profile Statistics</h3>
</div> 
<div class="page-content vh-100"> 
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form ">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Multiple Column</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    @if(isset($views))
                        <form action="{{ route('updateView') }}" method="POST" class="row g-3 needs-validation" novalidate />
                    @else
                        <form method="POST" action="{{route('postView')}}" class="row g-3 needs-validation" novalidate />
                    @endif
                    @csrf

                    <div class="row gallery justify-content-center" data-bs-toggle="modal" data-bs-target="#galleryModal">
                            <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                <a href="#">
                                    <img class="w-100 active rounded-3" src="https://images.unsplash.com/photo-1633008808000-ce86bff6c1ed?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyN3x8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                </a>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Room Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name',(isset($views))? $views->name : '') }}" placeholder="Ex.Sea View" required>
                                <div class="invalid-feedback">
                                    Please fill Room Name.
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="size" class="form-label">Room Size</label>
                                <input type="text" class="form-control" name="size" id="size" value="{{ old('size',(isset($views))? $views->name : '') }}" placeholder="Ex.10(ft)" required>
                                <div class="invalid-feedback">
                                    Please fill Room Size.
                                </div>
                            </div>    
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="view" class="form-label">Choose View</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="view" required />
                                        <option value="">- Choose View -</option>
                                        <option>IT</option>
                                        <option>Blade Runner</option>
                                        <option>Thor Ragnarok</option>
                                    </select>
                                </fieldset>
                                <div class="invalid-feedback">
                                    Please Choose View.
                                </div>
                            </div>    

                            <div class="col-md-6">
                                <label for="bed" class="form-label">Choose Bed</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="bed" required /> 
                                        <option value="">- Choose Bed -</option>
                                        <option>IT</option>
                                        <option>Blade Runner</option>
                                        <option>Thor Ragnarok</option>
                                    </select>
                                </fieldset>
                                <div class="invalid-feedback">
                                    Please Choose Bed.
                                </div>
                            </div>    
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                            <label for="price_per_day" class="form-label">Price Per Day <span>($)</span></label>
                                <input type="number" class="form-control" name="price_per_day" id="price_per_day" value="{{ old('price_per_day',(isset($views))? $views->price_per_day : '') }}" placeholder="Ex.30$" required>
                                <div class="invalid-feedback">
                                    Please fill Price Per Day.
                                </div>
                            </div>    

                            <div class="col-md-6">
                                <label for="extra_bed_price" class="form-label">Extra Bed Price <span>($)</span></label>
                                <input type="number" class="form-control" name="extra_bed_price" id="extra_bed_price" value="{{ old('extra_bed_price',(isset($views))? $views->extra_bed_price : '') }}" placeholder="Ex.3$" required>
                                <div class="invalid-feedback">
                                    Please fill Exter Bed Price.
                                </div>
                            </div>    
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="occupancy" class="form-label">Occupancy <span>(Peoples)</span></label>
                                <input type="number" class="form-control" name="occupancy" id="occupancy" value="{{ old('occupancy',(isset($views))? $views->occupancy : '') }}" placeholder="Ex.4 (peoples)" required>
                                <div class="invalid-feedback">
                                    Please fill Occupancy.
                                </div>
                            </div>    
                        </div>

                        <div class="mt-4 d-flex">
                            <div class="">
                                <div class="col-md-12">
                                    <label for="amenity" class="form-label">Select Amenity</label>
                                </div>
                            </div>
                            <div class="row mx-5">
                                <div class="col-md-12">
                                    <input class="form-check-input" type="checkbox" value="" id="amenity" required>
                                    <label class="form-check-label" for="amenity">
                                        Home theater system
                                    </label>
                                    <div class="invalid-feedback">
                                        Please Select at least One Amenity.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 d-flex">
                            <div class="">
                                <div class="col-md-12">
                                    <label for="special_feature" class="form-label">Select Special Feature</label>
                                </div>
                            </div>
                            <div class="row mx-5">
                                <div class="col-md-12">
                                <input class="form-check-input" type="checkbox" value="" id="amenity" required>
                                    <label class="form-check-label" for="amenity">
                                    Nespresso machine data
                                    </label>
                                    <div class="invalid-feedback">
                                        Please Select at least One Special Feature.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Room Description</label>
                                <textarea class="form-control" id="description" rows="3" required /></textarea>
                            </div>
                            <div class="invalid-feedback">
                                Please fill Room Description.
                            </div>
                        </div>    

                        <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="detail" class="form-label">Room Detail</label>
                            <textarea class="form-control" id="detail" rows="3" required /></textarea>
                        </div>
                            <div class="invalid-feedback">
                                Please fill Room Detail.
                            </div>
                        </div>    
                        <div class="col-md-12">
                        @if(isset($views))
                            <input type="hidden" name="id" value="{{ $views->id }}">
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

            form.classList.add('was-validated')
        }, false)
        })
    })()
</script>
@endsection