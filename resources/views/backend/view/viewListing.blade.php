@extends('backend.layouts.master')
@section('content')
    <div class="page-heading">
        <h3>VIEW SCREEN</h3>
    </div> 
    <div class="page-content vh-100"> 
        <!-- Basic Tables start -->
        <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    VIEW LISTING
                </h5>
            </div>
            <div class="card-body">
                <div class=" datatable-minimal">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>VIEW Name</th>
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
                                            <a href="{{ URL::asset('admin-backend/view/edit')}}/{{ $view->id }}" class="btn icon btn-light"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ URL::asset('admin-backend/view/delete')}}/{{ $view->id }}" class="btn icon btn-light"><i class="fa-solid fa-trash"></i></a>
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
