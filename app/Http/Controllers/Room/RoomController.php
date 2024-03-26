<?php

namespace App\Http\Controllers\Room;

use App\Utility;
use App\ReturnMessage;
use App\Models\RoomGallery;
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


    public function editRoom($id)
    {
        $rooms            = $this->roomRepository->editRoom($id);
        $beds             = $this->bedRepository->listingBed();
        $views            = $this->viewRepository->listingView();
        $amenities        = $this->amenityRepository->listingAmenity();
        $specialFeatures  = $this->specialFeatureRepository->listingSpecialFeature();
        $specialFeatureByRoomId = $this->specialFeatureRepository->getspecialFeatureByroomId($id);
        $amenityByRoomId = $this->amenityRepository->getAmenityByroomId($id);
        if($rooms == null) {
            abort(404);
        }
        return view('backend.Room.roomForm', compact(['rooms','beds','views','amenities','specialFeatures','amenityByRoomId','specialFeatureByRoomId']));
    }

    public function updateRoom(Request $request)
    {
        try {
            $result = $this->roomRepository->updateRoom($request->all());
            $logs   = "Room sreen Update::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->route('listingRoom')->with('success_msg', 'Update Data successful.');
            } else {
                return redirect()->route('listingRoom')->with('error_msg', 'Update Data successful.');
            }
        } catch(\Exception $e) {
            $logs = "Room sreen Update::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function editRoomGallery($id)
    {
        $find_id = RoomGallery::find($id);
        if(!isset($find_id)) {
            abort(404);
        }
        $gallery = $this->roomGalleryRepository->editRoomGallery($id);
        return view('backend.room.roomGallery', compact(['gallery']));
    }

    public function deleteRoomGallery($id)
    {
        try {
            $result = $this->roomGalleryRepository->deleteRoomGallery($id);
            $logs   = "Room Gallery sreen delete::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return back()->with('success_msg', 'Delete Data successful.');
            } else {
                return back()->with('error_msg', 'Update Data successful.');

            }
        } catch(\Exception $e) {
            $logs = "Room sreen delete::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function deleteRoom($id)
    {
        try {
            $result = $this->roomRepository->deleteRoom($id);
            $logs   = "Room sreen delete::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->route('listingRoom')->with('success_msg', 'Delete Data successful.');
            } else {
                return redirect()->route('listingRoom')->with('error_msg', 'Update Data successful.');

            }
        } catch(\Exception $e) {
            $logs = "Room sreen delete::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function detailRoom($id)
    {
        $room        = $this->roomRepository->editRoom($id);
        $roomBed     = $this->bedRepository->listingBed();
        $roomView    = $this->viewRepository->listingView();
        $roomAmenity = $this->amenityRepository->listingAmenity();
        $roomSpecialFeature     = $this->specialFeatureRepository->listingSpecialFeature();
        $specialFeatureByRoomId = $this->specialFeatureRepository->getSpecialFeatureByroomId($id);
        $amenityByroomId = $this->amenityRepository->getAmenityByroomId($id);
        if($room == null) {
            abort(404);
        }
        return view('backend.room.roomDetail', compact(['room','roomBed','roomView','roomAmenity','roomSpecialFeature','amenityByroomId','specialFeatureByRoomId']));
    }
}
