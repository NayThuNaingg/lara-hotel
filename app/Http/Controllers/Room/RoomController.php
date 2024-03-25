<?php

namespace App\Http\Controllers\Room;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Bed\BedRepositoryInterface;
use App\Repository\Room\RoomRepositoryInterface;
use App\Repository\View\ViewRepositoryInterface;
use App\Repository\Amenity\AmenityRepositoryInterface;
use App\Repository\roomGallery\roomGalleryRepositoryInterface;
use App\Repository\SpecialFeature\SpecialFeatureRepositoryInterface;

class RoomController extends Controller
{
    protected $roomRepository;
    protected $bedRepository;
    protected $viewRepository;
    protected $amenityRepository;
    protected $specialFeatureRepository;
    protected $roomGalleryRepository;
    public function __construct(
        RoomRepositoryInterface $roomRepository,
        BedRepositoryInterface $bedRepository,
        ViewRepositoryInterface $viewRepository,
        AmenityRepositoryInterface $amenityRepository,
        SpecialFeatureRepositoryInterface $specialFeatureRepository,
        roomGalleryRepositoryInterface $roomGalleryRepository
    ) {
        $this->roomRepository = $roomRepository;
        $this->bedRepository = $bedRepository;
        $this->viewRepository = $viewRepository;
        $this->amenityRepository = $amenityRepository;
        $this->specialFeatureRepository = $specialFeatureRepository;
        $this->roomGalleryRepository = $roomGalleryRepository;
    }
    public function formRoom()
    {
        $beds = $this->bedRepository->listingBed();
        $views = $this->viewRepository->listingView();
        $amenities = $this->amenityRepository->listingAmenity();
        $specialFeatures = $this->specialFeatureRepository->listingSpecialFeature();
        return view('backend.room.roomForm', compact(['beds','views','amenities','specialFeatures']));
    }

    public function postRoom(Request $request)
    {
        try {
            $result = $this->roomRepository->postRoom($request->all());
            $logs = "Room sreen create::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                $insertRoomId = $result['insertedRoomId'];
                return redirect('admin-backend/room/room-gallery/'.$insertRoomId)->with('success_msg', 'Create Data successful.');
            } else {
                return redirect()->route('RoomForm')->with('error', 'Something wrong.');
            }
        } catch(\Exception $e) {
            $logs = "Room sreen create::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function formRoomGallery($id)
    {
        $roomGalleries = $this->roomGalleryRepository->getRoomGalleryById($id);
        return view('backend.room.roomGallery', compact(['roomGalleries','id']));
    }

    public function postRoomGallery(Request $request)
    {
        try {
            $result = $this->roomGalleryRepository->postRoomGallery($request->all());
            $logs   = "Room Room Gallery Create::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return back()->with('success_msg', 'Create Data successful.');
            } else {
                return back()->with('error_msg', 'Create Data successful.');
            }
        } catch(\Exception $e) {
            $logs = "Room Gallery::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function listingRoom()
    {
        try {
            $rooms = $this->roomRepository->listingRoom();
            $logs = "Room screen Listing::";
            Utility::saveDebugLog($logs);
            return view('backend.Room.roomListing', compact(['rooms']));
        } catch(\Exception $e) {
            $logs = "Room screen Listing::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}
