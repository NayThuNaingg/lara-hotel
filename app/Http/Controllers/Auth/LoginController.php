<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest\LoginRequest;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    use AuthenticatesUsers;
    protected $guard = 'Admin';
    protected $redirectAfterlogout = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function loginForm()
    {

        if(Auth::guard('Admin')->check()) {
            return redirect()->route('index');
        } else {
            return view('backend.login.loginForm');
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
            return redirect()->route('index')->with('success_login', 'Login successful.');
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
