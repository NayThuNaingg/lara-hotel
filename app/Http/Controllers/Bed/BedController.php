<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class BedController extends Controller
{
    public function bedForm()
    {
        return view('backend.bed.bedForm');
    }

    public function postBed()
    {
        return "this is post Bed";
    }
}
