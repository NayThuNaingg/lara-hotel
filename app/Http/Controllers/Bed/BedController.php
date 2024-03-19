<?php

namespace App\Http\Controllers\Bed;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use App\Repository\Bed\BedRepositoryInterface;

class BedController extends Controller
{
    protected $bedRepository;
    public function __construct(BedRepositoryInterface $bedRepository)
    {
        $this->bedRepository = $bedRepository;
    }
    public function formBed()
    {
        return view('backend.bed.bedForm');
    }
    public function postBed(Request $request)
    {
        try {
            $result = $this->bedRepository->postBed($request->all());
            $logs = "Bed sreen create::";
            Utility::saveDebugLog($logs);
            if ($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->back()->with('success_msg', 'Create Data successful.');
            } else {
                return redirect()->back()->with('error_msg', 'Something wrong.');

            }
        } catch(\Exception $e) {
            $logs = "Bed sreen create::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function listingBed()
    {
        try {
            $beds = $this->bedRepository->listingBed();
            $logs = "Bed screen Listing::";
            Utility::saveDebugLog($logs);
            return view('backend.bed.bedListing', compact(['beds']));
        } catch(\Exception $e) {
            $logs = "Bed screen Listing::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function editBed($id)
    {
        try {
            $beds = $this->bedRepository->editBed($id);
            $logs = "Bed sreen Update::";
            Utility::saveDebugLog($logs);
            return view('backend.bed.bedForm', compact(['beds']));
        } catch (\Exception $e) {
            $logs = "Beds sreen Update::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }


    }
    public function updateBed(Request $request)
    {
        try {
            $result     = $this->bedRepository->updateBed($request->all());
            $logs = "Bed sreen Update::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->route('listingBed')->with('success_msg', 'Update Data successful.');
            } else {
                return redirect()->route('listingBed')->with('error_msg', 'Update Data successful.');

            }
        } catch(\Exception $e) {
            $logs = "Bed sreen Update::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function deleteBed($id)
    {
        try {
            $result     = $this->bedRepository->deleteBed($id);
            $logs = "Bed screen delete::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->route('listingBed')->with('success_msg', 'Delete Data successful.');
            } else {
                return redirect()->route('listingBed')->with('error_msg', 'Update Data successful.');

            }
        } catch(\Exception $e) {
            $logs = "Bed sreen delete::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}
