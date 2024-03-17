<?php

namespace App\Http\Controllers\Amenity;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Amenity\AmenityRepositoryInterface;

class AmenityController extends Controller
{
    protected $amenityRepository;
    public function __construct(AmenityRepositoryInterface $amenityRepository){
        $this->amenityRepository = $amenityRepository;
    }
    public function formAmenity(){
        $amenityTypes = ['Basic Amenities','Tech-Savvy Amenities','Wellness Amenities','Luxury Amenities'];
        return view('backend.amenity.amenityForm',compact(['amenityTypes']));
    }
    public function postAmenity(Request $request)
    {
        try {
            $result = $this->amenityRepository->postAmenity($request->all());
            $logs = "Amenity sreen create::";
            Utility::saveDebugLog($logs);
            if ($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->back()->with('success_msg', 'Data Insert successful.');
            } else {
                return redirect()->back()->with('error_msg', 'Something wrong.');

            }
        } catch(\Exception $e) {
            $logs = "Amenity sreen create::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function listingAmenity()
    {
        try {
            $amenities = $this->amenityRepository->listingAmenity();
            $logs = "Amenity screen Listing::";
            Utility::saveDebugLog($logs);
            return view('backend.Amenity.AmenityListing', compact(['amenities']));
        } catch(\Exception $e) {
            $logs = "Amenity screen Listing::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function editAmenity($id)
    {
        try {
            $amenities = $this->amenityRepository->editAmenity($id);
            $amenityTypes = ['Basic Amenities','Tech-Savvy Amenities','Wellness Amenities','Luxury Amenities'];
            $logs = "Amenity sreen Update::";
            Utility::saveDebugLog($logs);
            return view('backend.Amenity.AmenityForm', compact(['amenities','amenityTypes']));
        } catch (\Exception $e) {
            $logs = "Amenities sreen Update::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }


    }
    public function updateAmenity(Request $request)
    {
        try {
            $result = $this->amenityRepository->updateAmenity($request->all());
            $logs = "Amenity sreen Update::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->route('listingAmenity')->with('success_msg', 'Update Data successful.');
            } else {
                return redirect()->route('listingAmenity')->with('error_msg', 'Update Data successful.');

            }
        } catch(\Exception $e) {
            $logs = "Amenity sreen Update::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function deleteAmenity($id)
    {
        try {
            $result     = $this->amenityRepository->deleteAmenity($id);
            $logs = "Amenity screen delete::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->route('AmenityListing')->with('success_msg', 'Delete Data successful.');
            } else {
                return redirect()->route('AmenityListing')->with('error_msg', 'Update Data successful.');

            }
        } catch(\Exception $e) {
            $logs = "Amenity sreen delete::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}
