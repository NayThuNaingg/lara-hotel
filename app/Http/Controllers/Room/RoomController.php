<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Repository\Amenity\AmenityRepositoryInterface;
use App\Repository\Bed\BedRepositoryInterface;
use App\Repository\Room\RoomRepositoryInterface;
use App\Repository\SpecialFeature\SpecialFeatureRepositoryInterface;
use App\Repository\View\ViewRepositoryInterface;
use Illuminate\Http\Request;

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
}
