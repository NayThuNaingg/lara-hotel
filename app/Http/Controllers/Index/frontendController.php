<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\Room\RoomRepositoryInterface;

class frontendController extends Controller
{

    private $RoomRepository;
    public function __construct(
        RoomRepositoryInterface $RoomRepository,
       ) {
            $this->RoomRepository = $RoomRepository;
            DB::connection()->enableQueryLog();
        }
    public function index() {
        $rooms = $this->RoomRepository->roomRandomById();
        return view('frontend.index.indexForm',compact(['rooms']));
    }
}
