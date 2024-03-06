<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function viewForm()
    {
        return view('backend.view.viewForm');
    }
    public function postView()
    {
        return "this is post View";
    }
}
