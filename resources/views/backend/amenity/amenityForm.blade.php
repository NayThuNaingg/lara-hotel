@extends('backend.layouts.master')
@section('title','Admin::View Page')
@section('content')

<div class="page-heading">
    <h3>AMENITY SCREEN</h3>
</div> 
<div class="page-content vh-100"> 
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form ">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">AMENITY FORM</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    @if(isset($amenities))
                    <form method="POST" action="{{route('updateAmenity')}}" class="row g-3 needs-validation" novalidate />
                    @else
                    <form method="POST" action="{{route('postAmenity')}}" class="row g-3 needs-validation" novalidate />
                    @endif
                    @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">Amenity Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($amenities) ? $amenities->name : '' }}" placeholder="Ex.Spa and Wellness" required>
                            <div class="invalid-feedback">
                                Please fill Amenity Name.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Amenity Type</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="amenity" name="type" required>
                                    <option value="" {{ $amenityTypes == '' ? 'selected' : '' }}>- Choose Amenity Type -</option>
                                    @foreach ($amenityTypes as $key => $value)
                                        @if(isset($amenities))
                                        <option name="type" value="{{ $key }}" {{ $key == $amenities->type ? 'selected' : '' }}>
                                            {{ $value }}</option>
                                        @else
                                        <option name="type" value="{{ $key }}" {{ old('type', $amenities->type ?? '') == $key ? 'selected' : '' }} >
                                            {{ $value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </fieldset>
                            <div class="invalid-feedback">
                                Please choose Amenity Type.
                            </div>
                        </div>   
                        <div class="col-12">
                            @if(isset($amenities))
                            <input type="hidden" name="id" value="{{$amenities->id}}">
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