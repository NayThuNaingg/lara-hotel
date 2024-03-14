@extends('backend.layouts.master')
@section('title','Admin::Bed Page')
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
                    @if(isset($beds))
                        <form action="{{ route('bedUpdate') }}" method="POST" class="row g-3 needs-validation" novalidate />
                    @else
                        <form method="POST" action="{{route('postBed')}}" class="row g-3 needs-validation" novalidate />
                    @endif
                    @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">Bed Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name',(isset($beds))? $beds->name : '') }}" placeholder="Ex.Serenity Suite" required>
                            <div class="invalid-feedback">
                                Please fill Bed Name.
                            </div>
                        </div>      
                        <div class="col-md-12">
                        @if(isset($beds))
                            <input type="hidden" name="id" value="{{ $beds->id }}">
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