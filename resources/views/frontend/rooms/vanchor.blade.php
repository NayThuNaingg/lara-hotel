@extends('frontend.layouts.master')

@section('index')
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="col-md-12 d-flex align-items-center">
                        <div class="col-md-6"><span><h4 class="text-info w-">Invoice</h4></span></div>
                        <div class="col-md-6"><img src="{{ URL::asset('assets/logo/logo.png') }}" alt="Logo" style="width:150px; height:150px"></div>
                    </div>
                    <div class="col-md-12 d-flex align-items-center">
                        <div class="col-md-6">
                            <span><h6>Customer Name :</h6></span>
                            <span><h6>Customer Email :</h6></span>
                            <span><h6>Customer Phone :</h6></span>
                            <span><h6>Bookin Date :</h6></span>
                        </div>
                        <div class="col-md-6">
                            <span><h6>Hotel Name : {{ getSiteSetting() !== null ? getSiteSetting()->name : '' }}</h6></span>
                            <span><h6>Hotel Email : {{ getSiteSetting() !== null ? getSiteSetting()->email : '' }}</h6></span>
                            <span><h6>Hotel Phone : {{ getSiteSetting() !== null ? getSiteSetting()->outline_phone : '' }}</h6></span>
                            <span><h6>Hotel Address : {{ getSiteSetting() !== null ? getSiteSetting()->address : '' }}</h6></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow-sm p-3 mb-5 bg-white rounded">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Room Price</td>
                                    <td class="price" id="price"></td>
                                </tr>
                                <tr>
                                    <td>Extra Bed Price</td>
                                    <td class="extra_bed" id="extra_bed"></td>
                                </tr>
                                <tr>
                                    <td>Total Days</td>
                                    <td class="daysDifference" id="daysDifference"></td>
                                </tr>
                                <tr>
                                    <th>Total Price</th>
                                    <th class="total_price" id="total_price"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>Thank you for choosing our hotel; we look forward to serving you with exceptional hospitality!</p>
                </div>
            </div>
        </div>
    </section>
@endsection