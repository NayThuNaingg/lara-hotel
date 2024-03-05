<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class AuthLoginController extends Controller
{
    public function loginForm()
    {

        if(Auth::guard('Admin')->check()) {
            // return redirect()->route('index');
            return "this is index page";
        } else {
            return view('login.loginForm');
            // return "this is backend";
        }

    }

    public function postLogin(LoginRequest $request)
    {
        $loginField = $request->get('login');
        $password = $request->get('password');

        // Attempt to log in using username
        $usernameCredentials = [
            'name' => $loginField,
            'password' => $password,
        ];

        // Attempt to log in using email
        $emailCredentials = [
            'email' => $loginField,
            'password' => $password,
        ];

        // Check if either login attempt is successful
        $validation = Auth::guard('Admin')->attempt($usernameCredentials) || Auth::guard('Admin')->attempt($emailCredentials);

        if ($validation) {
            // return redirect()->route('index')->with('success', 'Login successful.');
            return "this is index page";
        } else {
            return redirect()->route('loginForm')
                ->withErrors(['login' => 'Invalid username or password.'])
                ->withInput();
        }
    }
    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect('admin-backend/login');
    }
}
