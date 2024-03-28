@extends('backend.layouts.master')
@section('content')

<div class="page-heading">
    <h3>Hotel Setting</h3>
</div> 
<div class="page-content"> 
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form ">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Setting FORM</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    @if(isset($hotelSettings))
                        <form action="{{ route('updateRoom') }}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate />
                    @endif
                    @csrf
                        <div class="img-preview card-body">
                            <label for="input-file" id="drop-area">
                                <input type="file" accept="image/*" id="input-file" name="thumbnail" hidden required />
                                <div id="img-view">
                                    @if(isset($hotelSettings))
                                        <img src="{{ URL::asset('assets/logo/'. $hotelSettings->logo ) }}" style="width:100%; height:100%; overflow:hidden; border-radius:15px;padding:2px;"/>
                                        @else
                                        <img src="{{ URL::asset('assets/logo/room/roomDefault.png') }}" alt="" >
                                        @endif
                                        <p>{{ isset($hotelSettings) ? '' : 'Drag and Draw or Click here to Upload Image.' }}</p>
                                </div>
                                <div class="invalid-feedback">
                                    Please Upload Image.
                                </div>
                            </label>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name',(isset($hotelSettings))? $hotelSettings->name : '') }}" placeholder="Ex.1001" required>
                                <div class="invalid-feedback">
                                    Please fill Hotel Name.
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email',(isset($hotelSettings))? $hotelSettings->email : '') }}" placeholder="example@gmail.com" required>
                                <div class="invalid-feedback">
                                    Please fill Email.
                                </div>
                            </div>    
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                            <label for="checkin" class="form-label">CheckIn Time</label>
                            <input type="text" class="form-control" name="checkin" id="checkin" value="{{ old('checkin',(isset($hotelSettings))? $hotelSettings->checkin : '') }}"  required>
                             <div class="invalid-feedback">
                                    Please fill CheckIn Time.
                                </div>
                            </div>    

                            <div class="col-md-6">
                                <label for="checkout" class="form-label">CheckOut Time</label>
                                <input type="text" class="form-control" name="checkout" id="checkout" value="{{ old('checkout',(isset($hotelSettings))? $hotelSettings->checkout : '') }}"  required>
                                <div class="invalid-feedback">
                                    Please fill CheckOut Time.
                                </div>
                            </div>    
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                            <label for="online_phone" class="form-label">Online Phone</label>
                                <input type="number" class="form-control" name="online_phone" id="online_phone" value="{{ old('online_phone',(isset($hotelSettings))? $hotelSettings->online_phone : '') }}" placeholder="09-XXX-XXXX-XXX" required>
                                <div class="invalid-feedback">
                                    Please fill Online Phone Number.
                                </div>
                            </div>    

                            <div class="col-md-6">
                                <label for="outline_phone" class="form-label">Outline Phone</label>
                                <input type="number" class="form-control" name="outline_phone" id="outline_phone" value="{{ old('outline_phone',(isset($hotelSettings))? $hotelSettings->outline_phone : '') }}" placeholder="09-XXX-XXXX-XXX" required>
                                <div class="invalid-feedback">
                                    Please fill Outline Phone Number.
                                </div>
                            </div>    
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="occupancy" class="form-label">Occupancy <span>(Peoples)</span></label>
                                <input type="text" class="form-control" name="occupancy" id="occupancy" value="{{ old('occupancy',(isset($hotelSettings))? $hotelSettings->occupancy : '') }}" placeholder="Ex.4 (peoples)" required>
                                <div class="invalid-feedback">
                                    Please fill Occupancy.
                                </div>
                            </div> 
                            
                            <div class="col-md-6">
                                <label for="size_unit" class="form-label">Size Unit</label>
                                <input type="text" class="form-control" name="size_unit" id="size_unit" value="{{ old('size_unit',(isset($hotelSettings))? $hotelSettings->size_unit : '') }}" placeholder="Ex. ft" required>
                                <div class="invalid-feedback">
                                    Please fill Size Unit.
                                </div>
                            </div>    
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address" placeholder="Please Fill Hotel Address" id="address" rows="3" required />{{ old('address',(isset($hotelSettings))? $hotelSettings->address : '') }}</textarea>
                                <div class="invalid-feedback">
                                    Please fill Hotel Address.
                                </div>
                            </div>  
                        </div>


                          
                        <div class="col-md-12">
                        @if(isset($hotelSettings))
                            <input type="hidden" name="id" value="{{ $hotelSettings->id }}">
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

            form.classList.add('was-validated')
        }, false)
        })
    })
</script>
@endsection