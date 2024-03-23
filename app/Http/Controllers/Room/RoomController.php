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
use App\Repository\SpecialFeature\SpecialFeatureRepositoryInterface;

class RoomController extends Controller
{
    protected $roomRepository;
    protected $bedRepository;
    protected $viewRepository;
    protected $amenityRepository;
    protected $specialFeatureRepository;
    public function __construct(
        RoomRepositoryInterface $roomRepository,
        BedRepositoryInterface $bedRepository,
        ViewRepositoryInterface $viewRepository,
        AmenityRepositoryInterface $amenityRepository,
        SpecialFeatureRepositoryInterface $specialFeatureRepository
    ) {
        $this->roomRepository = $roomRepository;
        $this->bedRepository = $bedRepository;
        $this->viewRepository = $viewRepository;
        $this->amenityRepository = $amenityRepository;
        $this->specialFeatureRepository = $specialFeatureRepository;
    }
    public function formRoom()
    {
        $beds = $this->bedRepository->listingBed();
        $views = $this->viewRepository->listingView();
        $amenities = $this->amenityRepository->listingAmenity();
        $specialFeatures = $this->specialFeatureRepository->listingSpecialFeature();
        return view('backend.room.roomForm', compact(['beds','views','amenities','specialFeatures']));
    }

    public function postRoom(Request $request) {
        dd($request->all());
        try{
            $result = $this->roomRepository->postRoom($request->all());
            $logs = "Room sreen create::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK){
                $insertRoomId = $result['insertedRoomId'];
                return redirect('admin-backend/room/room-gallery/'.$insertRoomId)->with('success','Create Data successful.');
            } else {
                return redirect()->route('RoomForm')->with('error','Something wrong.');
            }
        } catch(\Exception $e) {
            $logs = "Room sreen create::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}
