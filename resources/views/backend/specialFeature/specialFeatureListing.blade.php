@extends('backend.layouts.master')
@section('title','Admin::View Page')
@section('content')
    <div class="page-heading">
        <h3>SPECIALFEATURE SCREEN</h3>
    </div> 
    <div class="page-content vh-100"> 
        <!-- Basic Tables start -->
        <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    SPECIALFEATURE LISTING
                </h5>
            </div>
            <div class="card-body">
                <div class=" datatable-minimal">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>SpecialFeature Name</th>
                                <th>Actions</th>
                                <th>Updated at</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($SpecialFeatures as $SpecialFeature)
                                    <tr>
                                        <td>{{$SpecialFeature->id}}</td>
                                        <td>{{$SpecialFeature->name}}</td>
                                        <td>
                                            <a href="{{ URL::asset('admin-backend/special-feature/edit')}}/{{ $SpecialFeature->id }}" class="btn icon btn-light"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ URL::asset('admin-backend/special-feature/delete')}}/{{ $SpecialFeature->id }}" class="btn icon btn-light"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                        <td>{{$SpecialFeature->updated_at}}</td>
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
