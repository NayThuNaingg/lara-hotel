@extends('backend.layouts.master')
@section('title','Admin::View Page')
@section('content')
    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div> 
    <div class="page-content vh-100"> 
        <!-- Basic Tables start -->
        <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Minimal jQuery Datatable
                </h5>
            </div>
            <div class="card-body">
                <div class=" datatable-minimal">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                                <th>Updated at</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($views as $view)
                                    <tr>
                                        <td>{{$view->id}}</td>
                                        <td>{{$view->name}}</td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                        <td>{{$view->updated_at}}</td>
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
