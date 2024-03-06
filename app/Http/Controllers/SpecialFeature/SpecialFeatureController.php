<?php

namespace App\Http\Controllers\SpecialFeature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecialFeatureController extends Controller
{
    public function specialFeatureForm(){
        return view('backend.specialFeature.specialFeatureForm');
    }
    public function postSpecialFeature(){
        return "this is post special Feature";
    }
}
