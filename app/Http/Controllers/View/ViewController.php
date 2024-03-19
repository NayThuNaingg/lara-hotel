<?php

namespace App\Http\Controllers\View;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Http\Request;
use GuzzleHttp\RetryMiddleware;
use App\Http\Controllers\Controller;
use App\Repository\View\ViewRepositoryInterface;

class ViewController extends Controller
{
    protected $viewRepository;
    public function __construct(ViewRepositoryInterface $viewRepository)
    {
        $this->viewRepository = $viewRepository;
    }
    public function formView()
    {
        return view('backend.view.viewForm');
    }
    public function postView(Request $request)
    {
        try {
            $result = $this->viewRepository->postView($request->all());
            $logs = "View sreen create::";
            Utility::saveDebugLog($logs);
            if ($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->back()->with('success_msg', 'Create Data successful.');
            } else {
                return redirect()->back()->with('error_msg', 'Something wrong.');

            }
        } catch(\Exception $e) {
            $logs = "View sreen create::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function listingView()
    {
        try {
            $views = $this->viewRepository->listingView();
            $logs = "View screen Listing::";
            Utility::saveDebugLog($logs);
            return view('backend.view.viewListing', compact(['views']));
        } catch(\Exception $e) {
            $logs = "View screen Listing::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function editView($id)
    {
        try {
            $views = $this->viewRepository->editView($id);
            $logs = "View sreen Update::";
            Utility::saveDebugLog($logs);
            return view('backend.view.viewForm', compact(['views']));
        } catch (\Exception $e) {
            $logs = "View sreen Update::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }


    }
    public function updateView(Request $request)
    {
        try {
            $result     = $this->viewRepository->updateView($request->all());
            $logs = "View sreen Update::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->route('listingView')->with('success_msg', 'Update Data successful.');
            } else {
                return redirect()->route('listingView')->with('error_msg', 'Update Data successful.');

            }
        } catch(\Exception $e) {
            $logs = "View sreen Update::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
    public function deleteView($id)
    {
        try {
            $result     = $this->viewRepository->deleteView($id);
            $logs = "View sreen delete::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->route('listingView')->with('success_msg', 'Delete Data successful.');
            } else {
                return redirect()->route('listingView')->with('error_msg', 'Update Data successful.');

            }
        } catch(\Exception $e) {
            $logs = "View sreen delete::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

}
