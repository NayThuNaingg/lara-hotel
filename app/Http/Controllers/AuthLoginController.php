<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthLoginController extends Controller
{
    public function loginForm(){
        return view('login.loginForm');
    }
}
