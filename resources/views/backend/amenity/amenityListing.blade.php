@extends('backend.layouts.master')
@section('title','Admin::View Page')
@section('content')
    <div class="page-heading">
        <h3>AMENITY SCREEN</h3>
    </div> 
    <div class="page-content vh-100"> 
        <!-- Basic Tables start -->
        <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    AMENITY LISTING
                </h5>
            </div>
            <div class="card-body">
                <div class=" datatable-minimal">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Amenity Name</th>
                                <th>Amenity Type</th>
                                <th>Actions</th>
                                <th>Updated at</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($amenities as $amenity)
                                    <tr>
                                        <td>{{$amenity->id}}</td>
                                        <td>{{$amenity->name}}</td>
                                        <td>
                                            @if($amenity->type == 0)
                                            Basic Amenities
                                            @elseif ($amenity->type == 1)
                                            Tech-Savvy Amenities
                                            @elseif ($amenity->type == 2)
                                            Wellness Amenities
                                            @else
                                            Luxury Amenities
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ URL::asset('admin-backend/amenity/edit')}}/{{ $amenity->id }}" class="btn icon btn-light"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ URL::asset('admin-backend/amenity/delete')}}/{{ $amenity->id }}" class="btn icon btn-light"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                        <td>{{$amenity->updated_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
