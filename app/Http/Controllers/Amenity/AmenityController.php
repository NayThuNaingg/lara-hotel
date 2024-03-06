<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    public function amenityForm(){
        return view('backend.amenity.amenityForm');
    }
    public function postAmenity(){

        return "this is post Amenity";
    }
}
