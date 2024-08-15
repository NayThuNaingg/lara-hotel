<?php

namespace App\Http\Controllers\Index;

use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repository\Bed\BedRepositoryInterface;
use App\Repository\Room\RoomRepositoryInterface;
use App\Repository\View\ViewRepositoryInterface;
use App\Repository\Amenity\AmenityRepositoryInterface;
use App\Repository\roomGallery\roomGalleryRepositoryInterface;
use App\Repository\SpecialFeature\SpecialFeatureRepositoryInterface;

class frontendController extends Controller
{
    private $roomRepository;
    private $bedRepository;
    private $viewRepository;
    private $roomGalleryRepository;
    private $specialFeatureRepository;
    private $amenityRepository;
    public function __construct(
        RoomRepositoryInterface $roomRepository,
        BedRepositoryInterface $bedRepository,
        ViewRepositoryInterface $viewRepository,
        AmenityRepositoryInterface $amenityRepository,
        SpecialFeatureRepositoryInterface $specialFeatureRepository,
        roomGalleryRepositoryInterface $roomGalleryRepository
    ) {
        $this->roomRepository           = $roomRepository;
        $this->bedRepository            = $bedRepository;
        $this->viewRepository           = $viewRepository;
        $this->amenityRepository        = $amenityRepository;
        $this->specialFeatureRepository = $specialFeatureRepository;
        $this->roomGalleryRepository    = $roomGalleryRepository;
        DB::connection()->enableQueryLog();
    }
    public function index()
    {
        $rooms = $this->roomRepository->roomRandomById();
        return view('frontend.index.indexForm', compact(['rooms']));
    }

    public function detailRooms($id)
    {
        {
            try {
                $room                   = $this->roomRepository->editRoom($id);
                $roomBed                = $this->bedRepository->listingBed();
                $roomView               = $this->viewRepository->listingView();
                $roomGalleries          = $this->roomGalleryRepository->getRoomGalleryById($id);
                $roomAmenity            = $this->amenityRepository->listingAmenity();
                $roomSpecialFeature     = $this->specialFeatureRepository->listingSpecialFeature();
                $specialFeatureByRoomId = $this->roomRepository->roomSpecialFeatureByroomId($id);
                $amenityByroomId        = $this->roomRepository->roomAmenityByroomId($id);
                if($room == null) {
                    abort(404);
                }
                return view('frontend.rooms.roomDetail', compact(['room','roomBed','roomView','roomAmenity','roomSpecialFeature','amenityByroomId','specialFeatureByRoomId','roomGalleries','id']));
            } catch(\Exception $e) {
                $logs = "Room Detail::";
                $logs = $e->getMessage();
                Utility::saveErrorLog($logs);
                abort(500);
            }

        }
    }

    public function roomReserve($id)
    {
        try {
            $room = $this->roomRepository->editRoom($id);
            return view('frontend.rooms.roomReservation', compact(['room']));
        } catch(\Exception $e) {
            $logs = "Room Reservation::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }

    }
    public function CustomerRegister(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('customer')->attempt($credentials)) {
                // Authentication passed...
                return redirect()->intended('dashboard');
            } else {

            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        } catch(\Exception $e) {
            $logs = "Customer check ::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }

    }
}
