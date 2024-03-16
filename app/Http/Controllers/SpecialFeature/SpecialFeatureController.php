<?php

namespace App\Http\Controllers\SpecialFeature;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\SpecialFeature\SpecialFeatureRepository;
use App\Repository\SpecialFeature\SpecialFeatureRepositoryInterface;

class SpecialFeatureController extends Controller
{
    protected $specialFeatureRepository;
    public function __construct(SpecialFeatureRepositoryInterface $specialFeatureRepository){
        $this->specialFeatureRepository = $specialFeatureRepository;
    }
    public function formSpecialFeature(){
        return view('backend.specialFeature.specialFeatureForm');
    }
    public function postSpecialFeature(Request $request)
    {
        try {
            $result = $this->specialFeatureRepository->postSpecialFeature($request->all());
            $logs = "SpecialFeature sreen create::";
            Utility::saveDebugLog($logs);
            if ($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->back()->with('success_msg', 'Data Insert successful.');
            } else {
                return redirect()->back()->with('error_msg', 'Something wrong.');

            }
        } catch(\Exception $e) {
            $logs = "SpecialFeature sreen create::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function listingSpecialFeature()
    {
        try {
            $SpecialFeatures = $this->specialFeatureRepository->listingSpecialFeature();
            $logs = "SpecialFeature screen Listing::";
            Utility::saveDebugLog($logs);
            return view('backend.specialFeature.specialFeatureListing', compact(['SpecialFeatures']));
        } catch(\Exception $e) {
            $logs = "SpecialFeature screen Listing::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function editSpecialFeature($id)
    {
        try {
            $SpecialFeatures = $this->specialFeatureRepository->editSpecialFeature($id);
            $logs = "SpecialFeature sreen Update::";
            Utility::saveDebugLog($logs);
            return view('backend.SpecialFeature.SpecialFeatureForm', compact(['SpecialFeatures']));
        } catch (\Exception $e) {
            $logs = "SpecialFeatures sreen Update::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }


    }
    public function updateSpecialFeature(Request $request)
    {
        try {
            $result = $this->specialFeatureRepository->updateSpecialFeature($request->all());
            $logs = "SpecialFeature sreen Update::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->route('listingSpecialFeature')->with('success_msg', 'Update Data successful.');
            } else {
                return redirect()->route('listingSpecialFeature')->with('error_msg', 'Update Data successful.');

            }
        } catch(\Exception $e) {
            $logs = "SpecialFeature sreen Update::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function deleteSpecialFeature($id)
    {
        try {
            $result     = $this->specialFeatureRepository->deleteSpecialFeature($id);
            $logs = "SpecialFeature screen delete::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->route('SpecialFeatureListing')->with('success_msg', 'Delete Data successful.');
            } else {
                return redirect()->route('SpecialFeatureListing')->with('error_msg', 'Update Data successful.');

            }
        } catch(\Exception $e) {
            $logs = "SpecialFeature sreen delete::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}
