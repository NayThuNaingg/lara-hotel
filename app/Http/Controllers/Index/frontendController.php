<?php

namespace App\Http\Controllers\Index;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Reservation\reservationRequest;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Repository\Bed\BedRepositoryInterface;
use App\Repository\Room\RoomRepositoryInterface;
use App\Repository\View\ViewRepositoryInterface;
use App\Repository\Amenity\AmenityRepositoryInterface;
use App\Repository\Reservation\ReservationRepository;
use App\Repository\Reservation\ReservationRepositoryInterface;
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
    private $reservationRepository;
    public function __construct(
        RoomRepositoryInterface $roomRepository,
        BedRepositoryInterface $bedRepository,
        ViewRepositoryInterface $viewRepository,
        AmenityRepositoryInterface $amenityRepository,
        SpecialFeatureRepositoryInterface $specialFeatureRepository,
        roomGalleryRepositoryInterface $roomGalleryRepository,
        ReservationRepositoryInterface $reservationRepository
    ) {
        $this->roomRepository           = $roomRepository;
        $this->bedRepository            = $bedRepository;
        $this->viewRepository           = $viewRepository;
        $this->amenityRepository        = $amenityRepository;
        $this->specialFeatureRepository = $specialFeatureRepository;
        $this->roomGalleryRepository    = $roomGalleryRepository;
        $this->reservationRepository    = $reservationRepository;
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

    public function postRoomReserved(reservationRequest $request)
    {
        try {
            $result = $this->reservationRepository->postReserve($request->all());
            $logs   = "Room Reserve Create::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                // Assuming $result['reservation_id'] holds the ID of the reservation
                return redirect()->route('vanchor', ['id' => $result['reservation_id']])
                                 ->with('success_msg', 'Reservation successful! Please wait for contact from the administrator');
            } else {
                return back()->with('error_msg', 'Reservation failed. Please choose another date or room.');
            }
        } catch(\Exception $e) {
            $logs = "Room Reserve::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function rooms()
    {
        try {
            $rooms = $this->roomRepository->listingRoom();
            return view('frontend.rooms.rooms', compact(['rooms']));
        } catch(\Exception $e) {
            $logs = "Room Listing ::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }

    }

    public function vanchor($id)
    {
        $room  = $this->roomRepository->editRoom($id);
        return view('frontend.rooms.vanchor');
    }
}
